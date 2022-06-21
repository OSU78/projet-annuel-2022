function saveBasket(basket) {
  localStorage.setItem("basket", JSON.stringify(basket));
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

  let foundProduct = basket.find((p) => p.id == product.id);
  if (foundProduct != undefined) {
    foundProduct.quantity++;
    basket;
  } else {
    product.quantity = 1;
    basket.push(product);
  }
  saveBasket(basket);
}

// retirer un produit du panier
function removeFromBasket(product) {
  let basket = getBasket();
  basket = basket.filter((p) => p.id != product.id);
  saveBasket(basket);
}

// retirer de la quantité
function changeQuantity(product, quantity) {
  let basket = getBasket();
  let foundProduct = basket.find((p) => p.id == product.id);
  if (foundProduct != undefined) {
    foundProduct.quantity += quantity;
  }
  saveBasket(basket);
}
