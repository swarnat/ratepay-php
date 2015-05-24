<?php

namespace RatePay\Test\Request;

use RatePay\Request\PaymentRequest;
use RatePay\Models\Customer;
use RatePay\Models\ShoppingBasket;
use RatePay\Models\Payment;
use RatePay\Models\Address;

class PaymentRequestTest extends \PHPUnit_Framework_TestCase {

  public function testTrueIsTrue() {
    $foo = true;
    $this->assertTrue($foo);

    $request = new PaymentRequest('my-profile-id', 'my-security-code', 'my-system-id');

    $customer = new Customer();
    $billingAddress = new Address();
    $customer->setBillingAddress($billingAddress);
    $request->setCustomer($customer);

    $shoppingBasket = new ShoppingBasket();
    $request->setShoppingBasket($shoppingBasket);

    $payment = new Payment();
    $request->setPayment($payment);

    echo $request->getBody();
  }

}