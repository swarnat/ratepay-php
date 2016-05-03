<?php

namespace RatePay\Models;

use RatePay\Utils\XmlUtils;

class DiscountItem extends ShoppingBasketItem {

  protected $_tagName = 'discount';
  
  public function setUnitPriceGross($arg) {
		if(floatval($arg) > 0) $arg *= -1;
	  
		$this->_unitPriceGross = $arg;
  }
  
}