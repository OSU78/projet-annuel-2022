<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "includes/head.php" ?>
  <script defer src="/Public/Js/check-form/login.js"></script>
  <script defer src="/Public/Js/function.js"></script>

  <title>Connexion</title>
</head>

<body>
  <style>
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


  .tooltip {
    display: inline-block;
    position: relative;
    border-bottom: 1px dotted #666;
    text-align: left;
  }

  .tooltip h3 {
    margin: 12px 0;
  }


  .tooltip .bottom {
    min-width: 250px;
    position: absolute;
    top: 40px;
    left: 80%;
    transform: translate(-80%, 0);

    font-weight: normal;
    font-size: 13px;
    border-radius: 8px;
    z-index: 999999999999999999999999;
    box-sizing: border-box;
    box-shadow: 0 1px 8px rgba(0, 0, 0, 0.5);
    display: none;
  }

  .tooltip:hover .bottom {
    display: flex;
    background-color: #0f0f0f;
    color: white;
    padding: 25px;
    border: 1px solid rgba(253, 253, 253, 0.355);
    flex-direction: column-reverse;
  }

  .tooltip .bottom img {
    width: 100%;
    max-width: 200px;
    height: auto;
  }

  .tooltip .bottom i {
    position: absolute;
    bottom: 100%;
    left: 0%;
    right: 20%;
    margin-left: -10px;
    width: 24px;
    height: 12px;
    overflow: hidden;
  }

  .tooltip .bottom i::after {
    content: "";
    position: absolute;
    width: 12px;
    height: 12px;
    left: 50%;
    transform: translate(-50%, 50%) rotate(45deg);
    background-color: #eeeeee;
    box-shadow: 0 1px 8px rgba(0, 0, 0, 0.5);
  }

  .bottom p {
    top: 45px;
    margin: 0px;
  }

  .indeFlex {
    flex-direction: column !important;
    gap: 10px !important;
  }

  .panier_btn_headerSecondary {
    background-color: #f1bc1e;
    padding: 10px 10px;
    border-radius: 10px;
    color: #0f0f0f !important;
    text-decoration-line: none;
    transition: 0.3s;
    width: -webkit-fill-available;
    font-family: sans-serif;
    font-size: 15px;
    text-align: center;
  }

  .panier_btn_headerSecondary {
    background-color: #ffffff22;
    color: rgba(255, 255, 255, 0.729) !important;
  }

  .panier_btn_headerSecondary:hover {
    background-color: #ffffff54;
    color: rgb(255, 255, 255) !important;
    transition: 0.3s;
  }

  .panier_btn_header {
    background-color: #f1bc1e;
    padding: 10px 10px;
    border-radius: 10px;
    color: #0f0f0f !important;
    text-decoration-line: none;
    transition: 0.3s;
    width: -webkit-fill-available;
    font-family: sans-serif;
    font-size: 15px;
    text-align: center;
  }

  .panier_btn_header:hover {
    background-color: #ffffff;
    color: #0f0f0f;
    transition: 0.3s;
  }
  </style>
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
          <button class="form__btn--google">
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
    <!-- <script src="/Public/Js/check.js"></script> -->