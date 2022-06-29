<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "./views/includes/head.php" ?>
  <script defer src="/Public/Js/home.js"></script>
  <title>Home page</title>
</head>

<body>
  <div class="wrapper">
    <?php require "./views/includes/header.php" ?>
    <section class="banner">
      <video autoplay muted loop id="myVideo">
        <source src="/Public/assets/video/video-banner.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
      </video>
      <div class="banner__text">
        <h2>Plus qu'un art, une Passion</h2>
        <p>
          LoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLoremLore
        </p>
        <button class="btn__card">Découvrez notre travail</button>
      </div>
      <img onclick="myFunction()" id="myBtn" class="banner__play" src="/Public/assets/icons/icon-play.svg"
        alt="play-video">
    </section>

    <section class="artwork ">
      <div class="artwork__content  flex-item-left">
        <div class="artwork__content--text">
          <h2>Nos Oeuvres</h2>
          <p>
            Nous realisons des gravures d’univers médiéval fantaisie
            Réalisé à la main par nos soins.
          </p>
        </div>
        <div class="artwork__content--img">
          <img class="artwork__content--img__leaf" src="/Public/assets/img/leaf-bg-top.svg" alt="arrow">
        </div>
      </div>
      <div class="artwork__scroll flex-item-right">
        <img class="artwork__scroll--arrow prev" onclick="plusSlides(-1)" src="/Public/assets/icons/icon-left-arrow.svg"
          alt="left-arrow">
        <div class="artwork__scroll--galerie ">
          <img class="artwork__scroll--galerie__img fade" src="https://i.ibb.co/5vzDDqJ/insta-nov-35.webp"
            alt="Artwork">
          <img class="artwork__scroll--galerie__img fade" src="https://i.ibb.co/dG0jnX1/insta-nov-11.webp"
            alt="Artwork">
          <img class="artwork__scroll--galerie__img fade" src="https://i.ibb.co/jvQD7Hz/insta-nov-1.webp" alt="Artwork">
          <img class="artwork__scroll--galerie__img fade" src="https://i.ibb.co/bmwCMSw/website1.webp" alt="Artwork">
        </div>
        <img class="artwork__scroll--arrow next" onclick="plusSlides(1)" src="/Public/assets/icons/icon-right-arrow.svg"
          alt="right-arrow">
      </div>

    </section>
    <div class="svg">
      <svg width="1780" height="492" viewBox="0 0 1780 492" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_d_832_1136)">
          <path
            d="M133 129H1647V355C1647 355 1365.32 169.411 967.978 250.731C570.641 332.051 133 209.821 133 209.821V129Z"
            fill="#0f0f0f" />
        </g>
        <defs>
          <filter id="filter0_d_832_1136" x="0" y="0" width="1780" height="492" filterUnits="userSpaceOnUse"
            color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0"
              result="hardAlpha" />
            <feOffset dy="4" />
            <feGaussianBlur stdDeviation="66.5" />
            <feComposite in2="hardAlpha" operator="out" />
            <feColorMatrix type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.25 0" />
            <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_832_1136" />
            <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_832_1136" result="shape" />
          </filter>
        </defs>
      </svg>
    </div>
    <!-- <main class="main"> -->
    <section class="best-seller">
      <h2>Best Sellers</h2>
      <div class="best-seller__cards">
        <div class="card">
          <img src="Public/assets/img/product.svg" alt="">
          <div class="card__description">
            <div class="card__description--text">
              <p>Dimensions et description</p>
              <p>125 €</p>
            </div>
            <button class="btn__card">Ajouter au panier</button>
          </div>
        </div>
        <div class="card">
          <img src="Public/assets/img/product.svg" alt="">
          <div class="card__description">
            <div class="card__description--text">
              <p>Dimensions et description</p>
              <p>125 €</p>
            </div>
            <button class="btn__card">Ajouter au panier</button>
          </div>
        </div>
        <div class="card">
          <img src="Public/assets/img/product.svg" alt="">
          <div class="card__description">
            <div class="card__description--text">
              <p>Dimensions et description</p>
              <p>125 €</p>
            </div>
            <button class="btn__card">Ajouter au panier</button>
          </div>
        </div>
      </div>
      <button class="btn btn__best-seller">Voir notre catalogue de gravures ></button>
    </section>

    <section class="confiance">
      <div class="confiance__card">
        <img src="/Public/assets/icons/icon-confiance-france.svg" alt="">
        <p class="confiance__card--title">100% FRANÇAIS</p>
        <p class="confiance__card--text">Expédition sous 24h (laposte, UPS livraison)</p>
      </div>
      <div class="confiance__card">
        <img src="/Public/assets/icons/icon-confiance-main.svg" alt="">
        <p class="confiance__card--title">FAIT À LA MAIN</p>
        <p class="confiance__card--text">Toutes nos gravures sont réalisées à la main</p>
      </div>
      <div class="confiance__card">
        <img src="/Public/assets/icons/icon-confiance-camion.svg" alt="">
        <p class="confiance__card--title">PAIEMENT SÉCURISÉ</p>
        <p class="confiance__card--text">Paypal, Visa, Mastercard</p>
      </div>
      <div class="confiance__card">
        <img src="/Public/assets/icons/icon-confiance-contact.svg" alt="">
        <p class="confiance__card--title">BESOIN D'AIDE</p>
        <p class="confiance__card--text">Contactez-nous du lundi au samedi de 9h à 19h</p>
      </div>
    </section>

    <section class="custom">
      <div class="custom__text">
        <h2>Envie de customisation</h2>
        <p>Nous réalisons des gravures d'univers médiéval & fantaisiste. Réalisé à la main, par nos soins.</p>
        <button class="btn">Contactez nous maintenant</button>
      </div>
      <img src="/Public/assets/img/custom-img.svg" alt="">
    </section>

    <section class="math-description">
      <h3>Description Math, son travail et photo</h3>
      <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro numquam maxime quam cum, libero minus optio! Sit
        quasi, corrupti quod deleniti, expedita aspernatur similique tempora, aliquam quae rerum nam perspiciatis.</p>
    </section>
    <?php require "./views/includes/footer.php" ?>