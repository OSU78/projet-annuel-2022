<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require "includes/head.php" ?>
  <script defer src="/Public/Js/check-form/register.js"></script>
  <title>Inscription</title>
</head>

<body>
  <style>
   
  </style>
  <?php require "includes/header.php" ?>
  <div class="wrapper" style="background-color:#0f0f0f !important">
    <form id="form" enctype='multipart/form-data'>
      <div class="form-control">
        <label for="" class="">Mail:</label>
        <input type="email" value="" name="email" id="email">
      </div>

      <div class="form-control">
        <label for="" class="">Password:</label>
        <input type="password" value="" class="" name="password" id="password">
      </div>

      <div class="form-control">
        <label for="" class="">Confirmer Password:</label>
        <input type="password" value="" class="" name="confirmpassword" id="confirmpassword">
      </div>

      <div class="">
        <input class="" type="checkbox" role="" id="">
        <label class="" for="">Se souvenir de moi </label>
      </div>
      <div class="">
        Deja membre? <a href="/views/login.php">Connexion</a>
      </div>
      <div class="submit">
        <button type="reset" class="btn btn-secondary">Fermer</button>
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </form>
  </div>
  <?php require "includes/footer.php" ?>