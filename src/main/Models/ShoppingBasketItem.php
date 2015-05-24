<?php

namespace RatePay\Models;

use RatePay\Utils\XmlUtils;

class ShoppingBasketItem {

  protected $_description;
  protected $_articleNumber;
  protected $_uniqueArticleNumber;
  protected $_quantity;
  protected $_unitPriceGross;
  protected $_taxRate; // as decimal, eg: 19
  protected $_category;

  public function setDescription($arg) {
    $this->_description = $arg;
  }

  public function setArticleNumber($arg) {
    $this->_setArticleNumber = $arg;
  }

  public function setUniqueArticleNumber($arg) {
    $this->_setUniqueArticleNumber = $arg;
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
    $element = new \SimpleXMLElement('<item>'. XmlUtils::xml_escape($this->_description) .'</item>');
    $element->addAttribute('article-number', $this->_articleNumber);
    $element->addAttribute('unique-article-number', $this->_uniqueArticleNumber);
    $element->addAttribute('quantity', $this->_quantity);
    $element->addAttribute('unit-price-gross', $this->_unitPriceGross);
    $element->addAttribute('tax-rate', $this->_taxRate);
    $element->addAttribute('category', $this->_category);

    return $element;
  }

}