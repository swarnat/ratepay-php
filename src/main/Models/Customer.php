<?php

namespace RatePay\Models;

use RatePay\Utils\XmlUtils;

class Customer {

  const MALE = 'M';
  const FEMALE = 'F';
  const UNKNOWN = 'U';

  protected $_firstName;
  protected $_lastName;
  protected $_middleName;
  protected $_nameSuffix;
  protected $_salutation;
  protected $_companyName;
  protected $_title;
  protected $_gender = self::UNKNOWN;
  protected $_dateOfBirth; // format is YYYY-MM-DD
  protected $_ipAddress;
  protected $_email;
  protected $_phoneAreaCode;
  protected $_phoneDirectDial;
  protected $_faxAreaCode;
  protected $_faxDirectDial;
  protected $_mobileAreaCode;
  protected $_mobileDirectDial;
  protected $_billingAddress;
  protected $_deliveryAddress;
  protected $_bankAccount;
  protected $_nationality;
  protected $_customerAllowCreditInquiry;
  protected $_vatId;
  protected $_companyId;
  protected $_registryLocation;
  protected $_homepage;

  public function setFirstName($arg) {
    $this->_firstName = $arg;
  }

  public function setLastName($arg) {
    $this->_lastName = $arg;
  }

  public function setMiddleName($arg) {
    $this->_middleName = $arg;
  }

  public function setNameSuffix($arg) {
    $this->_nameSuffix = $arg;
  }

  public function setSalutation($arg) {
    $this->_salutation = $arg;
  }

  public function setCompanyName($arg) {
    $this->_companyName = $arg;
  }

  public function setTitle($arg) {
    $this->_title = $arg;
  }

  public function setGender($arg) {
    if (in_array($arg, array(self::MALE, self::FEMALE, self::UNKNOWN))) {
      $this->_gender = $arg;
    }
  }

  public function setDateOfBirth($arg) {
    $this->_dateOfBirth = $arg;
  }

  public function setIpAddress($arg) {
    $this->_ipAddress = $arg;
  }

  public function setEmail($arg) {
    $this->_email = $arg;
  }

  public function setPhoneAreaCode($arg) {
    $this->_phoneAreaCode = $arg;
  }

  public function setPhoneDirectDial($arg) {
    $this->_phoneDirectDial = $arg;
  }

  public function setFaxAreaCode($arg) {
    $this->_faxAreaCode = $arg;
  }

  public function setFaxDirectDial($arg) {
    $this->_faxDirectDial = $arg;
  }

  public function setMobileAreaCode($arg) {
    $this->_mobileAreaCode = $arg;
  }

  public function setMobileDirectDial($arg) {
    $this->_mobileDirectDial = $arg;
  }

  public function setBillingAddress(Address $arg) {
    $arg->setBilling();
    $this->_billingAddress = $arg;
  }

  public function setDeliveryAddress(Address $arg) {
    $arg->setDelivery();
    $this->_deliveryAddress = $arg;
  }

  public function setBankAccount(BankAccount $arg) {
    $this->_bankAccount = $arg;
  }

  public function setNationality($arg) {
    $this->_nationality = $arg;
  }

  public function setCustomerAllowCreditInquiry($arg) {
    $this->_customerAllowCreditInquiry = $arg;
  }

  public function setVatId($arg) {
    $this->_vatId = $arg;
  }

  public function setCompanyId($arg) {
    $this->_companyId = $arg;
  }
  public function setRegistryLocation($arg) {
    $this->_registryLocation = $arg;
  }
  public function setHomepage($arg) {
    $this->_homepage = $arg;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<customer/>');
    $element->addChild('first-name', $this->_firstName);
    $element->addChild('last-name', $this->_lastName);
    if (isset($this->_middleName)) {
      $element->addChild('middle-name', $this->_middleName);
    }
    if (isset($this->_nameSuffix)) {
      $element->addChild('name-suffix', $this->_nameSuffix);
    }
    if (isset($this->_salutation)) {
      $element->addChild('salutation', $this->_salutation);
    }
    if (isset($this->_companyName)) {
      $element->addChild('company-name', $this->_companyName);
    }
    if (isset($this->_title)) {
      $element->addChild('title', $this->_title);
    }
    $element->addChild('gender', $this->_gender);
    if (isset($this->_dateOfBirth)) {
      $element->addChild('date-of-birth', $this->_dateOfBirth);
    }
    $element->addChild('ip-address', $this->_ipAddress);

    // add contacts
    $contacts = $element->addChild('contacts');
    $contacts->addChild('email', $this->_email);
    if (isset($this->_phoneDirectDial)) {
      $phone = $contacts->addChild('phone');
      if (isset($this->_phoneAreaCode)) {
        $phone->addChild('area-code', $this->_phoneAreaCode);
      }
      $phone->addChild('direct-dial', $this->_phoneDirectDial);
    }
    if (isset($this->_faxDirectDial)) {
      $fax = $contacts->addChild('fax');
      if (isset($this->_faxAreaCode)) {
        $fax->addChild('area-code', $this->_faxAreaCode);
      }
      $fax->addChild('direct-dial', $this->_faxDirectDial);
    }
    if (isset($this->_mobileDirectDial)) {
      $mobile = $contacts->addChild('mobile');
      if (isset($this->_mobileAreaCode)) {
        $mobile->addChild('area-code', $this->_mobileAreaCode);
      }
      $mobile->addChild('direct-dial', $this->_mobileDirectDial);
    }

    // add addresses
    $addresses = $element->addChild('addresses');
    XmlUtils::sxml_append($addresses, $this->_billingAddress->asElement());
    if (isset($this->_deliveryAddress)) {
      XmlUtils::sxml_append($addresses, $this->_deliveryAddress->asElement());
    }

    if (isset($this->_bankAccount)) {
      XmlUtils::sxml_append($element, $this->_bankAccount->asElement());
    }
    if (isset($this->_nationality)) {
      $element->addChild('nationality', $this->_nationality);
    }
    $element->addChild('customer-allow-credit-inquiry', $this->_customerAllowCreditInquiry ? 'yes' : 'no');
    if (isset($this->_vatId)) {
      $element->addChild('vat-id', $this->_vatId);
    }
    if (isset($this->_companyId)) {
      $element->addChild('company-id', $this->_companyId);
    }
    if (isset($this->_registryLocation)) {
      $element->addChild('registry-location', $this->_registryLocation);
    }
    if (isset($this->_homepage)) {
      $element->addChild('homepage', $this->_homepage);
    }

    return $element;
  }

}
