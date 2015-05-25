<?php

namespace RatePay\Models;

class Invoicing {
  
  protected $_invoiceId;
  protected $_invoiceDate; // datetime, as 2010-06-25T12:27:39.234
  protected $_deliveryDate; // datetime, as 2010-06-25T12:27:39.234
  protected $_dueDate; // datetime, as 2010-06-25T12:27:39.234

  public function setInvoiceId($arg) {
    $this->_invoiceId = $arg;
  }

  public function setInvoiceDate($arg) {
    $this->_invoiceDate = $arg;
  }

  public function setDeliveryDate($arg) {
    $this->_deliveryDate = $arg;
  }

  public function setDueDate($arg) {
    $this->_dueDate = $arg;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<invoicing/>');
    $element->addChild('invoice-id', $this->_invoiceId);
    $element->addChild('invoice-date', $this->_invoiceDate);
    $element->addChild('delivery-date', $this->_deliveryDate);
    $element->addChild('due-date', $this->_dueDate);

    return $element;
  }

}
