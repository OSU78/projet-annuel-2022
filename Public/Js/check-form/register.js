// Import
import { PasswordField } from "javascript-form-validation";

// Instanciation (don't use instanciations documented in "Use components" section below)
let passValidator = new PasswordField();

const form = document.getElementById("form");

form.addEventListener("submit", (e) => {
  e.preventDefault();
  let data = new FormData(form);
  // 4. Elle doit configurer une requête ajax en POST et envoyer les données
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("POST", "/Api/ApiRegister.php");

  requeteAjax.onload = function () {
    if (requeteAjax.readyState === XMLHttpRequest.DONE) {
      if (requeteAjax.status === 200) {
        const resultats = JSON.parse(requeteAjax.response);
        console.log(resultats);
        form.reset();
      } else {
        alert("Un problème est intervenu, merci de revenir plus tard.");
      }
    }
  };
  requeteAjax.send(data);
});
