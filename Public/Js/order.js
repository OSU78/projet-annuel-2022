// envoie des elements de la commande dans la base de donnée
let cmd = document.querySelector("#cmd");
console.log(getUser());
cmd.addEventListener("click", (e) => {
  e.preventDefault();
  let order = JSON.parse(localStorage.getItem("order"));
  var dataOrder = new FormData();
  for (key in order) {
    dataOrder.append(key, order[key]);
  }

  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("POST", "/Api/ApiOrder.php", true);
  requeteAjax.onload = function () {
    if (requeteAjax.readyState === XMLHttpRequest.DONE) {
      if (requeteAjax.status === 200) {
        const resultats = JSON.parse(requeteAjax.response);
        console.log(resultats);
        // window.location.href = "/views/profil.php";
        // saveUser(resultats);
      } else {
        alert("Un problème est intervenu, merci de revenir plus tard.");
      }
    }
  };
  requeteAjax.send(dataOrder);
  e.stopPropagation();
  // window.location.href = "/views/completUserDelivery.php";
  setTimeout(() => {
    let basket = JSON.stringify(localStorage.getItem("basket"));
    var formaData = new FormData();
    formaData.append("basket", basket);
    const requeteAjax = new XMLHttpRequest();
    requeteAjax.open("POST", "/Api/ApiOrder.php", true);
    //Envoyez les informations d'en-tête appropriées avec la demande
    requeteAjax.onload = function () {
      if (requeteAjax.readyState === XMLHttpRequest.DONE) {
        if (requeteAjax.status === 200) {
          const resultats = JSON.parse(requeteAjax.response);
          console.log(resultats);
          if (resultats.status == "succes") {
          } else {
            window.location.href = "/views/profil.php";
          }
        } else {
          alert("Un problème est intervenu, merci de revenir plus tard.");
        }
      }
    };
    requeteAjax.send(formaData);
    // window.location.href = "/views/completUserDelivery.php";
    // } else {
    //   console.log("aucune commande en cours");
    // }
  }, 1000);
});
