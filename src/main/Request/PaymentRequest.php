<?php

namespace RatePay\Request;

use RatePay\Utils\XmlUtils;
use RatePay\Models\Customer;
use RatePay\Models\ShoppingBasket;
use RatePay\Models\Payment;

class PaymentRequest extends BaseWithExtras {

  protected $_customer;
  protected $_shoppingBasket;
  protected $_payment;

  protected function getOperation() {
    return 'PAYMENT_REQUEST';
  }

  public function getResponseClass() {
    return 'RatePay\Response\PaymentRequest';
  }

  public function getBody() {
    $result = $this->getRootXml();
    $head = $this->getBasicHead();
    XmlUtils::sxml_append($result, $head->asElement());

    $content = new Internals\Content();
    $content->setCustomer($this->_customer);
    $content->setShoppingBasket($this->_shoppingBasket);
    $content->setPayment($this->_payment);
    XmlUtils::sxml_append($result, $content->asElement());

    return $result->asXML();
  }


  public function setCustomer(Customer $arg) {
    $this->_customer = $arg;
  }

  public function setShoppingBasket(ShoppingBasket $arg) {
    $this->_shoppingBasket = $arg;
  }

  public function setPayment(Payment $arg) {
    $this->_payment = $arg;
  }

}
