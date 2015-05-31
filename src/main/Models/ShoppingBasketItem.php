<?php

namespace RatePay\Models;

use RatePay\Utils\XmlUtils;

class ShoppingBasketItem {

  protected $_name;
  protected $_articleNumber;
  protected $_uniqueArticleNumber;
  protected $_quantity;
  protected $_unitPriceGross;
  protected $_taxRate; // as decimal, eg: 19
  protected $_category;

  public function setName($arg) {
    $this->_name = $arg;
  }

  public function setArticleNumber($arg) {
    $this->_articleNumber = $arg;
  }

  public function setUniqueArticleNumber($arg) {
    $this->_uniqueArticleNumber = $arg;
  }

  public function setQuantity($arg) {
    $this->_quantity = $arg;
  }

  public function setUnitPriceGross($arg) {
    $this->_unitPriceGross = $arg;
  }

  public function setTaxRate($arg) {
    $this->_taxRate = $arg;
  }

  public function setCategory($arg) {
    $this->_category = $arg;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<item>'. XmlUtils::xml_escape($this->_name) .'</item>');
    if (isset($this->_articleNumber)) {
      $element->addAttribute('article-number', $this->_articleNumber);
    }
    if (isset($this->_uniqueArticleNumber)) {
      $element->addAttribute('unique-article-number', $this->_uniqueArticleNumber);
    }
    $element->addAttribute('quantity', $this->_quantity);
    $element->addAttribute('unit-price-gross', $this->_unitPriceGross);
    $element->addAttribute('tax-rate', $this->_taxRate);
    if (isset($this->_category)) {
      $element->addAttribute('category', $this->_category);
    }

    return $element;
  }

}