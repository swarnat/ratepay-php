<?php

namespace RatePay\Models;

use RatePay\Utils\XmlUtils;

class ShoppingBasket {

  protected $_amount;
  protected $_currency;
  protected $_items;

  public function __construct() {
    $this->_items = array();
  }

  public function setAmount($arg) {
    $this->_amount = $arg;
  }

  public function setCurrency($arg) {
    $this->_currency = $arg;
  }

  public function addItem(ShoppingBasketItem $item) {
    $this->_items[] = $arg;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<shopping-basket/>');
    $element->addAttribute('amount', $this->_amount);
    $element->addAttribute('currency', $this->_currency);
    $items = $element->addChild('items');
    foreach ($this->_items as $item) {
      XmlUtils::sxml_append($items, $item->asElement());
    }

    return $element;
  }

}
