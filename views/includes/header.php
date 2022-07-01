    <header class="header">
      <a class="active" href="/views/custom.php">Personnaliser une création</a>
      <a href="/views/product.php">Nos Oeuvres</a>
      <a href="/index.php" class="logo">
        <img src="/Public/assets/img/logo-header.svg" alt="Logo" width="321" height="104px">
      </a>
      <a href="#">
        <!-- TOOLTIP -->
        <div class="tooltip" style="flex-direction: column;">
          <img src="/Public/assets/icons/icon-backet.svg" alt="Panier" style="max-width: max-content;" width="30px"
            height="30px">
          <div class="bottom"
            style="background-color:#0f0f0f;color:white;padding : 25px;border: 1px solid rgba(253, 253, 253, 0.355)">
            <h3 style="margin: 0px;font-size:30px;font-weight: 100;">Mon panier</h3>

            <div class="flex center column gap10 indexFlex">
              <a href="/views/panier.php" class="panier_btn_headerSecondary scaleHover">Voir le panier complet</a>
              <a href="/views/completUserDelivery.php" class="panier_btn_header scaleHover">Passer à la commande</a>
            </div>
          </div>
          <div class="badge flex center">
            <p></p>
          </div>
        </div>
      </a>
      <a href="/views/login.php">
        <img src="/Public/assets/icons/icon-profil.svg" alt="Utilisateur" width="30px" height="30px"
          style="max-width: max-content;">
      </a>
    </header>
    <!-- logo mobile -->
    <div class="header--mobile">
      <a href="/index.php" class="logo">
        <img src="/Public/assets/img/logo-header.svg" alt="Logo">
      </a>
    </div>
    <section class="header-menu__mobile slide-bottom">
      <ul class="nav--menu">
        <li class="item">
          <a href="/index.php">Home </a>
          <img src="/Public/assets/icons/logoMobile.png" alt="home" width="25px" height="25px">
        </li>
        <li class="item">
          <a href="/views/product.php">Nos Oeuvres</a>
          <img src="/Public/assets/icons/search.svg" alt="search" width="25px" height="25px">
        </li>
        <li class="item">
          <a href="/views/profil.php">Compte</a>
          <img src="/Public/assets/icons/userMobile.svg" alt="user" width="25px" height="25px">
        </li>
        <li class="item">
          <a href="/views/panier.php">Panier</a>
          <img src="/Public/assets/icons/icon-backet.svg" alt="panier" width="25px" height="25px">
        </li>
      </ul>
    </section>