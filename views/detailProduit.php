<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Public/css/detailProduit.css">
  <script defer src="/Public/Js/detailProduit.js"></script>
  <script defer src="/Public/Js/detailProd.js"></script>
  <title>Détail produit</title>
</head>

<body>
  <?php require "includes/header.php" ?>
  <div class="wrapper__produit-single">
    <section class="produit">
      <div class="produit__carroussel">
        <p class="produit__nom">Empreinte de main linogravure sur kozo - Seigneur des anneaux, Eowyn contre le
          roi sorcier</p>
        <div class="produit__carroussel--photo">
          <img class="produit__scroll--arrow prev" onclick="plusSlides(-1)"
            src="/Public/assets/icons/icon-left-arrow.svg" alt="left-arrow">
          <div class="produit__scroll">
            <img class="produit__scroll--img fade" src="https://i.ibb.co/gTZMkQP/IMG-20220609-165546.jpg" alt="Produit">
            <img class="produit__scroll--img fade" src="https://i.ibb.co/hM8fjQ8/thrn-7.jpg" alt="Produit">
            <img class="produit__scroll--img fade" src="https://i.ibb.co/0j5JQ4p/thrn-1-2.jpg" alt="Produit">
            <img class="produit__scroll--img fade" src="https://i.ibb.co/N9dBWdc/IMG-20220223-152446.jpg" alt="Produit">
            <img class="produit__scroll--img fade" src="https://i.ibb.co/NFLB0wh/IMG-20220203-132805.jpg" alt="Produit">
          </div>
          <img class="produit__scroll--arrow next" onclick="plusSlides(1)"
            src="/Public/assets/icons/icon-right-arrow.svg" alt="right-arrow">
        </div>
      </div>
      <aside class="produit__detail">
        <div class="produit__confiance--container">
          <div class="produit__confiance">
            <img class="produit__confiance--icon" src="/Public/assets/icons/detailProduit/icon-securise.svg"
              alt="icon securisé">
            <p>Transaction sécurisée</p>
          </div>
          <div class="produit__confiance">
            <img class="produit__confiance--icon" src="/Public/assets/icons/detailProduit/icon-expedition.svg"
              alt="icon expedition">
            <p>Expédié par nos soins</p>
          </div>

          <div class="produit__confiance">
            <img class="produit__confiance--icon" src="/Public/assets/icons/detailProduit/icon-fait-main.svg"
              alt="icon fait main">
            <p>Fait main</p>
          </div>
          <div class="produit__confiance">
            <img class="produit__confiance--icon" src="/Public/assets/icons/detailProduit/icon-livraison.svg"
              alt="icon livraison">
            <p>Livré en 7j</p>
          </div>
          <div class="produit__confiance">
            <img class="produit__confiance--icon" src="/Public/assets/icons/detailProduit/icon-en-stock.svg"
              alt="icon en stock">
            <p>En stock</p>
          </div>
        </div>
        <div class="produit__prix">
          <p>40 €</p>
          <button class="btn">Ajouter au panier</button>
        </div>
      </aside>
    </section>
    <div class="produit__description">
      <p>Empreinte de main linogravure sur kozo - Seigneur des anneaux, Eowyn contre le roi sorcier</p>
      <p>Il s'agit d'une interprétation libre du duel d'Eowyn contre leRoi Sorcier d'Angmar, lors de la bataille
        de Minas Tirith. Cette interprétation s'inspire principalement de la description du livre, essayant de
        ressembler aux gravures sur bois du XVème siècle</p>
    </div>
    <div class="separation-jaune"></div>
    <section class="avis">
      <h2>23 avis sur cette création</h2>
      <div class="avis__container">
        <div class="avis__single">
          <img src="/Public/assets/icons/detailProduit/photo-avis-manu.svg" alt="">
          <div class="avis__single--text">
            <div class="avis__single--titre">
              <p class="avis__prenom">Manu</p>
              <p class="avis__date">12 juin 2022</p>
            </div>
            <p>“ Magnifique j’en ai pris 4 pour ma salle de réunion “</p>
          </div>
        </div>
        <div class="avis__single">
          <img src="/Public/assets/icons/detailProduit/photo-avis-chris.svg" alt="">
          <div class="avis__single--text">
            <div class="avis__single--titre">
              <p class="avis__prenom">Chris</p>
              <p class="avis__date">08 mai 2022</p>
            </div>
            <p>“ Somptueux ! Superbe !“</p>
          </div>
        </div>
        <div class="avis__single">
          <img src="/Public/assets/icons/detailProduit/photo-avis-alexandre.svg" alt="">
          <div class="avis__single--text">
            <div class="avis__single--titre">
              <p class="avis__prenom">Alexandre</p>
              <p class="avis__date">03 mars 2022</p>
            </div>
            <p>“ C’est pas faux ! looool !“</p>
          </div>
        </div>
      </div>
    </section>

    <section class="interet">
      <h2>Peut aussi vous intéresser</h2>
      <div class="interet__cards">
        <div class="card">
          <img src="/Public/assets/img/product.svg" alt="">
          <div class="card__description">
            <div class="card__description--text">
              <p>Dimensions et description</p>
              <p>125 €</p>
            </div>
            <button class="btn__card btn__card--text">Ajouter au panier</button>
            <button class="btn__card btn__card--logo"><img src="/Public/assets/icons/icon-panier-card.svg"
                alt="icon panier"></button>
          </div>
        </div>
        <div class="card">
          <img src="/Public/assets/img/product.svg" alt="">
          <div class="card__description">
            <div class="card__description--text">
              <p>Dimensions et description</p>
              <p>125 €</p>
            </div>
            <button class="btn__card btn__card--text">Ajouter au panier</button>
            <button class="btn__card btn__card--logo"><img src="/Public/assets/icons/icon-panier-card.svg"
                alt="icon panier"></button>
          </div>
        </div>
        <div class="card">
          <img src="/Public/assets/img/product.svg" alt="">
          <div class="card__description">
            <div class="card__description--text">
              <p>Dimensions et description</p>
              <p>125 €</p>
            </div>
            <button class="btn__card btn__card--text">Ajouter au panier</button>
            <button class="btn__card btn__card--logo"><img src="/Public/assets/icons/icon-panier-card.svg"
                alt="icon panier"></button>
          </div>
        </div>
      </div>
    </section>

    <?php require "includes/footer.php" ?>