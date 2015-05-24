<?php

namespace RatePay\Models;

class Address {

  const BILLING = 'BILLING';
  const DELIVERY = 'DELIVERY';

  protected $_type; // BILLING or DELIVERY
  protected $_firstName;
  protected $_lastName;
  protected $_salutation;
  protected $_companyName;
  protected $_street;
  protected $_streetAdditional;
  protected $_streetNumber;
  protected $_zipCode;
  protected $_city;
  protected $_countryCode;

  public function setDelivery() {
    $this->_type = self::DELIVERY;
  }

  public function setBilling() {
    $this->_type = self::BILLING;
  }

  public function setFirstName($arg) {
    $this->_firstName = $arg;
  }

  public function setLastName($arg) {
    $this->_lastName = $arg;
  }

  public function setSalutation($arg) {
    $this->_salutation = $arg;
  }

  public function setCompanyName($arg) {
    $this->_companyName = $arg;
  }

  public function setStreet($arg) {
    $this->_street = $arg;
  }

  public function setStreetAdditional($arg) {
    $this->_streetAdditional = $arg;
  }

  public function setStreetNumber($arg) {
    $this->_streetNumber = $arg;
  }

  public function setZipCode($arg) {
    $this->_zipCode = $arg;
  }

  public function setCity($arg) {
    $this->_city = $arg;
  }

  public function setCountryCode($arg) {
    $this->_countryCode = $arg;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<address/>');
    $element->addAttribute('type', $this->_type);
    $element->addChild('first-name', $this->_firstName);
    $element->addChild('last-name', $this->_lastName);
    if (isset($this->_salutation)) {
      $element->addChild('salutation', $this->_salutation);
    }
    if (isset($this->_companyName)) {
      $element->addChild('company', $this->_companyName);
    }
    $element->addChild('street', $this->_street);
    if (isset($this->_streetAdditional)) {
      $element->addChild('street-additional', $this->_streetAdditional);
    }
    if (isset($this->_streetNumber)) {
      $element->addChild('street-number', $this->_streetNumber);
    }
    $element->addChild('zip-code', $this->_zipCode);
    $element->addChild('city', $this->_city);
    $element->addChild('country-code', $this->_city);

    return $element;
  }

}
