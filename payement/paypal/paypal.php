<?php
require "vendor/autoload.php";

$environment= new \PayPalCheckoutSdk\Core\SandboxEnvironment(PAYPAL_ID,PAYPAL_SECRET);

$client = new \PayPalCheckoutSdk\Core\PayPalHttpClient($environment);


$request = new \PayPalCheckoutSdk\Payments\AuthorizationsGetRequest($_GET["authorizationId"]);
$response=$client->execute($request);
echo($response);
?>