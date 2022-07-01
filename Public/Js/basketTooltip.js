
/*CODE POUR LE TOOLTIPS DU PANIER*/
var panierItem = "";
var i = 0
if(document.querySelector(".tooltip")){
document.querySelector(".tooltip").addEventListener("mouseover", () => {
  if (i == 0) {


    console.log("TOOLTIP")
    var getBaskets = getBasket()
    let panierData = []
    for (let j = 0; j < 2; j++) {
      panierData.push(getBaskets[j]);

    }
    console.log(panierData)
    if (panierData.lenght !== 0) {


      panierData
        .sort()
        .map(function(content, index) {
          // console.log(content.idProd);
          panierItem += `
<div class="panier_item"
    style="display: flex;justify-content:space-arround;align-item:center;flex-direction:row;gap: 15px ;padding:25px;font-size: 12px;">
    <img class="panier_item_product_img" src="${content.imgLink}" alt="">
    <div class="" style="display: flex;flex-direction:column">
      <div class="flex row gap10">
        <p style="width: max-content;font-size: 22px; margin-bottom: 5px;">${getTextSize(content.nomProd)}</p>
      </div>
      <div class="flex row gap10 colorGray" style="width: max-content">
        <p>Quantité :</p>
        <p>${content.quantity}</p>
      </div>
      <div class="flex row gap10 colorGray" style="width: max-content">
        <p>Montant :</p>
        <p>${content.priceProd} €</p>
      </div>
    </div>

    </div>
  
    `;
          return panierItem;
        })

        .join("");
    } else {
      console.log("Panier vide");

    }
    var panierDiv = document.querySelector(".bottom")
    panierDiv.innerHTML += panierItem;
    i++
  } else {

  }
})
}

/******** */