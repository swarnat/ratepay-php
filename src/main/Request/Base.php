<?php

namespace RatePay\Request;

use RatePay\Utils\XmlUtils;

abstract class Base {

  protected $_profileId;
  protected $_securityCode;
  protected $_systemId;

  public function __construct($profileId, $securityCode, $systemId) {
    $this->_profileId = $profileId;
    $this->_securityCode = $securityCode;
    $this->_systemId = $systemId;
  }

  protected function getRootXml() {
    return new \SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><request version="1.0" xmlns="urn://www.ratepay.com/payment/1_0" />');
  }

  protected function getBasicHead() {
    $head = new Internals\Head();
    $head->setSystemId($this->_systemId);
    $head->setOperation($this->getOperation());
    $head->setOperationSubtype($this->getOperationSubtype());
    $head->setCredential(new Internals\Credential($this->_profileId, $this->_securityCode));

    return $head;
  }

  protected function getOperationSubtype() {
    return null;
  }

  abstract protected function getOperation();

  abstract public function getResponseClass();

  abstract public function getBody();
}
