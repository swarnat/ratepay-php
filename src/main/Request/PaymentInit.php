<?php

namespace RatePay\Request;

use RatePay\Utils\XmlUtils;

class PaymentInit extends Base {

  protected function getOperation() {
    return 'PAYMENT_INIT';
  }

  public function getResponseClass() {
    return 'RatePay\Response\PaymentInit';
  }

  public function getBody() {
    $result = $this->getRootXml();
    $head = $this->getBasicHead();
    XmlUtils::sxml_append($result, $head->asElement());
    // there's only head in this operation

    return $result->asXML();
  }
 
}
