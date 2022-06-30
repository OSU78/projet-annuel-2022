<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "includes/head.php" ?>
  <script defer src="/Public/Js/check-form/login.js"></script>
  <script defer src="/Public/Js/function.js"></script>

  <title>Connexion</title>
</head>

<body>
  <div class="wrapper">
    <?php require "includes/header.php" ?>
    <main class="form--container">
      <form id="form" enctype='multipart/form-data' class="form">
        <h2>Connection</h2>
        <div class="row message">
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
            <label for="" class="">Password:</label>
          </div>
          <div class="col-75">
            <input type="password" placeholder="Your password.." name="password" id="password">
          </div>
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

        <div class="row">
          <button class="form__btn--google col-25">
            <img src="/Public/assets/icons/icon-google.svg" alt="">
            Se Connecter avec Google
          </button>

        </div>
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
    <script src="/Public/Js/check.js"></script>