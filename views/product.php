<!DOCTYPE html>
<html lang="fr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Public/css/product.css" />
  <script src="/Public/Js/data.js"></script>
  <script defer src="/Public/Js/function.js"></script>
  <script defer src="/Public/Js/basketTooltip.js"></script>

  <title>Nos gravures</title>

</head>

<body>
  <?php require "includes/header.php" ?>
  <main style="height: 100%">
    <div id="snackbar">Produit ajouté au panier</div>
    <section class="flex center">
      <div id="snackbar">Produit Ajouté avec succes..</div>
      <!-- Section 1 des produits -->
      <!-- <div class="loader"></div> -->

      <section id="product_s1">
        <!-- Galerie GAUGHE des produits -->
        <div class="product_s1_card">

        </div>
        <!-- Galerie droite des produits -->
        <div class="product_s2_mini">

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

    </section>

    <!-- Section 3 des produits -->
    <section>
      <section id="product_s1" class="transparent">
        <!-- Galerie GAUGHE des produits -->
        <div class="product_s1_card linear_gradian" id="product_s1_cardSix">

        </div>
        <!-- Galerie droite des produits -->
        <div class="product_s2_mini" id="product_s2_mini">

        </div>
      </section>
    </section>
  </main>

  <?php require "includes/footer.php" ?>
  <script defer src="/Public/Js/getProduct.js"></script>