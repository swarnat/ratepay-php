<?php

namespace RatePay\Request;

use RatePay\Utils\XmlUtils;

abstract class PaymentChange extends BaseWithExtras {

  protected function getOperation() {
    return 'PAYMENT_CHANGE';
  }

  public function getResponseClass() {
    return 'RatePay\Response\PaymentChange';
  }

  public function getBody() {
    $result = $this->getRootXml();
    $head = $this->getBasicHead();
    XmlUtils::sxml_append($result, $head->asElement());

    // TODO add content

    return $result->asXML();
  }
 
}
