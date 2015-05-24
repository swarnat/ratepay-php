<?php

namespace RatePay\Request\Internals;

use RatePay\Utils\XmlUtils;
use RatePay\Models\Customer;
use RatePay\Models\Invoicing;
use RatePay\Models\ShoppingBasket;
use RatePay\Models\Payment;

class Content {

  protected $_customer;
  protected $_invoicing;
  protected $_shoppingBasket;
  protected $_payment;

  public function setCustomer(Customer $arg) {
    $this->_customer = $arg;
  }

  public function setInvoicing(Invoicing $arg) {
    $this->_invoicing = $arg;
  }

  public function setShoppingBasket(ShoppingBasket $arg) {
    $this->_shoppingBasket = $arg;
  }

  public function setPayment(Payment $arg) {
    $this->_payment = $arg;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<content/>');
    if (isset($this->_customer)) {
      XmlUtils::sxml_append($element, $this->_customer->asElement());
    }
    if (isset($this->_invoicing)) {
      XmlUtils::sxml_append($element, $this->_invoicing->asElement());
    }
    if (isset($this->_shoppingBasket)) {
      XmlUtils::sxml_append($element, $this->_shoppingBasket->asElement());
    }
    if (isset($this->_payment)) {
      XmlUtils::sxml_append($element, $this->_payment->asElement());
    }

    return $element;
  }
}
