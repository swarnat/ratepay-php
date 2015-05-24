<?php

namespace RatePay\Request\Internals;

class External {

  protected $_orderId;
  protected $_merchantConsumerId;
  protected $_merchantConsumerClassification;
  protected $_trackingId;

  public function __construct() {
  }

  public function setOrderId($arg) {
    $this->_orderId = $arg;
  }

  public function setMerchantConsumerId($arg) {
    $this->_merchantConsumerId = $arg;
  }

  public function setMerchantConsumerClassification($arg) {
    $this->_merchantConsumerClassification = $arg;
  }

  public function setTrackingId($arg) {
    $this->_trackingId = $arg;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<external/>');
    if (isset($this->_orderId)) {
      $element->addChild('order-id', $this->_orderId);
    }
    if (isset($this->_merchantConsumerId)) {
      $element->addChild('merchant-consumer-id', $this->_merchantConsumerId);
    }
    if (isset($this->_merchantConsumerClassification)) {
      $element->addChild('merchant-consumer-classification', $this->_merchantConsumerClassification);
    }
    if (isset($this->_trackingId)) {
      $element->addChild('tracking-id', $this->_trackingId);
    }

    return $element;
  }

}
