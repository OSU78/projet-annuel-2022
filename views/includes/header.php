    <header class="header">
      <a class="active" href="#contact">Personnaliser une création</a>
      <a href="#about">Nos Oeuvres</a>
      <a href="/index.php" class="logo">
        <img src="/Public/assets/img/logo-header.svg" alt="Logo">
      </a>
      <a href="#">
        <!-- TOOLTIP -->

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
      <a href="views/login.php">
        <img src="/Public/assets/icons/icon-profil.svg" alt="Utilisateur">
      </a>
    </header>
    <!-- logo mobile -->
    <div class="header--mobile">
      <div class="row">
        <div class="col-75">
          <input type="text" class="search-btn" name="search" placeholder="Search..">
        </div>
      </div>
      <a href="/index.php" class="logo">
        <img src="/Public/assets/img/logo-header.svg" alt="Logo">
      </a>
    </div>
    <section class="header-menu__mobile slide-bottom">
      <ul class="nav--menu">
        <li class="item">
          <a href="/index.php">Home </a>
          <img src="/Public/assets/icons/logoMobile.png" alt="home">
        </li>
        <li class="item">
          <a href="/views/product.php">Nos Oeuvres</a>
          <img src="/Public/assets/icons/search.svg" alt="search">
        </li>
        <li class="item">
          <a href="profil.php">Compte</a>
          <img src="/Public/assets/icons/userMobile.svg" alt="user">
        </li>
        <li class="panier.php">
          <a href="">Panier</a>
          <img src="/Public/assets/icons/icon-backet.svg" alt="panier">
        </li>
      </ul>
    </section>
    <!-- <header class="header" role="header">
     <nav class="header__nav">
       <a href="#">Nos Oeuvres</a>
       <a href="#">Personnaliser une creation</a>
       <div class="header__nav--logo">
         <img src="/Public/assets/img/logo-header.svg" alt="Logo">
       </div>
       <a href="#">A propos</a>
       <a href="#">
         <img src="/Public/assets/icons/icon-backet.svg" alt="Panier">
       </a>
       <a href="#">
         <img src="/Public/assets/icons/icon-profil.svg" alt="Utilisateur">
       </a>
     </nav>

     <section class="header-menu__mobile slide-bottom">
       <ul class="nav--menu">
         <li class="item">
           <a href="">Accueil </a>
           <img src="./assets/house-chimney-solid.svg" alt="home">
         </li>
         <li class="item">
           <a href="">Parrcourir</a>
           <img src="./assets/magnifying-glass-solid.svg" alt="search">
         </li>
         <li class="item">
           <a href="">Compte</a>
           <img src="./icons/user-solid.svg" alt="user">
         </li>
         <li class="item">
           <a href="">Panier</a>
           <img src="./assets/shopping-basket-solid.svg" alt="panier">
         </li>
       </ul>
     </section>
   </header> -->