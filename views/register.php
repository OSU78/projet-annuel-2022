<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "includes/head.php" ?>
  <script defer src="/Public/Js/function.js"></script>
  <script defer src="/Public/Js/check-form/register.js"></script>
  <script defer src="/Public/Js/check-form/validateForm.js"></script>

  <title>Inscription</title>
</head>

<body>
  <div class="wrapper" style="background : #0f0f0f">
    <?php require "includes/header.php" ?>
    <main class="form--container row">
      <form id="form" enctype='multipart/form-data' class="form">
        <!-- <div class="container"> -->
        <h2>Enregistrement</h2>
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
          <div class="col-75 tooltip">
            <input type="password" id="password" name="password" placeholder="Your password.."
              pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}"
              title="Doit contenir au moins un chiffre et une lettre majuscule et minuscule, et au moins 8 caractères ou plus."
              required>
            <div class="tooltiptext" id="message">
              <h3>Le mot de passe doit contenir les éléments suivants:</h3>
              <p id="letter" class="invalid">A <b>Minuscule</b> lettre</p>
              <p id="capital" class="invalid">A <b>Majuscule</b> lettre</p>
              <p id="number" class="invalid">A <b>Numéro</b></p>
              <p id="length" class="invalid">Minimum <b>8 caractères</b></p>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-25">
            <label for="confirmpassword">Confirme mot de passe:</label>
          </div>
          <div class="col-75">
            <input type="password" placeholder="Confirm your password.." name="confirmpassword" id="confirmpassword">
          </div>
        </div>

        <div class="form__control">
          <div class="form__remember">
            <input class="" type="checkbox" role="" id="">
            <label class="" for="">Se souvenir de moi </label>
          </div>

          <div class="form__link--register">
            <span>Deja membre?</span> <a href="/views/login.php">Connection</a>
          </div>
        </div>
        <div class="row">
          <button class="form__btn--google col-25">
            <img src="/Public/assets/icons/icon-google.svg" alt="">
            S’inscrire avec Google
          </button>

        </div>
        <div class="form__submit">
          <button type="submit" class="btn small">Envoyer</button>
        </div>
        <p class="form__text">En vous inscrivant sur Math the printer, vous acceptez
          <a href="#">nos conditions d’utilisations</a>, notre <a href="#">Politique de confidentialié</a>
          et notre <a href="#">Politique concernant les cokkies</a>
        </p>
        <!-- </div> -->
      </form>
    </main>
    <?php require "includes/footer.php" ?>