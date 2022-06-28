<!DOCTYPE html>
<html lang="en">

<head>
  <?php require "includes/head.php" ?>
  <link rel="stylesheet" href="/Public/css/product.css" />
  <script defer src="/Public/Js/function.js"></script>
  <script defer src="/Public/Js/getProduct.js"></script>
  <title>Nos gravures</title>

</head>

<body>
  <?php require "includes/header.php" ?>

  <!-- <header class="header" role="header">
    <nav class="header__nav">
      <a href="#">Nos Oeuvres</a>
      <a href="#">Personnaliser une création</a>
      <img loading="lazy" src="/Public/assets/img/logo-header.svg" alt="Logo" width="320" height="104">
      <a href="#">À propos</a>
      <a href="panier.html" class="header__nav--badge">

        <div class="tooltip">
          <img src="/Public/assets/icons/icon-backet.svg" alt="Panier">
          <div class="bottom"
            style="background-color:#0f0f0f;color:white;padding : 25px;border: 1px solid rgba(253, 253, 253, 0.355)">
            <h3 style="margin: 0px;font-size:30px;font-weight: 100;">Mon panier</h3>
            <div class="panier_item"
              style="display: flex;justify-content:center;align-item:center;flex-direction:row;gap: 15px ;padding:25px;font-size: 12px;">

              <img class="panier_item_product_img" src="https://picsum.photos/60/60" alt=""
                style="border: 1px solid white">
              <div class="" style="display: flex;flex-direction:column">
                <div class="flex row gap10">
                  <p style="width: max-content;font-size: 22px; margin-bottom: 5px;">Gravure fait à la main art</p>
                </div>
                <div class="flex row gap10 colorGray" style="width: max-content">
                  <p>Quantité :</p>
                  <p>25</p>
                </div>
                <div class="flex row gap10 colorGray" style="width: max-content">
                  <p>Montant :</p>
                  <p>259€</p>
                </div>
              </div>
            </div>
            <div class="flex center column gap10">
              <a href="panier.html" class="panier_btn_headerSecondary scaleHover">Editer</a>
              <a href="panier.html" class="panier_btn_header scaleHover">Passer à la commande</a>
            </div>
          </div>
          <div class="badge flex center">
            <p>6</p>
          </div>
        </div>

      </a>
      <a href="views/login.html">
        <img loading="lazy" src="/Public/assets/icons/icon-profil.svg" alt="Utilisateur">
      </a>
    </nav>
  </header> -->
  <main style="height: 100%">
    <div id="snackbar">Produit ajouté au panier</div>
    <section class="flex center">
      <div id="snackbar">Produit Ajouté avec succes..</div>
      <!-- Section 1 des produits -->
      <section id="product_s1">
        <!-- Galerie GAUGHE des produits -->
        <div class="product_s1_card">
          <!-- <img class="product_s1_card_img" src="/Public/assets/product.svg" alt="gravure 1" srcset="" />
          <div class="flex gap10 column">
            <p class="product_s1_card_name">Gravure médievale</p>
            <div class="product_s1_card_detail">
              <p class="product_s1_card_price">125€</p>
              <a href="#" class="product_s1_card_btn">Ajouter au panier</a>
            </div>
          </div> -->
        </div>
        <!-- Galerie droite des produits -->
        <div class="product_s2_mini">
          <!-- <div class="product_s1_card mini_card">
            <img class="product_s1_card_img m2" style="height: 75%" src="/Public/assets/product.svg" alt="gravure 2"
              srcset="" />
            <div class="flex gap10 column">
              <p class="product_s1_card_name">Gravure médievale</p>
              <div class="product_s1_card_detail">
                <p class="product_s1_card_price">125€</p>
                <a href="#" class="product_s1_card_btn mini_btn">Ajouter au panier</a>
              </div>
            </div>
          </div>
          <div class="product_s1_card mini_card">
            <img class="product_s1_card_img m2" style="height: 75%" src="/Public/assets/product.svg" alt="gravure 3"
              srcset="" />
            <div class="flex gap10 column">
              <p class="product_s1_card_name">Gravure médievale</p>
              <div class="product_s1_card_detail">
                <p class="product_s1_card_price">125€</p>
                <a href="#" class="product_s1_card_btn mini_btn">Ajouter au panier</a>
              </div>
            </div>
          </div> -->
        </div>
      </section>
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

    <!-- Section 2 des produits -->
    <section class="flex center spaceBt padding20 gap20">
      <div class="flex center spaceBt padding20 gap20 width1180" id="card--container">

      </div>
      <!-- <div class="card linear_gradian">
        <img loading="lazy" src="/Public/assets/product.svg" alt="" />
        <div class="card__description">
          <div class="card__description--text">
            <p>Dimensions et description</p>
            <p>125 €</p>
          </div>
          <button class="btn_card2">Ajouter au panier</button>
        </div>
      </div>

      <div class="card linear_gradian">
        <img loading="lazy" src="/Public/assets/product.svg" alt="" />
        <div class="card__description">
          <div class="card__description--text">
            <p>Dimensions et description</p>
            <p>125 €</p>
          </div>
          <button class="btn_card2">Ajouter au panier</button>
        </div>
      </div>

      <div class="card linear_gradian">
        <img loading="lazy" src="/Public/assets/product.svg" alt="" />
        <div class="card__description">
          <div class="card__description--text">
            <p>Dimensions et description</p>
            <p>125 €</p>
          </div>
          <button class="btn_card2">Ajouter au panier</button>
        </div>
      </div> -->
    </section>

    <!-- Section 3 des produits -->
    <section>
      <section id="product_s1" class="transparent">
        <!-- Galerie GAUGHE des produits -->
        <div class="product_s1_card linear_gradian" id="product_s1_cardSix">
          <!-- <img class="product_s1_card_img" src="/Public/assets/product.svg" alt="gravure 1" srcset="" />
          <div class="flex gap10 column">
            <p class="product_s1_card_name">Gravure médievale</p>
            <div class="product_s1_card_detail">
              <p class="product_s1_card_price">125€</p>
              <a href="#" class="product_s1_card_btn">Ajouter au panier</a>
            </div>
          </div> -->
        </div>
        <!-- Galerie droite des produits -->
        <div class="product_s2_mini" id="product_s2_mini">
          <!-- <div class="product_s1_card mini_card linear_gradian">
            <img class="product_s1_card_img m2" style="height: 75%" src="/Public/assets/product.svg" alt="gravure 2"
              srcset="" />
            <div class="flex gap10 column">
              <p class="product_s1_card_name"></p>
              <div class="product_s1_card_detail">
                <p class="product_s1_card_price">€</p>
                <button class="product_s1_card_btn mini_btn">Ajouter au panier</button>
              </div>
            </div>
          </div>
          <div class="product_s1_card mini_card linear_gradian">
            <img class="product_s1_card_img m2" style="height: 75%" src="/Public/assets/product.svg" alt="gravure 3"
              srcset="" />
            <div class="flex gap10 column">
              <p class="product_s1_card_name">Gravure médievale</p>
              <div class="product_s1_card_detail">
                <p class="product_s1_card_price">125€</p>
                <a href="#" class="product_s1_card_btn mini_btn">Ajouter au panier</a>
              </div>
            </div>
          </div> -->
        </div>
      </section>
    </section>
  </main>
  <?php require "includes/footer.php" ?>