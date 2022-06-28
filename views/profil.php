<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require "includes/head.php" ?>
  <!-- les scripts -->
  <script defer src="/Public/Js/profil.js"></script>
  <script defer src="/Public/Js/basket.js"></script>


  <title>profile</title>
</head>

<body>
  <?php require "includes/header.php" ?>
  <div class="wrapper" id="wrapper">
    <div class="alert"></div>
    <main class="main">
      <div class="profil">
        <div class="profil__container">
          <h2>Mes commandes</h2>
        </div>
        <div class="profil__container">
          <h2>Adresse et paiements</h2>
        </div>
        <div class="profil__container">
          <h2>Connexion & sécurité</h2>
        </div>
      </div>
    </main>
  </div>
  <?php require "includes/footer.php" ?>

  <!-- <label for="psw">Password</label>
  <input type="password" id="psw" name="psw" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required> -->