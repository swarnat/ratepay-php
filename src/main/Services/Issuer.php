<?php

namespace RatePay\Services;

use RatePay\Request\Base;

class Issuer {

  protected $_apiEndpoint;
  protected $_lastRequest;
  protected $_lastResponse;

  public function __construct($apiEndpoint) {
    $this->_apiEndpoint = $apiEndpoint;
  }

  public function getLastRequest() {
    return $this->_lastRequest;
  }

  public function getLastResponse() {
    return $this->_lastResponse;
  }

  public function execute(Base $request) {
    $this->_lastRequest = $request;

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $this->_apiEndpoint);
    curl_setopt($ch, CURLOPT_HTTPHEADER, Array("Content-Type: text/xml; charset=UTF-8"));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $request->getBody());
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_SSLVERSION, CURL_SSLVERSION_DEFAULT);
    $responseBody = curl_exec($ch);
    $responseInfo = curl_getinfo($ch);

    $responseClass = $request->getResponseClass();
    $this->_lastResponse = new $responseClass($responseInfo, $responseBody);

    return $this->_lastResponse;
  }

}
