<?php
$proxy = new SoapClient('http://127.0.0.1/magento/index.php/api/v2_soap/?wsdl');


$sessionId = $proxy->login('cats', 'sudhir123');

$result = $proxy->catalogCategoryTree($sessionId);
var_dump($result);
  
?>
