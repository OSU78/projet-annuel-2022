let contentBasket = document.querySelector(".contentBaskets");
console.log(contentBasket);
// location.reload();
let results = getBasket();
let htmlBasket = "";
// results.sort(
//   forEach((content, index) => {
//     console.log(content);
//     htmlBasket += `
//         <section class="flex spaceBetween center pd25 gap15">
//           <div class="text_center panier_item_width20">1</div>
//             <div class="text_center panier_item_width90">${content.nomProd}</div>
//             <div class="text_center panier_item_width200">
//               Gravure dessiner à la main
//             </div>
//             <div class="text_center panier_item_width60">${content.priceProd}€</div>
//             <div class="text_center panier_item_width80">Disponible</div>
//             <div class="text_center panier_item_width110">
//               <div class="flex center gap10">
//                 <div class="panier_item_number">
//                   <span class="panier_item_number--total">${content.quantityProd}</span>
//                 </div>
//                 <div class="flex center gap8 column">
//                   <div id="add_item" class="panier_btn_add">
//                     <span class="panier_btn_more--quantity" data-id="${index}">+</span>
//                   </div>
//                   <div id="remove_item"  class="panier_btn_add">
//                     <span class="panier_btn_less--quantity" data-id="${index}">-</span>
//                   </div>
//               </div>
//             </div>
//           </div>
//         </section>
//                 `;
//     return htmlBasket;
//   })
// );
// console.log(htmlBasket);
results
  .sort()
  .map(function (content, index) {
    // console.log(content.idProd);
    htmlBasket += `
            <section class="flex spaceBetween center pd25 gap15">
              <div class="text_center panier_item_width20">1</div>
                <div class="text_center panier_item_width90">${
                  content.nomProd
                }</div>
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
// console.log(getBasket());
// // }, 2000);

let mores = document.querySelectorAll(".panier_btn_more--quantity");
let lesss = document.querySelectorAll(".panier_btn_less--quantity");
var id = "";
mores.forEach((more) => {
  more.addEventListener("click", (e) => {
    e.stopPropagation();
    console.log("diallo");
    id = e.target.getAttribute("data-id").toString();
    console.log("id / " + id.toString());
    // console.log(results[id].quantity);
    console.log(getBasket()[id]);
    changeQuantity({ idProd: id.toString() }, 1);
    let total = getTotalPrice();
    let targetParent = e.target.parentNode.parentNode.parentNode;
    console.log(targetParent.querySelector(".panier_item_number"));
    targetParent.querySelector(".panier_item_number").innerText =
      parseInt(targetParent.querySelector(".panier_item_number").innerText) + 1;
    document.querySelector("#total-basket").innerHTML = total;
  });
});

for (let i = 0; i < lesss.length; i++) {
  const less = lesss[i];
  less.addEventListener("click", (e) => {
    e.stopPropagation();
    console.log("diallo");
    id = e.target.getAttribute("data-id").toString();
    console.log("id / " + id.toString());
    // console.log(results[id].quantity);
    console.log(getBasket()[id]);
    changeQuantity({ idProd: id.toString() }, -1);
    let total = getTotalPrice();
    let targetParent = e.target.parentNode.parentNode.parentNode;
    console.log(targetParent.querySelector(".panier_item_number"));
    targetParent.querySelector(".panier_item_number").innerText =
      parseInt(targetParent.querySelector(".panier_item_number").innerText) - 1;
    document.querySelector("#total-basket").innerHTML = total;

    // var id = e.target.getAttribute("data-id");
    // // console.log(results[id].quantity);
    // console.log(getBasket()[id]);
    // changeQuantity({ idProd: "1" }, -1);
    // let total = getTotalPrice();
    // let targetParent = e.target.parentNode.parentNode.parentNode;
    // console.log(targetParent.querySelector(".panier_item_number"));
    // targetParent.querySelector(".panier_item_number").innerText =
    //   parseInt(targetParent.querySelector(".panier_item_number").innerText) - 1;
    // document.querySelector("#total-basket").innerHTML = total;
  });
}
