// fonction de recuperation des données de l'utilisateur
function testAsync() {
  return new Promise((resolve, reject) => {
    //here our function should be implemented

    setTimeout(() => {
      console.log("Hello from inside the testAsync function");
      resolve();
    }, 5000);
  });
}

function getUser() {
  const url = "/Api/getUser.php";
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
        const html = reponse
          .map(function (content) {
            return `
              <form id="form" method="post" enctype='multipart/form-data'>

                <div class="form-control">
                  <label for="text" class="firstname">Nom:</label>
                  <input type="text" name="firstname" id="firstname">
                </div>

                <div class="form-control">
                  <label for="text" class="lastname">Prenom:</label>
                  <input type="text" name="lastname" id="lastname">
                </div>

                <div class="form-control">
                  <label for="text" class="lastname">Telephone n°2:</label>
                  <input type="text" name="tel1" id="tel1">
                </div>

                <div class="form-control">
                  <label for="text" class="lastname">Telephone n°2:</label>
                  <input type="text" name="tel2" id="tel2">
                </div>

                <div class="form-control">
                  <label for="email" class="">Mail:</label>
                  <input type="email" value="${content.email}" name="email" id="email">
                </div>

                <h2>Adresse</h2>
                <input id="user_input_autocomplete_address" placeholder="Votre adresse...">
                
                <div class="form-control">
                  <label for="number" class="numVoice">Numero de rue:</label>
                  <input type="text" value=""  id="street_number" name="street_number" disabled>
                </div>

                <div class="form-control">
                  <label for="" class="">Rue:</label>
                  <input type="text" value="" class="" id="route" name="route" disabled>
                </div>

                <div class="form-control">
                  <label for="number" class="postalCode">postal Code:</label>
                  <input type="text" value="" name="postalCode" id="postalCode">
                </div>

                <div class="form-control">
                  <label for="text" class="locality">Ville:</label>
                  <input type="text" value="" id="locality" name="locality" disabled>
                </div>

                  <div class="form-control">
                  <label for="text" class="country">Pays:</label>
                  <input type="text" value=""  id="country" name="country" disabled" disabled>
                </div>

                <div class="form-control">
                  <label for="" class="">Password:</label>
                  <input type="password" class="" name="password" id="password">
                </div>

                <div class="form-control">
                  <label for="" class="">Confirmer Password:</label>
                  <input type="password" name="confirmpassword" id="confirmpassword">
                </div>

                <div class="submit">
                  <button type="reset" class="btn btn-secondary">Fermer</button>
                  <button type="submit" class="btn btn-primary">Envoyer</button>
                </div>
              </form>
              `;
          })
          .join("");
        const content = document.querySelector("#wrapper");
        content.innerHTML = html;
      } else {
        alert("Un problème est intervenu, merci de revenir plus tard.");
      }
    }
  };
}

// }

// sendData();
