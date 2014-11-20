<?php

  require_once("lib/nusoap.php");
  
  //The nusoap method seems to be out of date, PHP5 can handle SOAP within itself
  $server = new soap_server();
 
  //Try to prevent the wsdl caching
  ini_set("soap.wsdl_cache_enabled", "0");

  $server->configureWSDL("Testing WSDL ","http://localhost:8888/WebServiceSOAP/server.php?wsdl");

  $server->register("gethelloworld",array("name" => "xsd:string"),array("return" => "xsd:string"),"urn:helloworld","urn:helloworld#gethelloworld");
  $server->register("gettestifworks",array("someName" => "xsd:string"),array("return" => "xsd:string"),"urn:testifworks","urn:testifworks#gettestifworks");

  function gethelloworld($name) {
    $myname    =    "My Name Is SEGA <b>".$name . "</b>";
    return $myname;
  }

  function gettestifworks($someName) {
    $myname    =    "My Name Is <b>".$someName."</b>";
    return $myname;
  }

  $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
  $server->service($HTTP_RAW_POST_DATA);
?>