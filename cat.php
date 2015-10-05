<?
php $proxy = new SoapClient('http://127.0.0.1/api/v2_soap/?wsdl'); // TODO : change url
$sessionId = $proxy->login('cats', 'apikey123'); // TODO : change login and pwd if necessary

$result = $proxy->catalogCategoryTree($sessionId);
var_dump($result);
?>
