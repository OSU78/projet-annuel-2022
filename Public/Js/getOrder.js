// fonction de recuperation des données de l'utilisateu
console.log(getUser());
let idUser = getUser().idUser;
console.log(idUser);

const url = "/Api/ApiGetOrder.php?idUser=" + idUser;
let requete = new XMLHttpRequest(); // Nous créons un objet qui nous permettra de faire des requêtes
requete.open("GET", url, true); // Nous récupérons juste des données
// requete.responseType = "json"; // Nous attendons du JSON
requete.send(); // Nous envoyons notre requête
// Dès qu'on reçoit une réponse, cette fonction est executée
requete.onload = function () {
  if (requete.readyState === XMLHttpRequest.DONE) {
    if (requete.status === 200) {
      const reponse = JSON.parse(requete.response);
      console.log(reponse);
      let html = "";
      reponse.map(function (content, index) {
        html += `
         <tr>
              <td>${index} </td>
              <td>${content.dateCmd} </td>
              <td> ${content.montantCmd}€</td>
              <td> ${content.statusCmd}</td>
            
              <td>
                <a href="detailOrder.php?idCmd=${content.idCmd}" id="detail-order" data-id=${content.idCmd}"  class="btn__card">Afficher</a>
              </td>
        </tr>
              `;
        return html;
      });

      const content = document.querySelector("#content-cmd");
      content.innerHTML = html;
    } else {
      alert("Un problème est intervenu, merci de revenir plus tard.");
    }
  }
};
// fonction de recuperation des données de l'utilisateu
