<?php
$proxy = new SoapClient('http://54.85.223.106/api/v2_soap/'); // TODO : change url
$sessionId = $proxy->login('soaper', 'apikey123'); // TODO : change login and pwd if necessary

$result = $proxy->catalogProductAttributeMediaList($sessionId, 'msj006c-Royal Blue-L');
var_dump($result);

?>
