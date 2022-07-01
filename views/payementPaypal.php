<?php
require_once("../payement/paypal/PaypalPayment.php");

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/css/product.css" />
    <script defer src="/Public/Js/data.js"></script>
    <script defer src="/Public/Js/function.js"></script>
    <script defer src="/Public/Js/basketTooltip.js"></script>

    <title>Payement</title>

</head>


<body>
    <?php require "includes/header.php" ?>
    <main style="width: 100%; height: 60vh; gap: 15px; align-items: center; flex-direction: column; justify-content: center;" class="flex center">
        <h1 style="font-size: 45px">Page de payement</h1>
        <?php
        $payement = new PaypalPayement(PAYPAL_ID, PAYPAL_SECRET, true);
        echo $payement->ui();
        ?>
    </main>

    <?php require "includes/footer.php" ?>
    <!-- <script defer src="/Public/Js/getProduct.js"></script> -->