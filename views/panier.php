<!DOCTYPE html>
<html lang="fr">

<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Panier</title>
  <link rel="stylesheet" href="/Public/css/product.css" />
  <link rel="stylesheet" href="/Public/css/panier.css" />

  <!-- le script js -->
  <script defer src="/Public/Js/function.js"></script>
  <script defer src="/Public/Js/addBasket.js"></script>
</head>

<body>
  <?php require "includes/header.php" ?>
  <main class="bg-black">
    <div class="flex center">
      <div class="align_left width67">
        <h1 class="enchanted white ft45">Panier</h1>
      </div>

    </div>
    <section class="flex center padding20 controlPadding">
      <div class="width100 bg-white pd25 borderRadius7 controlPadding2">

        <section class="panier_header">
          <div class="text_center panier_item_width20">N°</div>
          <div class="text_center panier_item_width90">Article</div>
          <div class="text_center panier_item_width200">Description</div>
          <div class="text_center panier_item_width60">Montant</div>
          <div class="text_center panier_item_width80">Etat</div>
          <div class="text_center panier_item_width110">Qté</div>
        </section>

        <div id="panierList" class="contentBaskets">
          <!-- le contenu du paanier -->

        </div>

        <div class="flex gap15 width100 center pd1012" style="justify-content: flex-end;">
          <div class="flex center gap10 pd13"
            style="background-color: white;border:1px solid #0f0f0f;border-radius:10px">
            <p>Total : </p>
            <p id="total-basket">___€</p>
          </div>
          <div>
            <a href="#" class="product_s1_card_btn widthMax heightMin scaleHover borderBlackHover">Commander</a>
          </div>
        </div>

      </div>
    </section>


  </main>
</body>

</html>