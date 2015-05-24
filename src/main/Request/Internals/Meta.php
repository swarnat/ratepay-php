<?php

namespace RatePay\Request\Internals;

class Meta {

  protected $_systemName;
  protected $_systemVersion;

  public function __construct($systemName, $systemVersion) {
    $this->_systemName = $systemName;
    $this->_systemVersion = $systemVersion;
  }

  public function asElement() {
    $element = new \SimpleXMLElement('<meta/>');
    $systems = $element->addChild('systems');
    $system = $systems->addChild('system');
    $system->addAttribute('name', $this->_systemName);
    $system->addAttribute('version', $this->_systemVersion);

    return $element;
  }

}
