<?php

namespace RatePay\Utils;

class XmlUtils {

  // see http://stackoverflow.com/questions/4778865/php-simplexml-addchild-with-another-simplexmlelement
  public static function sxml_append(\SimpleXMLElement $to, \SimpleXMLElement $from) {
    $toDom = dom_import_simplexml($to);
    $fromDom = dom_import_simplexml($from);
    $toDom->appendChild($toDom->ownerDocument->importNode($fromDom, true));
  }

  public static function xml_escape($str) {
    return htmlspecialchars($str, ENT_XML1, 'UTF-8');
  }
}