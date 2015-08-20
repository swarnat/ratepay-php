<?php

namespace RatePay\Request\Internals;

class CustomerDevice {

  protected $_deviceToken;

  public function __construct($deviceToken) {
    $this->_deviceToken = $deviceToken;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<customer-device/>');
    $element->addChild('device-token', $this->_deviceToken);

    return $element;
  }

}
