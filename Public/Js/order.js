// envoie des elements de la commande dans la base de donnée
console.log(getUser().idUser);
var dataOrder = {
  totalPrice: getTotalPrice(),
  idUser: getUser().idUser,
  statusCmd: "En cours de validation",
};


cmd.addEventListener("click", (e) => {
  e.preventDefault();
  setTimeout(() => {
  let basket = JSON.stringify(localStorage.getItem("basket"));
  let orderPrice=JSON.stringify(localStorage.getItem("order"));
  var formaD = new FormData();
  formaD.append("basket", basket);
  formaD.append("orderPrice",orderPrice);
  console.log(formaD);
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("POST", "/Api/ApiOrder.php?etat=payement", true);
  requeteAjax.onload = function () {
    if (requeteAjax.readyState === XMLHttpRequest.DONE) {
      if (requeteAjax.status === 200) {
        const resultats = JSON.parse(requeteAjax.response);
        console.log(resultats);
        window.location="/views/payementPaypal.php";
      } else {
        alert("Un problème est intervenu, merci de revenir plus tard.");
      }
    }
  };
  requeteAjax.send(formaD);

},2000)});