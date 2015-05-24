<?php

namespace RatePay\Models;

class BankAccount {

  protected $_owner;
  protected $_bankName;
  protected $_bankAccountNumber;
  protected $_bankCode;
  protected $_iban;
  protected $_bicSwift;

  public function setOwner($owner) {
    $this->_owner = $owner;
  }

  public function setBankName($bankName) {
    $this->_bankName = $bankName;
  }

  public function setBankAccountNumber($bankAccountNumber) {
    $this->_bankAccountNumber = $bankAccountNumber;
  }

  public function setBankCode($bankCode) {
    $this->_bankCode = $bankCode;
  }

  public function setIban($iban) {
    $this->_iban = $iban;
  }

  public function setBicSwift($bicSwift) {
    $this->_bicSwift = $bicSwift;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<bank-account/>');
    $element->addChild('owner', $this->_owner);
    $element->addChild('bank-name', $this->_bankName);
    if (isset($this->_bankAccountNumber)) {
      $element->addChild('bank-account-number', $this->_bankAccountNumber);
    }
    if (isset($this->_bankCode)) {
      $element->addChild('bank-code', $this->_bankCode);
    }
    if (isset($this->_iban)) {
      $element->addChild('iban', $this->_iban);
    }
    if (isset($this->_bicSwift)) {
      $element->addChild('bic-swift', $this->_bicSwift);
    }

    return $element;
  }

}
