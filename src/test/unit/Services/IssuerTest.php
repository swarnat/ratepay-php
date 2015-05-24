<?php

namespace RatePay\Test\Services;

use RatePay\Services\Issuer;
use RatePay\Request\PaymentInit;

class IssuerTest extends \PHPUnit_Framework_TestCase {

  public function testTrueIsTrue() {
    $foo = true;
    $this->assertTrue($foo);

    $issuer = new Issuer('https://gateway-int.ratepay.com/api/xml/1_0');
    $response = $issuer->execute(new PaymentInit('my-profile-id', 'my-security-code', 'my-system-id'));

//    var_dump($response);
  }

}
