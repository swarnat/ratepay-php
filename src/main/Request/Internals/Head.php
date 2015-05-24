<?php

namespace RatePay\Request\Internals;

use RatePay\Utils\XmlUtils;

class Head {

  protected $_systemId;
  protected $_transactionId;
  protected $_operation;
  protected $_credential;
  protected $_customerDevice;
  protected $_external;
  protected $_meta;

  public function setSystemId($arg) {
    $this->_systemId = $arg;
  }

  public function setTransactionId($arg) {
    $this->_transactionId = $arg;
  }

  public function setOperation($arg) {
    $this->_operation = $arg;
  }

  public function setCredential(Credential $arg) {
    $this->_credential = $arg;
  }

  public function setCustomerDevice(CustomerDevice $arg) {
    $this->_customerDevice = $arg;
  }

  public function setExternal(External $arg) {
    $this->_external = $arg;
  }

  public function setMeta(Meta $arg) {
    $this->_meta = $arg;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<head/>');
    $element->addChild('system-id', $this->_systemId);
    if (isset($this->_transactionId)) {
      $element->addChild('transaction-id', $this->_transactionId);
    }
    $element->addChild('operation', $this->_operation);
    XmlUtils::sxml_append($element, $this->_credential->asElement());
    if (isset($this->_customerDevice)) {
      XmlUtils::sxml_append($element, $this->_customerDevice->asElement());
    }
    if (isset($this->_external)) {
      XmlUtils::sxml_append($element, $this->_external->asElement());
    }
    if (isset($this->_meta)) {
      XmlUtils::sxml_append($element, $this->_meta->asElement());
    }

    return $element;
  }
}
