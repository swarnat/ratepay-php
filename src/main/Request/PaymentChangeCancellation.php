<?php

namespace RatePay\Request;

use RatePay\Utils\XmlUtils;

class PaymentChangeCancellation extends PaymentChange {

  protected function getOperationSubtype() {
    return 'cancellation';
  }

}
