<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "includes/head.php" ?>

  <link rel="stylesheet" href="/Public/css/style.css">
  <script defer src="/Public/Js/basket.js"></script>

  <title>home</title>
</head>

<body>
  <div class="wrapper">
    <?php require "includes/header.php" ?>
    <!-- le main -->
    <main class="main">
      <div class="profil">
        <div class="profil__container">
          <h2><a href="/views/order.php" class="profil__container">Mes commandes</a></h2>
        </div>
        <div class="profil__container">
          <h2><a href="/views/completUserDelivery.html" class="profil__container">Adresse et paiements</a></h2>
        </div>
        <div class="profil__container">
          <h2><a href="/views/completUserDelivery.php" class="profil__container">Edité vos information</a></h2>
        </div>
      </div>
    </main>
    <?php require "includes/footer.php" ?>