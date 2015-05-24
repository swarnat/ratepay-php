<?php

namespace RatePay\Request\Internals;

class Credential {

  protected $_profileId;
  protected $_securityCode;

  public function __construct($profileId, $securityCode) {
    $this->_profileId = $profileId;
    $this->_securityCode = $securityCode;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<credential/>');
    $element->addChild('profile-id', $this->_profileId);
    $element->addChild('securitycode', $this->_securityCode);

    return $element;
  }
  
}
