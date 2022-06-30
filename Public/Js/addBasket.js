let contentBasket = document.querySelector(".contentBaskets");
console.log(contentBasket);
var tabContentOrder = [];
var tabContentLineOrder = [];
let totalBasket = document.querySelector("#total-basket");
let results = getBasket();
let htmlBasket = "";
results
  .sort()
  .map(function (content) {
    htmlBasket += `
            <section class="flex spaceBetween center pd25 gap15 pd25Custom">
              <div class="text_center panier_item_width20">1</div>
                <div class="text_center panier_item_width90">
                <img class="panier_item_product_img" src="${
                  content.imgLink
                }" alt="">
               </div>
                <div class="text_center panier_item_width200">
                  Gravure dessiner à la main
                </div>
                <div class="text_center panier_item_width60">${parseFloat(
                  content.priceProd
                )}€</div>
                <div class="text_center panier_item_width80">Disponible</div>
                <div class="text_center panier_item_width110">
                  <div class="flex center gap10">
                    <div class="panier_item_number">
                      <span class="panier_item_number--total">${
                        content.quantity
                      }</span>
                    </div>
                    <div class="flex center gap8 column">
                      <div id="add_item" class="panier_btn_add">
                        <span class="panier_btn_more--quantity" data-id="${
                          content.idProd
                        }">+</span>
                      </div>
                      <div id="remove_item"  class="panier_btn_add">
                        <span class="panier_btn_less--quantity" data-id="${
                          content.idProd
                        }">-</span>
                      </div>
                  </div>
                </div>
              </div>
            </section>
              `;
    return htmlBasket;
  })

  .join("");
contentBasket.innerHTML = htmlBasket;
let mores = document.querySelectorAll(".panier_btn_more--quantity");
let lesss = document.querySelectorAll(".panier_btn_less--quantity");
var id = "";
// ajouter une quantité
mores.forEach((more) => {
  more.addEventListener("click", (e) => {
    e.stopPropagation();
    id = e.target.getAttribute("data-id").toString();
    changeQuantity({ idProd: id.toString() }, 1);
    let total = getTotalPrice();
    let targetParent = e.target.parentNode.parentNode.parentNode;
    console.log(targetParent.querySelector(".panier_item_number"));
    if (
      parseInt(targetParent.querySelector(".panier_item_number").innerText) >= 0
    ) {
      targetParent.querySelector(".panier_item_number").innerText =
        parseInt(targetParent.querySelector(".panier_item_number").innerText) +
        1;
    } else {
      console.log("positif");
    }
    totalBasket.innerHTML = total + " €";
  });
});

// diminuer une quantité
for (let i = 0; i < lesss.length; i++) {
  const less = lesss[i];
  less.addEventListener("click", (e) => {
    e.stopPropagation();
    id = e.target.getAttribute("data-id").toString();
    changeQuantity({ idProd: id.toString() }, -1);
    let total = getTotalPrice();
    let targetParent = e.target.parentNode.parentNode.parentNode;
    console.log(targetParent);
    if (
      parseInt(targetParent.querySelector(".panier_item_number").innerText) > 0
    ) {
      targetParent.querySelector(".panier_item_number").innerText =
        parseInt(targetParent.querySelector(".panier_item_number").innerText) -
        1;
    } else {
      e.target.parentNode.parentNode.parentNode.parentNode.parentNode.style.display =
        "none";
      console.log(
        "Suppression du panier : " +
          e.target.parentNode.parentNode.parentNode.parentNode.parentNode
      );
    }
    let totalB = document.querySelector("#total-basket") ?? "";
    totalB.innerHTML = getTotalPrice() + " €";
  });
}
// cmd.addEventListener("click", (e) => {
//   e.preventDefault();
//   if (getUser().idUser !== undefined) {
//     window.location.href = "/views/completUserDelivery.php";
//   } else {
//     window.location.href = "/views/login.php";
//   }
// });
