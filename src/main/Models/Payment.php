<?php

namespace RatePay\Models;

// TODO at the moment it doesn't support INSTALLMENT payment method, add it when needed
class Payment {

  const INVOICE = 'INVOICE';
  const INSTALLMENT = 'INSTALLMENT';
  const ELV = 'ELV';
  const PREPAYMENT = 'PREPAYMENT';
  protected $_availableMethods;

  protected $_method;
  protected $_currency;
  protected $_amount;

  public function __construct() {
    $this->_availableMethods = array(self::INVOICE, self::INSTALLMENT, self::ELV, self::PREPAYMENT);
  }

  public function setMethod($arg) {
    if (inArray($arg, $this->_availableMethods)) {
      $this->_method = $arg;
    }
  }

  public function setCurrency($arg) {
    $this->_currency = $arg;
  }

  public function setAmount($arg) {
    $this->_amount = $arg;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<payment/>');
    $element->addAttribute('method', $this->_method);
    $element->addAttribute('currency', $this->_currency);
    $element->addChild('amount', $this->_amount);

    return $element;
  }
}
