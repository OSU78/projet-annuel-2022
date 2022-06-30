<?php
require_once("PayPalPayment.php");
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payement</title>
</head>

<body>
    <main>
        <h1>Page de payement</h1>
        <?php
                $payement=new PaypalPayement(PAYPAL_ID,PAYPAL_SECRET,true);
               echo $payement->ui();
        ?>
    </main>

</body>

</html>