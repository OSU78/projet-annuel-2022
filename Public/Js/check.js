// le formulaire
let url = "/Api/ApiCheck.php";
let requete = new XMLHttpRequest(); // Nous créons un objet qui nous permettra de faire des requêtes
requete.open("GET", url, true); // Nous récupérons juste des données
// requete.responseType = "json"; // Nous attendons du JSON
requete.send(); // Nous envoyons notre requête
var dataUser = {};
var dataOrder = {};
// Dès qu'on reçoit une réponse, cette fonction est executée
requete.onload = function () {
  if (requete.readyState === XMLHttpRequest.DONE) {
    if (requete.status === 200) {
      let reponse = JSON.parse(requete.response);
      console.log(reponse);
      if (reponse) {
        saveUser(reponse);
        console.log(dataUser);
      }
      // window.location.href = "/views/login.php";
    } else {
      alert("Un problème est intervenu, merci de revenir plus tard.");
    }
  }
};
