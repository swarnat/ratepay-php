<?php

namespace RatePay\Request;

use RatePay\Utils\XmlUtils;

abstract class BaseWithExtras extends Base {

  protected $_transactionId;
  protected $_deviceToken;
  protected $_orderId;
  protected $_merchantConsumerId;
  protected $_merchantConsumerClassification;
  protected $_trackingId;
  protected $_systemName;
  protected $_systemVersion;

  public function setTransactionId($arg) {
    $this->_transactionId = $arg;
  }

  public function setDeviceToken($arg) {
    $this->_deviceToken = $arg;
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

  public function setSystemName($arg) {
    $this->_systemName = $arg;
  }

  public function setSystemVersion($arg) {
    $this->_systemVersion = $arg;
  }

  protected function getBasicHead() {
    $head = parent::getBasicHead();
    $head->setTransactionId($this->_transactionId);
    if (isset($this->_deviceToken)) {
      $head->setCustomerDevice(new Internals\CustomerDevice($this->_deviceToken));
    }
    $external = new Internals\External();
    $external->setOrderId($this->_orderId);
    $external->setMerchantConsumerId($this->_merchantConsumerId);
    $external->setMerchantConsumerClassification($this->_merchantConsumerClassification);
    $external->setTrackingId($this->_trackingId);
    $head->setExternal($external);
    if (isset($this->_systemName) && isset($this->_systemVersion)) {
      $head->setMeta(new Internals\Meta($this->_systemName, $this->_systemVersion));
    }

    return $head;
  }

}