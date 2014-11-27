<?php
  include("lib/nusoap.php");
  $client = new soapclient("http://localhost:8888/WebServiceSOAP_2/server.php?wsdl");
  $result    =    $client->gethelloworld("HELOOO");
  $result_test    =    $client->gettestifworks("NUMBER 2");

  echo "<pre>";
  print_r($result);
  echo "<br/><br/><br/>";
  print_r($result_test);
  echo "</pre>";

?>