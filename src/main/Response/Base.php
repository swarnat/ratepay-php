<?php

namespace RatePay\Response;

use RatePay\Errors\TechnicalError;
use RatePay\Errors\WarningError;
use RatePay\Errors\RejectionError;
use RatePay\Errors\GenericError;

abstract class Base {
  
  protected $_info;
  protected $_rawXml;
  protected $_root;

  protected $_transactioinId;
  protected $_responseType;
  protected $_timestamp; // datetime, as 2010-06-25T12:27:39.234
  protected $_status;
  protected $_statusDescription;
  protected $_result;
  protected $_resultDescription;
  protected $_reason;
  protected $_reasonDescription;

  public function __construct(Array $info, $rawXml) {
    $this->_info = $info;
    $this->_rawXml = $rawXml;
    $this->_root = new \SimpleXMLElement($rawXml);
    $this->parseResponse();
  }

  public function parseResponse() {
    $this->_transactionId = $this->_root->head->{'transaction-id'};
    $this->_responseType = $this->_root->head->{'response-type'};
    $this->_timestamp = $this->_root->head->processing->timestamp;
    $this->_status = $this->_root->head->processing->status['code'];
    $this->_statusDescription = $this->_root->head->processing->status;
    $this->_result = $this->_root->head->processing->result['code'];
    $this->_resultDescription = $this->_root->head->processing->result;
    $this->_reason = $this->_root->head->processing->reason['code'];
    $this->_reasonDescription = $this->_root->head->processing->reason;

    $extra = array(
      'status' => $this->_status,
      'statusDescription' => $this->_statusDescription,
      'result' => $this->_result,
      'resultDescription' => $this->_resultDescription,
      'reason' => $this->_reason,
      'reasonDescription' => $this->_reasonDescription
    );

    if ($this->_result == "150") {
      throw new TechnicalError($this->_reasonDescription, $this->_reason, null, $extra);
    } else if ($this->_result == "405") {
      throw new WarningError($this->_reasonDescription, $this->_reason, null, $extra);
    } else if ($this->_result == "401") {
      throw new RejectionError($this->_reasonDescription, $this->_reason, null, $extra);
    } else if ($this->_responseType == 'STATUS_ERROR' || in_array($this->_status, array('ERROR', 'FATAL'))) {
      throw new GenericError($this->_reasonDescription, $this->_reason, null, $extra);
    }
  }

  public function getTransactionId() {
    return $this->_transactionId;
  }

  public function getResponseType() {
    return $this->_responseType;
  }

  public function getTimestamp() {
    return $this->_timestamp;
  }

  public function getStatus() {
    return $this->_status;
  }

  public function getReason() {
    return $this->_reason;
  }

  public function getResult() {
    return $this->_result;
  }

}
