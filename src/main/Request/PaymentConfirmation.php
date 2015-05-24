<?php

namespace RatePay\Request;

use RatePay\Utils\XmlUtils;

class PaymentConfirmation extends BaseWithExtras {

  protected function getOperation() {
    return 'PAYMENT_CONFIRM';
  }

  public function getResponseClass() {
    return 'RatePay\Response\PaymentConfirmation';
  }

  public function getBody() {
    $result = $this->getRootXml();
    $head = $this->getBasicHead();
    XmlUtils::sxml_append($result, $head->asElement());
    // there's only head in this operation

    return $result->asXML();
  }
 
}
