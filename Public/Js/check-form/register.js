// Instanciation (don't use instanciations documented in "Use components" section below)
const form = document.getElementById("form");
form.addEventListener("submit", (e) => {
  e.preventDefault();
  let data = new FormData(form);
  console.log("diallo");

  // 4. Elle doit configurer une requête ajax en POST et envoyer les données
  const requeteAjax = new XMLHttpRequest();

  requeteAjax.open("POST", "/Api/ApiRegister.php");
  // requeteAjax.responseType = "json"; // Nous attendons du JSON

  requeteAjax.onload = function () {
    if (requeteAjax.readyState === XMLHttpRequest.DONE) {
      if (requeteAjax.status === 200) {
        const resultats = JSON.parse(requeteAjax.response);
        console.log(resultats);
        let contentError = [];

        if (
          "email" in resultats ||
          "password" in resultats ||
          "confirmpassword" in resultats
        ) {
          // console.log(resultats.password);
          if (resultats.email !== undefined) {
            console.log(resultats.email);
            contentError.push(resultats.email);
          }
          if (resultats.password !== undefined) {
            console.log(resultats.password);
            contentError.push(resultats.password);
          }
          if (resultats.confirmpassword !== undefined) {
            console.log(resultats.confirmpassword);
            contentError.push(resultats.confirmpassword);
          }
          console.log(contentError);
        }
        let message = document.querySelector(".message");
        message.innerHTML = `<div class="alert warning">
          <span class="closebtn">&times;</span>  
          <strong>warning!</strong> ${contentError}.
          </div>
        `;
      } else {
        alert("Un problème est intervenu, merci de revenir plus tard.");
      }
    }
  };
  requeteAjax.send(data);
});
