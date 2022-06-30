// Fonction pour sauvegarder un tableau dans le localStorageJS
function saveUser(user) {
  localStorage.setItem("user", JSON.stringify(user));
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

// // function de recuperation des utilisateurs
function getUser() {
  let user = localStorage.getItem("user");
  if (user == null) {
    return [];
  } else {
    return JSON.parse(user);
  }
}
// function changeQuantityMoin(product) {
//   let basket = getBasket();
//   let indice = 1;
//   let foundProduct = basket.find((p) => p.id == product.id);
//   if (foundProduct != undefined) {
//     foundProduct.quantity -= 1;
//   }
//   saveBasket(basket);
// }

function findElement(status, resultat) {
  let result = resultat;
  let foundResponseType = result.find(status);
}

// gestion du panier
function saveBasket(basket) {
  localStorage.setItem("basket", JSON.stringify(basket));
  // console.log(getBasket());
}

// function forEachKey(basket) {
//   for (var i = 0; i < localStorage.length; i++) {
//     console.log(basket(localStorage.key(i)));
//   }
// }

// function de recuperation des baskets
function getOneBasket(product) {
  let basket = getBasket();
  console.log(basket);
  let foundProduct = basket.find((p) => p.idProd == product.idProd);
  if (foundProduct == null) {
    return false;
  } else {
    return foundProduct;
  }
}

// function de recuperation des baskets
function getBasket() {
  let basket = localStorage.getItem("basket");
  if (basket == null) {
    return [];
  } else {
    return JSON.parse(basket);
  }
}

// ajouter un produit dans le panier
function addBasket(product) {
  let basket = getBasket();
  let content = 0;
  let foundProduct = basket.find((p) => p.idProd == product.idProd);
  if (foundProduct != undefined) {
    foundProduct.quantity++;
  } else {
    product.quantity = 1;
    basket.push(product);
  }
  saveBasket(basket);
}

// retirer un produit du panier
function removeFromBasket(product) {
  let basket = getBasket();
  basket = basket.filter((p) => p.idProd != product.idProd);
  saveBasket(basket);
}

// retirer de la quantité
function changeQuantity(product, quantity) {
  let basket = getBasket();
  let foundProduct = basket.find((p) => p.idProd == product.idProd);
  if (foundProduct != undefined) {
    foundProduct.quantity += quantity;
    if (foundProduct.quantity <= 0) {
      removeFromBasket(foundProduct);
    } else {
      saveBasket(basket);
    }
  }
}

// numbre total de produit dans le panier
function getNumberProduct() {
  let basket = getBasket();
  let number = 0;
  for (let product of basket) {
    number += product.quantity;
  }
  return number;
}

function getTotalPrice() {
  let basket = getBasket();
  let total = 0;
  for (let product of basket) {
    total += parseInt(product.quantity) * parseFloat(product.priceProd);
  }
  return total;
}

// le price total de tout le panier
function getTotalPriceOneProduct(product) {
  let basket = getBasket();
  let total = 0;
  foundProduct = basket.find((p) => p.idProd == product.idProd);
  if (foundProduct != undefined) {
    console.log(foundProduct);
    total = foundProduct.quantity * foundProduct.price;
  }
  saveBasket(basket);
  return total;
}

var getHttpRequest = function () {
  var httpRequest = false;

  if (window.XMLHttpRequest) {
    // Mozilla, Safari,...
    httpRequest = new XMLHttpRequest();
    if (httpRequest.overrideMimeType) {
      httpRequest.overrideMimeType("text/xml");
    }
  } else if (window.ActiveXObject) {
    // IE
    try {
      httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
      try {
        httpRequest = new ActiveXObject("Microsoft.XMLHTTP");
      } catch (e) {}
    }
  }

  if (!httpRequest) {
    alert("Abandon :( Impossible de créer une instance XMLHTTP");
    return false;
  }
  return httpRequest;
};



if (document.querySelector("#total-basket")){
  document.querySelector("#total-basket").innerHTML = getTotalPrice()+" €";
}
    