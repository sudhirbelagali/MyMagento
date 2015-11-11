<?php
$proxy = new SoapClient('http://127.0.0.1/magento/index.php/api/v2_soap/?wsdl');

$sessionId = $proxy->login('cats', 'sudhir123');
echo "\nSession Id = ";
var_dump($sessionId);

$cartId = $proxy->shoppingCartCreate($sessionId, '3');
echo "\nCart Id = ";
var_dump($cartId);

$customerData = array(
    "firstname" => "testFirstname",
    "lastname" => "testLastName",
    "email" => "testEmail@mail.com",
    "mode" => "guest",
    "website_id" => "0"
      );
$resultCustomerSet = $proxy->shoppingCartCustomerSet($sessionId, $cartId, $customerData);
echo "\nCustomer Set to Shopping Cart = ";
var_dump($resultCustomerSet);

$customeraddress = $proxy->shoppingCartCustomerAddresses($sessionId, $cartId, array(array(
'mode' => 'billing',
'firstname' => 'Sudhir',
'lastname' => 'Belagali',
'street' => 'sanmati marg',
'city' => 'dharwad',
'region' => 'dharwad',
'postcode' => '580001',
'country_id' => 'India',
'telephone' => '9538647544',
'is_default_billing' => 1
)));   
echo "\nCustomer Address Set to Shopping Cart = ";
var_dump($customeraddress);

$shoppingcartproduct = $proxy->shoppingCartProductAdd($sessionId, $cartId, array(array(
'product_id' => '917',
'sku' => 'cricketbat',
'qty' => '5',
'options' => null,
'bundle_option' => null,
'bundle_option_qty' => null,
'links' => null
)));   
echo "\nProduct has been added to cart = ";
var_dump($shoppingcartproduct);


//$cartInfo = $proxy->shoppingCartInfo($sessionId, $cartId);
//echo "\nCart Information for this Cart Id is ( ".$cartId." )";
//var_dump($cartInfo);
// get list of shipping methods

$resultShippingMethods = $proxy->shoppingCartShippingList($sessionId, $cartId);
echo "\nAvailable shipping methods = \n";
var_dump($resultShippingMethods);

// set shipping method

$randShippingMethodIndex = rand(0, count($resultShippingMethods)-1 );
//$shippingMethod = $resultShippingMethods[$randShippingMethodIndex]["code"];
$resultShippingMethod = $proxy->shoppingCartShippingMethod($sessionId,  $cartId,"freeshipping_freeshipping");
echo "\nFinal result\n";
var_dump($resultShippingMethod);


$result = $proxy->shoppingCartShippingList($sessionId, $cartId);   
echo "\nAvailable Shipping methods = ";
var_dump($result);



?>


