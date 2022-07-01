<?php
require '../config.php';
$authDB = require_once '../Models/Security.php';
$currentUser = $authDB->isLoggedin();
//var_dump($currentUser);
if (!$currentUser) {
  // header('Location: /');
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <script type="text/javascript"
    src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCywaY5J6pQy-QjxVyM0tQu7Rn6KYCmvSY"></script>
  <script defer src="/Public/Js/function.js"></script>
  <script defer src="/Public/Js/updateUser.js"></script>
  <script defer src="/Public/Js/order.js"></script>

  <script defer src="/Public/Js/api/google/adress.js"></script>
  <link rel="stylesheet" href="/Public/css/product.css" />
  <link rel="stylesheet" href="/Public/css/panier.css" />
  <link rel="stylesheet" href="/Public/css/repearTooltip.css">
  <?php require "includes/head.php" ?>

  <title>Mise à jour information</title>
</head>

<body>
<style>
  
p,a,li,ul,label{
  font-family: sans-serif !important;
}
  .badge {
  border-radius: 0px;
  background-color: #ffffff;
  color: black;
  text-align: center !important;
  position: absolute !important;
  width: 30px !important;
  text-align: center !important;
  padding: 5px !important;
  height: 20px !important;
  font-size: 13px !important;
  top: 24px !important;
  left: 12px !important;
  transition: 0.35s;
  user-select: none;
  cursor: pointer;
}

</style>
  <div class="wrapper" style="background: #0f0f0f;">
    <?php require "includes/header.php" ?>

    <form id="form" enctype='multipart/form-data' class="form">
      <h2>Compete information</h2>
      <div class="container">
        <div class="row">
          <div class="col-25">
            <label for="firstname">Nom:</label>
          </div>
          <div class="col-75">
            <input type="text" id="firstname" name="firstname" placeholder="Your name..">
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="lastname">Prenom:</label>
          </div>
          <div class="col-75">
            <input type="text" id="lastname" name="lastname" placeholder="Your last name..">
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="email">Mail:</label>
          </div>
          <div class="col-75">
            <input type="email" id="email" name="email" placeholder="Your e-mail..">
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="tel_1">Telephone n°1:</label>
          </div>
          <div class="col-75">
            <input type="text" id="tel_1" name="tel_1" placeholder="Your firs phone number..">
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="tel_2">Telephone n°2:</label>
          </div>
          <div class="col-75">
            <input type="text" id="tel_2" name="tel_2" placeholder="Your last phone number..">
          </div>
        </div>

        <br>
        <div class="collapsible ">Adresse</div>

        <div class="content">
          <div class="row">
            <div class="col-25">
              <label for="street_number">Tapper votre adresse</label>
            </div>
            <div class="col-75">
              <input type="text" id="user_input_autocomplete_address" placeholder="Search your address..">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="street_number">Numero de rue:</label>
            </div>
            <div class="col-75">
              <input type="text" id="street_number" name="street_number" placeholder="Your street number..">
            </div>
          </div>
          <div class="row">
            <div class="col-25">
              <label for="route">Rue:</label>
            </div>
            <div class="col-75">
              <input type="text" id="route" name="route" placeholder="Your street..">
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="postalCode">Code postal:</label>
            </div>
            <div class="col-75">
              <input type="text" id="postalCode" name="postalCode" placeholder="Your postal code..">
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="locality">Ville:</label>
            </div>
            <div class="col-75">
              <input type="text" id="locality" name="locality" placeholder="Your twon..">
            </div>
          </div>

          <div class="row">
            <div class="col-25">
              <label for="country">Pays:</label>
            </div>
            <div class="col-75">
              <input type="text" id="country" name="country" placeholder="Your country..">
            </div>
          </div>
          <div class="row">
            <button id="cmd"
              class="product_s1_card_btn widthMax heightMin scaleHover borderBlackHover">Commander</button>
          </div>
        </div>
      </div>
    </form>
    <?php require "includes/footer.php" ?>