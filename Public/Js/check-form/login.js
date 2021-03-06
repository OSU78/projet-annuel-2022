// le formulaire
var form = document.getElementById("form");
form.addEventListener("submit", (e) => {
  e.preventDefault();
  let data = new FormData(form);
  console.log("diallo");
  // 4. Elle doit configurer une requête ajax en POST et envoyer les données

  const requeteAjax = new XMLHttpRequest();
  requeteAjax.open("POST", "/Api/ApiLogin.php");

  requeteAjax.onload = function () {
    if (requeteAjax.readyState === XMLHttpRequest.DONE) {
      if (requeteAjax.status === 200) {
        const resultats = JSON.parse(requeteAjax.response);
        console.log(resultats);
        if (resultats.status != undefined) {
          let message = document.querySelector(".message");
          message.innerHTML = `<div class="alert warning">
          <span class="closebtn">&times;</span>  
          <strong>warning!</strong> ${resultats.status}.
          </div>
        `;
        } else {
          saveUser(resultats);
          console.log(resultats);
          window.location.href = "/views/product.php";
        }
      } else {
        alert("Un problème est intervenu, merci de revenir plus tard.");
      }
    }
  };
  requeteAjax.send(data);
});
