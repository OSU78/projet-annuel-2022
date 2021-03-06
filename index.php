  <?php require "./views/includes/head.php" ?>
  <script src="/Public/Js/data.js"></script>
  <title>Home page</title>
  <link rel="stylesheet" href="/Public/css/product.css" />
  
  </head>

  <body>

    <?php require "./views/includes/header.php" ?>
    <style>
      p,
      a,
      label {
        font-family: sans-serif !important;
      }

      .badge {
        border-radius: 0px;
        background-color: #ffffff;
        color: black;
        text-align: center !important;
        position: absolute !important;
        width: 30px !important;
        text-align: center !important;
        padding: 5px !important;
        height: 18px !important;
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
    <section class="banner">
      <video loading="lazy" autoplay muted loop id="myVideo">
        <source src="/Public/assets/video/video-banner.mp4" type="video/mp4">
        Your browser does not support HTML5 video.
      </video>
      <div class="banner__text">
        <h2>Plus qu'un art, une Passion</h2>
        <p>
          Nous realisons des gravures d???univers m??di??val fantaisie
          R??alis?? ?? la main par nos soins.
        </p>
        <!-- <button class="btn__card">D??couvrez notre travail</button> -->
        <a href="./views/product.php" class="btn__card widthMax heightMin">D??couvrez notre travail</a>
      </div>
      <img onclick="myFunction()" id="myBtn" class="banner__play" src="/Public/assets/icons/icon-play.svg" alt="play-video">
    </section>

    <section class="artwork ">
      <div class="artwork__content  flex-item-left">
        <div class="artwork__content--text">
          <h2>Nos Oeuvres</h2>
          <p>
            Nous realisons des gravures d???univers m??di??val fantaisie
            R??alis?? ?? la main par nos soins.
          </p>
        </div>
        <div class="artwork__content--img">
          <img class="artwork__content--img__leaf" src="/Public/assets/img/leaf-bg-top.svg" alt="arrow">
        </div>
      </div>
      <div class="artwork__scroll flex-item-right">
        <img class="artwork__scroll--arrow prev" onclick="plusSlides(-1)" src="/Public/assets/icons/icon-left-arrow.svg" alt="left-arrow">
        <div class="artwork__scroll--galerie ">
          <img class="artwork__scroll--galerie__img fade" src="https://i.ibb.co/5vzDDqJ/insta-nov-35.webp" alt="Artwork">
          <img class="artwork__scroll--galerie__img fade" src="https://i.ibb.co/dG0jnX1/insta-nov-11.webp" alt="Artwork">
          <img class="artwork__scroll--galerie__img fade" src="https://i.ibb.co/jvQD7Hz/insta-nov-1.webp" alt="Artwork">
          <img class="artwork__scroll--galerie__img fade" src="https://i.ibb.co/bmwCMSw/website1.webp" alt="Artwork">
        </div>
        <img class="artwork__scroll--arrow next" onclick="plusSlides(1)" src="/Public/assets/icons/icon-right-arrow.svg" alt="right-arrow">
      </div>

    </section>
    <div class="svg">
      <svg width="1780" height="492" viewBox="0 0 1780 492" fill="none" xmlns="http://www.w3.org/2000/svg">
        <g filter="url(#filter0_d_832_1136)">
          <path d="M133 129H1647V355C1647 355 1365.32 169.411 967.978 250.731C570.641 332.051 133 209.821 133 209.821V129Z" fill="#0f0f0f" />
        </g>
        <defs>
          <filter id="filter0_d_832_1136" x="0" y="0" width="1780" height="492" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
            <feFlood flood-opacity="0" result="BackgroundImageFix" />
            <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha" />
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
        <!-- Section 2 des produits -->
        <section class="flex center spaceBt padding20 gap20">
          <div class="flex center spaceBt padding20 gap20 width1180" id="card--container">

          </div>

        </section>




      </div>
      </div>
      <button class="btn btn__best-seller">Voir notre catalogue de gravures ></button>
    </section>

    <section class="confiance">
      <div class="confiance__card">
        <img src="/Public/assets/icons/icon-confiance-france.svg" alt="">
        <p class="confiance__card--title">100% FRAN??AIS</p>
        <p class="confiance__card--text">Exp??dition sous 24h (laposte, UPS livraison)</p>
      </div>
      <div class="confiance__card">
        <img src="/Public/assets/icons/icon-confiance-main.svg" alt="">
        <p class="confiance__card--title">FAIT ?? LA MAIN</p>
        <p class="confiance__card--text">Toutes nos gravures sont r??alis??es ?? la main</p>
      </div>
      <div class="confiance__card">
        <img src="/Public/assets/icons/icon-confiance-camion.svg" alt="">
        <p class="confiance__card--title">PAIEMENT S??CURIS??</p>
        <p class="confiance__card--text">Paypal, Visa, Mastercard</p>
      </div>
      <div class="confiance__card">
        <img src="/Public/assets/icons/icon-confiance-contact.svg" alt="">
        <p class="confiance__card--title">BESOIN D'AIDE</p>
        <p class="confiance__card--text">Contactez-nous du lundi au samedi de 9h ?? 19h</p>
      </div>
    </section>

    <section class="custom">
      <div class="custom__text">
        <h2>Envie de customisation</h2>
        <p>Nous r??alisons des gravures d'univers m??di??val & fantaisiste. R??alis?? ?? la main, par nos soins.</p>
        <button class="btn contacterNous">Contactez nous maintenant</button>
      </div>
      <img src="/Public/assets/img/custom-img.svg" alt="">
    </section>

    <section class="math-description">
   
<section class="math-description" style="flex-direction: row;">
        <img src="https://i.ibb.co/rHjBKz6/photo-math.jpg" alt="photo de Math">
        <div>
          <h3>Math the printer</h3>
          <p>J'ai commenc?? un long voyage il y a quelques ann??es en regardant des gravures sur 
            bois m??di??vales et en sentant que quelque chose ??tait vraiment agr??able ?? voir. 
          </p>
           <p>Chaque illustration passe par un processus cr??atif o?? chaque ??tape est faite ?? la main.</p>
          <p>N'h??sitez pas ?? nous contacter !</p>
          <p>Math, The Printer.</p>
        </div>
    </section>
    </section>
    <?php require "./views/includes/footer.php" ?>
    
    <script>
      


      setTimeout(()=>{
        let secondSectionTree = document.querySelector("#card--container");
let dataElementTree = [];
for (let i = 3; i <= 5; i++) {
  console.log(data[i]);
  dataElementTree.push(data[i]);
}
// console.log(dataElementTree);

// 3eme section
let sectionTree = "";

dataElementTree
  .map(function (content) {
    sectionTree += `
      
      <div class="card linear_gradian scaleHover">
        <img class="product_link" data-id="${
          content.idProd
        }" loading="lazy"src="${content.imgLink}" alt="" />
        <div class="card__description pd1012 paddingBottom">
          <div class="card__description--text">
            <p>${getTextSize(content.nomProd)}</p>
            <p class="fontSize25 pd5">${content.priceProd}???</p>
          </div>
        <a href="panier.php?=id=${content.idProd}" data-id="${
      content.idProd
    }" id="basket-link"  class="product_s1_card_btn widthMax heightMin textCenter">Ajouter au panier</a>
        </div>
      </div>
  `;
    return sectionTree;
  })
  .join("");
secondSectionTree.innerHTML = sectionTree;
},500)

document.querySelector(".btn__best-seller").addEventListener("click",()=>{
window.location="/views/product.php";
});
document.querySelector(".contacterNous").addEventListener("click",()=>{
window.location="/views/custom.php";
});


    </script>
    <script defer src="/Public/Js/home.js"></script>