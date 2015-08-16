<?php

namespace RatePay\Response;

class PaymentRequest extends Base {

  protected $_descriptor;

  public function parseResponse() {
    parent::parseResponse();
    $this->_descriptor = $this->_root->content->payment->descriptor;
  }

  public function isApproved() {
    return $this->_responseType == 'PAYMENT_PERMISSION';
  }

  public function getDescriptor() {
    return $this->_descriptor;
  }

}

