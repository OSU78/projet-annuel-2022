function getBasket() {
  let url = "/Api/ApiBasket.php";
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
}
var id = 442;
xhr.onreadystatechange = function () {
  if (xhr.readyState === 4) {
    if (xhr.status === 200) {
      let results = JSON.parse(xhr.responseText);
      console.log(results);
    } else {
      alert("impossible datteindre le server");
    }
  }
};
xhr.open("GET", "/Api/ApiBasket.php?id=" + id, true);
xhr.send();
window.document.querySelector(".badge").innerText = JSON.parse(
  localStorage.basket
).length;
