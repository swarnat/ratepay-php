<?php

namespace RatePay\Request\Internals;

class CustomerDevice {

  protected $_deviceSite;
  protected $_deviceToken;

  public function __construct($deviceSite, $deviceToken) {
    $this->_deviceSite = $deviceSite;
    $this->_deviceToken = $deviceToken;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<customer-device/>');
    $element->addChild('device-site', $this->_deviceSite);
    $element->addChild('device-token', $this->_deviceToken);

    return $element;
  }

}
