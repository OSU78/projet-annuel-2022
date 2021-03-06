// fonction de recuperation des données de l'utilisateu
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
        console.log(reponse.user);
        const html = `
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
                  <label for="pet-select"></label>


                  <input type="text" name="tel1" id="tel1">
                </div>

                <div class="form-control">
                  <label for="text" class="lastname">Telephone n°2:</label>
                  <input type="text" name="tel2" id="tel2">
                </div>

                <div class="form-control">
                  <label for="email" class="">Mail:</label>
                  <input type="email" value="${reponse.user.email}" name="email" id="email">
                </div>

                <div class="form-control">
                  <h2>Adresse</h2>
                  <button id="btn-adresse">Adresse</button>
                  <br/>
                  <input id="user_input_autocomplete_address" placeholder="Votre adresse...">
                </div>

                <div class="form-control">
                  <label for="number" class="numVoice">Numero de rue:</label>
                  <input type="text" value=""  id="street_number" name="street_number" >
                </div>

                <div class="form-control">
                  <label for="" class="">Rue:</label>
                  <input type="text" value="" class="" id="route" name="route" >
                </div>

                <div class="form-control">
                  <label for="number" class="postalCode">postal Code:</label>
                  <input type="text" value="" name="postalCode" id="postalCode">
                </div>

                <div class="form-control">
                  <label for="text" class="locality">Ville:</label>
                  <input type="text" value="" id="locality" name="locality" >
                </div>

                  <div class="form-control">
                  <label for="text" class="country">Pays:</label>
                  <input type="text" value=""  id="country" name="country">
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

        const content = document.querySelector("#wrapper");
        content.innerHTML = html;
      } else {
        alert("Un problème est intervenu, merci de revenir plus tard.");
      }
    }
  };
}
