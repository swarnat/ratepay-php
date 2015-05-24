<?php

namespace RatePay\Response;

class PaymentRequest extends Base {

  public function isApproved() {
    return $this->_responseType == 'PAYMENT_PERMISSION';
  }

}

