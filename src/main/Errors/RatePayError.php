<?php

namespace RatePay\Errors;

class RatePayError extends \Exception {
  
  protected $_status;
  protected $_statusDescription;
  protected $_result;
  protected $_resultDescription;
  protected $_reason;
  protected $_reasonDescription;

  public function __construct($message, $code, $previous, $extra = array()) {
    parent::__construct($message, (int)$code, $previous);
    $this->_status = $extra['status'];
    $this->_statusDescription = $extra['statusDescription'];
    $this->_result = $extra['result'];
    $this->_resultDescription = $extra['resultDescription'];
    $this->_reason = $extra['reason'];
    $this->_reasonDescription = $extra['reasonDescription'];
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

}
