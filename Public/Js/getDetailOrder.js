const names = "idCmd";
function getParam(param) {
  var varsp = {};
  window.location.href.replace(
    /[?&]+([^=&]+)=?([^&]*)?/gi, // regexp
    function (m, key, value) {
      // callback
      varsp[key] = value !== undefined ? value : "";
    }
  );
  if (param) {
    return varsp[param] ? varsp[param] : null;
  }
  return varsp;
}
console.log(getParam(names));
var id = getParam(names);
function getDetailOrder() {
  let getLink = document.querySelector("#detail-order");
  console.log(getLink);
  //  getParam(names)
  let requete = new XMLHttpRequest(); // Nous créons un objet qui nous permettra de faire des requêtes
  requete.open("GET", "/Api/ApiDetailProd.php?id=" + id, true); // Nous récupérons juste des données

  // requete.responseType = "json"; // Nous attendons du JSON
  requete.send(); // Nous envoyons notre requête

  // Dès qu'on reçoit une réponse, cette fonction est executée
  requete.onload = function () {
    if (requete.readyState === XMLHttpRequest.DONE) {
      if (requete.status === 200) {
        const reponse = JSON.parse(requete.response);
        console.log(reponse);
        // window.location.href = "detailOrder.php";
        let html = "";
        reponse.map(function (content, index) {
          html += `
           <tr>
              <td> <span> ${index} </span></td>
              <td> <img src="${content.imgLink}" alt="img"> </td>
              <td> <span>${content.nomProd} </span></td>
              <td> <span> ${content.montantCmd}€</span></td>
           </tr>
              `;
          return html;
        });

        const content = document.querySelector("#content-Detail-cmd");
        content.innerHTML = html;
      } else {
        alert("Un problème est intervenu, merci de revenir plus tard.");
      }
    }
  };
  // });
}
// setTimeout(function () {
getDetailOrder();
// }, 1000); //run this thang every 2 seconds
