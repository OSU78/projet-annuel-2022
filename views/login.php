<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require "includes/head.php" ?>
  <script defer src="/Public/Js/check-form/login.js"></script>
  <title>Connexion</title>
</head>

<body>
  <?php require "includes/header.php" ?>
  <div class="wrapper">
    <form id="form" enctype='multipart/form-data'>
      <div class="form-control">
        <label for="email" class="">Mail:</label>
        <input type="email" value="" name="email" id="email">
      </div>

      <div class="form-control">
        <label for="" class="">Password:</label>
        <input type="password" value="" class="" name="password" id="password">
      </div>

      <div class="form-control">
        <input class="" type="checkbox" role="" id="">
        <label class="" for="">Se souvenir de moi </label>
      </div>
      <div class="">
        Pas encore membre? <a href="/views/register.php">Inscription</a>
      </div>
      <div class="submit">
        <button type="reset" class="btn btn-secondary">Fermer</button>
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </form>
  </div>
  <?php require "includes/footer.php" ?>