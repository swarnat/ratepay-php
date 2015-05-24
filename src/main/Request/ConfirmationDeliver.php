<?php

namespace RatePay\Request;

use RatePay\Utils\XmlUtils;

class ConfirmationDeliver extends BaseWithExtras {

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

    // TODO add content

    return $result->asXML();
  }
 
}
