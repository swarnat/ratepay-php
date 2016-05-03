<?php

namespace RatePay\Models;

use RatePay\Utils\XmlUtils;

class ShoppingBasket {

  protected $_amount;
  protected $_currency;
  protected $_items;

  /**
   * @var ShoppingBasketItem
   */
  protected $_shipping;

  /**
   * @var ShoppingBasketItem
   */
  protected $_discount;

  public function __construct() {
    $this->_items = array();
  }

  public function setAmount($arg) {
    $this->_amount = $arg;
  }

  public function setCurrency($arg) {
    $this->_currency = $arg;
  }

  public function addItem(ShoppingBasketItem $arg) {
    $this->_items[] = $arg;
  }

  public function setShipping(ShoppingBasketItem $arg) {
    $this->_shipping = $arg;
  }
  public function setDiscount(ShoppingBasketItem $arg) {
    $this->_discount = $arg;
  }
  public function getAmount() {
	  return $this->_amount;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<shopping-basket/>');
    $element->addAttribute('amount', $this->_amount);
    $element->addAttribute('currency', $this->_currency);
    $items = $element->addChild('items');
    foreach ($this->_items as $item) {
      XmlUtils::sxml_append($items, $item->asElement());
    }

    if (isset($this->_shipping)) {
	  XmlUtils::sxml_append($element, $this->_shipping->asElement());
    }
    if (isset($this->_discount)) {
	  XmlUtils::sxml_append($element, $this->_discount->asElement());
    }

    return $element;
  }

}
