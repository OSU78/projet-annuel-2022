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

function getTextSize(strings){
  let newString="";
  if(strings.length>18){
    for(var i=0;i<=18;i++){
      
      newString+=strings[i];
  
    }
    return newString+="";
  }
}
// window.addEventListener("load", function (event) {
//   console.log("badge");
//   window.document.querySelector(".badge").innerText = JSON.parse(
//     localStorage.basket
//   ).length;
// });
// async function asyncCall() {
//   await resolveAfter2Seconds();
console.log(data);

let firstSectionProd = document.querySelector(".product_s1_card");
let secondSectionProd = document.querySelector(".product_s2_mini");
let secondSectionTree = document.querySelector("#card--container");
// console.log(data[0]);

let html1 = "";
let getDataRamdom = data[0];

// console.log(getDataRamdom);
html1 = `
          <img class="product_s1_card_img product_link" data-id="${getDataRamdom.idProd}"  src="${getDataRamdom.imgLink}" alt="gravure 1" srcset="" />
          <div class="flex gap10 column pd10">
            <p class="product_s1_card_name" product="${getDataRamdom.idProd}">${getTextSize(getDataRamdom.nomProd)}</p>
            <div class="product_s1_card_detail">
              <p class="product_s1_card_price">${getDataRamdom.priceProd}€</p>
              <a data-id="${data[0].idProd}" id="basket-link"  class="product_s1_card_btn widthMax heightMin textCenter">Ajouter au panier</a>
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
        <img class="product_s1_card_img m2 product_link" style="height: 62%" src="${content.imgLink}" alt="gravure 2"
          srcset="" data-id="${content.idProd}" />
        <div class="flex gap10 column pd10">
          <p class="product_s1_card_name">${getTextSize(content.nomProd)}</p>
          <div class="product_s1_card_detail">
            <p class="product_s1_card_price">${content.priceProd}€</p>
            <a data-id="${content.idProd}" id="basket-link"  class="product_s1_card_btn widthMax textCenter">Ajouter au panier</a>
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
      
      <div class="card linear_gradian scaleHover">
        <img class="product_link" data-id="${content.idProd}" loading="lazy"src="${content.imgLink}" alt="" />
        <div class="card__description pd1012 paddingBottom">
          <div class="card__description--text">
            <p>${getTextSize(content.nomProd)}</p>
            <p class="fontSize25 pd5">${content.priceProd}€</p>
          </div>
        <a href="panier.php?=id=${content.idProd}" data-id="${content.idProd}" id="basket-link"  class="product_s1_card_btn widthMax heightMin textCenter">Ajouter au panier</a>
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
  <img class="product_s1_card_img product_link" data-id="${data[6].idProd}" src="${data[6].imgLink}" alt="gravure 1" srcset="" />
  <div class="flex gap10 column pd10">
    <p class="product_s1_card_name" product="${data[6].idProd}">${getTextSize(data[6].nomProd)}</p>
    <div class="product_s1_card_detail">
      <p class="product_s1_card_price">${data[6].priceProd}€</p>
      <a href="#" data-id="${data[6].idProd}" id="basket-link"  class="product_s1_card_btn widthMax heightMin textCenter">Ajouter au panier</a>
      
    
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
     <div class="product_s1_card mini_card linear_gradian ">
          <img class="product_link" data-id="${content.nomProd}" src="${content.imgLink}" alt="gravure 1" srcset="" />
        <div class="flex gap10 column pd10">
              <p class="product_s1_card_name">${getTextSize(content.nomProd)}</p>
              <div class="product_s1_card_detail">
                <p class="product_s1_card_price">${content.priceProd}€</p>
               <a href="panier.php?=id=${content.idProd}" data-id="${content.idProd}" id="basket-link"  class="product_s1_card_btn widthMax textCenter">Ajouter au panier</a>
              </div>
            </div>
          </div>
         `;
    return sectionSeven;
  })
  .join("");
let seven = document.querySelector("#product_s2_mini");
seven.innerHTML = sectionSeven;
var dataBasket = [];

// function resolveAfter2Second() {
//   setTimeout(() => {
console.log("ready");
let linkDatas = document.querySelectorAll("#basket-link");
// console.log(linkDatas);
linkDatas.forEach((linkData) => {
  linkData.addEventListener("click", (e) => {
    e.preventDefault();
    var id = e.target.getAttribute("data-id");
    // console.log(id);
    let url = "/Api/essai.php?idProd=" + id;
    let xhr = new XMLHttpRequest(); // Nous créons un objet qui nous permettra de faire des requêtes

    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4) {
        if (xhr.status === 200) {
          let results = JSON.parse(xhr.response);
          dataBasket = results;
          console.log(dataBasket);
          addBasket(dataBasket);
          window.document.querySelector(".badge").innerText = JSON.parse(
            localStorage.basket
          ).length;

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
//   }, 2000);
// }

// resolveAfter2Second();
// asyncCall();



/*REDIRECTION VERS LA PAGE DETAIL PRODUT*/

//let getDetailProduit=