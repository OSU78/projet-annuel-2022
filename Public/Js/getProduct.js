function resolveAfter2Seconds() {
  return new Promise((resolve) => {
    setTimeout(() => {
      resolve();
    }, 2000);
  });
}

// toast
function toast() {
  var x = document.getElementById("snackbar");
  x.className = "show";
  setTimeout(function () {
    x.className = x.className.replace("show", "");
  }, 3000);
}

async function asyncCall() {
  let url = "/Api/getProduct.php";
  var data = [];

  let requete = new XMLHttpRequest(); // Nous créons un objet qui nous permettra de faire des requêtes
  requete.open("GET", url, true); // Nous récupérons juste des données
  // requete.responseType = "json"; // Nous attendons du JSON
  requete.send(); // Nous envoyons notre requête

  // Dès qu'on reçoit une réponse, cette fonction est executée
  requete.onload = function () {
    if (requete.readyState === XMLHttpRequest.DONE) {
      if (requete.status === 200) {
        let reponse = JSON.parse(requete.response);

        data = reponse;
      } else {
        alert("Un problème est intervenu, merci de revenir plus tard.");
      }
    }
  };

  await resolveAfter2Seconds();
  // console.log(data);

  // fonction Ramdom
  function getRandomInt(dataSize) {
    return Math.floor(Math.random() * dataSize);
  }

  let firstSectionProd = document.querySelector(".product_s1_card");
  let secondSectionProd = document.querySelector(".product_s2_mini");
  let secondSectionTree = document.querySelector("#card--container");
  // console.log(data[0]);

  let html1 = "";
  let randomData = getRandomInt(data.length);
  let getDataRamdom = data[0];

  // console.log(getDataRamdom);
  html1 = `
    <div class="product_s1_card">
          <img class="product_s1_card_img" src="/Public/assets/img/product.svg" alt="gravure 1" srcset="" />
          <div class="flex gap10 column">
            <p class="product_s1_card_name" product="${getDataRamdom.idProd}">${getDataRamdom.nomProd}</p>
            <div class="product_s1_card_detail">
              <p class="product_s1_card_price">${getDataRamdom.priceProd}€</p>
              <button data-id="${data[0].idProd}" id="basket-link" class="product_s1_card_btn">Ajouter au panier</button>
            </div>
          </div>
        </div>
      `;
  firstSectionProd.innerHTML = html1;

  let dataElements = [];
  let sectionTwo = "";
  for (let i = 0; i < 3; i++) {
    if (data[i] != data[0]) {
      dataElements.push(data[i]);
    }
  }

  console.log(dataElements);
  console.log(data);

  let htmls = "";
  dataElements
    .map(function (content) {
      htmls += `
     <div class="product_s1_card mini_card">
        <img class="product_s1_card_img m2" style="height: 75%" src="/Public/assets/img/product.svg" alt="gravure 2"
          srcset="" />
        <div class="flex gap10 column">
          <p class="product_s1_card_name">${content.nomProd}</p>
          <div class="product_s1_card_detail">
            <p class="product_s1_card_price">${content.priceProd}€</p>
            <a href="panier.php?=id=${content.idProd}" data-id="${content.idProd}" id="basket-link"  class="product_s1_card_btn">Ajouter au panier</a>
          </div>
        </div>
      </div>
  `;
      return htmls;
    })
    .join("");

  secondSectionProd.innerHTML = htmls;

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
      <div class="card linear_gradian">
        <img loading="lazy"src="/Public/assets/img/product.svg" alt="" />
        <div class="card__description">
          <div class="card__description--text">
            <p>${content.nomProd}</p>
            <p>${content.priceProd}€</p>
          </div>
        <a href="panier.php?=id=${content.idProd}" data-id="${content.idProd}" id="basket-link"  class="product_s1_card_btn">Ajouter au panier</a>
        </div>
      </div>
  `;
      return sectionTree;
    })
    .join("");
  secondSectionTree.innerHTML = sectionTree;

  let contentSeven = data[6];
  let eles4 = document.querySelector("#product_s1_cardSix");
  let sectionFour = `
         <div class="product_s1_card">
          <img class="product_s1_card_img" src="/Public/assets/img/product.svg" alt="gravure 1" srcset="" />
          <div class="flex gap10 column">
            <p class="product_s1_card_name" product="${data[6].idProd}">${data[6].nomProd}</p>
            <div class="product_s1_card_detail">
              <p class="product_s1_card_price">${data[6].priceProd}€</p>
              <a href="panier.php?=id=${data[6].idProd}" data-id="${data[6].idProd}" id="basket-link"  class="product_s1_card_btn">Ajouter au panier</a>
            </div>
          </div>
        </div>
      `;
  eles4.innerHTML = sectionFour;

  //
  let dataElementSeven = [];
  for (let i = 7; i <= 8; i++) {
    // console.log(data[i]);
    dataElementSeven.push(data[i]);
  }
  console.log(dataElementSeven);

  // 3eme section
  let sectionSeven = "";

  dataElementSeven
    .map(function (content) {
      sectionSeven += `
     <div class="product_s1_card mini_card linear_gradian">
          <img src="/Public/assets/img/product.svg" alt="gravure 1" srcset="" />
        <div class="flex gap10 column">
              <p class="product_s1_card_name">${content.nomProd}</p>
              <div class="product_s1_card_detail">
                <p class="product_s1_card_price">${content.priceProd}€</p>
               <a href="panier.php?=id=${content.idProd}" data-id="${content.idProd}" id="basket-link"  class="product_s1_card_btn">Ajouter au panier</a>
              </div>
            </div>
          </div>
         `;
      return sectionSeven;
    })
    .join("");
  let seven = document.querySelector("#product_s2_mini");
  seven.innerHTML = sectionSeven;
}
var dataBasket = [];
function resolveAfter2Second() {
  setTimeout(() => {
    let linkDatas = document.querySelectorAll("#basket-link");
    // console.log(linkDatas);
    linkDatas.forEach((linkData) => {
      linkData.addEventListener("click", (e) => {
        e.preventDefault();
        var id = e.target.getAttribute("data-id");
        console.log(id);
        let url = "/Api/essai.php?idProd=" + id;
        let xhr = new XMLHttpRequest(); // Nous créons un objet qui nous permettra de faire des requêtes

        xhr.onreadystatechange = function () {
          if (xhr.readyState === 4) {
            if (xhr.status === 200) {
              let results = JSON.parse(xhr.response);
              dataBasket = results;
              console.log(dataBasket);
              addBasket(dataBasket);
              toast();
            } else {
              alert("impossible datteindre le server");
            }
          }
        };
        xhr.open("GET", url, true);
        xhr.send();
      });
    });
  }, 5000);
}
resolveAfter2Second();
asyncCall();
