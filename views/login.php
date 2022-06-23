<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "includes/head.php" ?>
  <title>Connexion</title>
  <script defer src="/Public/Js/check-form/login.js"></script>

</head>

<body>
  <div class="wrapper">
    <?php require "includes/header.php" ?>

    <main class="form--container">
      <form id="form" enctype='multipart/form-data' class="form">
        <h2>Connection</h2>
        <div class="form__control">
          <label for="email" class="">Mail:</label>
          <input type="email" class="input-form" placeholder="Adresse mail" name="email" id="email">
        </div>

        <div class="form__control">
          <label for="" class="">Password:</label>
          <input type="password" value="" class="input-form" placeholder="Mot de passe" name="password" id="password">
        </div>

        <div class="form__control">
          <div class="form__remember">
            <input class="" type="checkbox" role="" id="">
            <label class="" for="">Se souvenir de moi </label>
          </div>

          <div class="form__link--register">
            <span>Pas encore membre?</span> <a href="/views/register.php">Inscription</a>
          </div>
        </div>
        <button class="form__btn--google">
          <img src="/Public/assets/icons/icon-google.svg" alt="">
          Se Connecter avec Google
        </button>

        <div class="form__submit">
          <button type="submit" class="btn small">Envoyer</button>
        </div>
        <p class="form__text">En vous inscrivant sur Math the printer, vous acceptez
          nos conditions d’utilisations, notre Politique de confidentialié
          et notre Politique concernant les cokkies
        </p>
      </form>
    </main>
    <?php require "includes/footer.php" ?>