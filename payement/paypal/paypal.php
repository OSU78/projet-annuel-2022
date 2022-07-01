<?php
require "vendor/autoload.php";
require_once "config.php";

$environment= new \PayPalCheckoutSdk\Core\SandboxEnvironment(PAYPAL_ID,PAYPAL_SECRET);

$client = new \PayPalCheckoutSdk\Core\PayPalHttpClient($environment);


$request = new \PayPalCheckoutSdk\Payments\AuthorizationsGetRequest(json_decode($_POST["authorizationId"]));
$response=$client->execute($request);
echo($response);
?>