<?php

namespace RatePay\Request;

use RatePay\Utils\XmlUtils;
use RatePay\Models\Invoicing;
use RatePay\Models\ShoppingBasket;

class ConfirmationDeliver extends BaseWithExtras {

  protected $_invoicing;
  protected $_shoppingBasket;

  protected function getOperation() {
    return 'CONFIRMATION_DELIVER';
  }

  public function getResponseClass() {
    return 'RatePay\Response\ConfirmationDeliver';
  }

  public function getBody() {
    $result = $this->getRootXml();
    $head = $this->getBasicHead();
    XmlUtils::sxml_append($result, $head->asElement());

    $content = new Internals\Content();
    $content->setInvoicing($this->_invoicing);
    $content->setShoppingBasket($this->_shoppingBasket);
    XmlUtils::sxml_append($result, $content->asElement());

    return $result->asXML();
  }

  public function setInvoicing(Invoicing $arg) {
    $this->_invoicing = $arg;
  }

  public function setShoppingBasket(ShoppingBasket $arg) {
    $this->_shoppingBasket = $arg;
  }

}
