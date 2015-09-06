<?php

namespace RatePay\Errors;

class RatePayError extends \Exception {
  
  protected $_status;
  protected $_statusDescription;
  protected $_result;
  protected $_resultDescription;
  protected $_reason;
  protected $_reasonDescription;
  protected $_customerMessage;

  public function __construct($message, $code, $previous, $extra = array()) {
    parent::__construct($message, (int)$code, $previous);
    $this->_status = (string)$extra['status'];
    $this->_statusDescription = (string)$extra['statusDescription'];
    $this->_result = (string)$extra['result'];
    $this->_resultDescription = (string)$extra['resultDescription'];
    $this->_reason = (string)$extra['reason'];
    $this->_reasonDescription = (string)$extra['reasonDescription'];
    $this->_customerMessage = htmlspecialchars_decode((string)$extra['customerMessage']);
  }

  public function getStatus() {
    return $this->_status;
  }

  public function getStatusDescription() {
    return $this->_statusDescription;
  }

  public function getResult() {
    return $this->_result;
  }

  public function getResultDescription() {
    return $this->_resultDescription;
  }

  public function getReason() {
    return $this->_reason;
  }

  public function getReasonDescription() {
    return $this->_reasonDescription;
  }

  public function getCustomerMessage() {
    return $this->_customerMessage;
  }

}
