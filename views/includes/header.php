    <header class="header">
      <a class="active" href="#contact">Personnaliser une création</a>
      <a href="/views/product.php">Nos Oeuvres</a>
      <a href="/index.php" class="logo">
        <img src="/Public/assets/img/logo-header.svg" alt="Logo">
      </a>
      <a href="/views/panier.php">
        <div class="tooltip">
          <img src="/Public/assets/icons/icon-backet.svg" alt="Panier">
          <div class="bottom">
            <h3 style="margin: 0px;font-size:30px;font-weight: 100;">Mon panier</h3>
            <div class="panier_item">
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
      <a href="/views/login.php">
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
        <li class="/views/panier.php">
          <a href="">Panier</a>
          <img src="/Public/assets/icons/icon-backet.svg" alt="panier">
        </li>
      </ul>
    </section>