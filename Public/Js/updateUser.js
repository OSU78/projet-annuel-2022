const urls = "/Api/updateUserInfo.php";
const form = document.getElementById("form");
// console.log(form);
form.addEventListener("submit", (e) => {
  e.preventDefault();
  let data = new FormData(form);
  // saveUser(data);
  // 4. Elle doit configurer une requête ajax en POST et envoyer les données
  const requeteAjax = new XMLHttpRequest();

  requeteAjax.open("POST", urls, false);
  //Envoyez les informations d'en-tête appropriées avec la demande

  requeteAjax.onload = function () {
    if (requeteAjax.readyState === XMLHttpRequest.DONE) {
      if (requeteAjax.status === 200) {
        const resultats = JSON.parse(requeteAjax.response);
        localStorage.removeItem("user");
        saveUser(resultats);

        console.log(resultats);
        console.log("localT" + getUser());
        // window.location.href = "/views/profil.php";
        // saveUser(resultats);
      } else {
        alert("Un problème est intervenu, merci de revenir plus tard.");
      }
    }
  };
  requeteAjax.send(data);
});
