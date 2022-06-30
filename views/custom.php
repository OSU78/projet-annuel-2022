<!DOCTYPE html>
<html lang="fr">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/Public/css/product.css" />
  <link rel="stylesheet" href="/Public/css/custom.css">
  <script src="/Public/Js/data.js"></script>
  <script defer src="/Public/Js/function.js"></script>
  <script defer src="/Public/Js/basketTooltip.js"></script>

  <title>Personnalisez votre création</title>
</head>

<body>
  <?php require "includes/header.php" ?>
  <main>
    <div class="wrapper__custom">
        
        <section class="produit">
            <h1 class="mgLeft20">Personnalisez votre création</h1>
            <div class="produit__carroussel">
                <div class="produit__carroussel--photo">
                    <img class="produit__scroll--arrow prev" onclick="plusSlides(-1)" src="/Public/assets/icons/icon-left-arrow.svg" alt="left-arrow">
                    <div class="produit__scroll">
                        <img class="produit__scroll--img fade cover" src="https://i.ibb.co/bmwCMSw/website1.webp" alt="Produit">
                        <img class="produit__scroll--img fade cover" src="https://i.ibb.co/bmwCMSw/website1.webp" alt="Produit">
                        <img class="produit__scroll--img fade cover" src="https://i.ibb.co/bmwCMSw/website1.webp" alt="Produit">
                      <img class="produit__scroll--img fade cover" src="https://i.ibb.co/bmwCMSw/website1.webp" alt="Produit">
                      <img class="produit__scroll--img fade cover" src="https://i.ibb.co/bmwCMSw/website1.webp" alt="Produit">
                    </div>
                    <img class="produit__scroll--arrow next" onclick="plusSlides(1)" src="/Public/assets/icons/icon-right-arrow.svg" alt="right-arrow">  
                </div>
            </div>
            <p>Voici la dernière commande personnalisée de nos clients</p>
        </section>
        <section class="flex center width100">
        <section class="formulaire">
            <h2>Créez votre oeuvre</h2>
            <p>Formulaire de contact pour une personnalisation complète</p>
            <form id="form" enctype='multipart/form-data' class="form">
                <div class="row">
                  <div class="col-25">
                    <label for="email">Mail :</label>
                  </div>
                  <div class="col-75">
                    <input type="email" id="email" name="email" placeholder="Adresse e-mail...">
                  </div>
                </div>

                <div class="row">
                    <div class="col-25">
                      <label for="support">Choix du support :</label>
                    </div>
                    <select class="col-75">
                        <option value="">Choisissez votre support...</option>
                        <option value="">Papier</option>
                        <option value="">Bois</option>
                    </select>
                </div>

                <div class="row">
                    <div class="col-25">
                      <label for="style">Choix du style :</label>
                    </div>
                    <select class="col-75">
                        <option value="">Choisissez votre style...</option>
                        <option value="">Médiéval</option>
                        <option value="">Heroic fantasy</option>
                    </select>
                </div>
        
                <div class="row">
                    <div class="col-25">
                      <label for="description">Description :</label>
                    </div>
                    <div class="col-75">
                        <textarea class="description__projet" name="description" id="description" cols="30" rows="10">Décrivez votre projet !</textarea>
                    </div>
                </div>

                <div class="form__submit">
                  <button type="submit" class="btn small marginTop20" style="padding: 5px 50px;">Envoyer</button>
                </div>

              </form>
        </section>
        </section>
        

        <section class="avis">
            <h2>Ils nous ont apprécié</h2>
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
    </div>
    

    </main>
    <script src="/Public/Js/detailProduit.js"></script>
    <?php require "includes/footer.php" ?>