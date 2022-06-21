async function callerFun() {
  console.log("Caller");
  // 1ere fonction a appelé
  getUser();

  // il attend l'execution de la la 1er fonction pour s"executé
  await testAsync();
  console.log("After waiting");
  let camille = document.getElementById("btn-adresse");
  camille.addEventListener("click", (e) => {
    e.preventDefault();
    initialize();
  });

  const url = "/Api/updateUserInfo.php";
  const form = document.getElementById("form");
  console.log(form);
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    let data = new FormData(form);
    // 4. Elle doit configurer une requête ajax en POST et envoyer les données
    const requeteAjax = new XMLHttpRequest();

    requeteAjax.open("POST", url, false);
    //Envoyez les informations d'en-tête appropriées avec la demande

    // requeteAjax.setRequestHeader(
    //   "Content-type",
    //   "application/x-www-form-urlencoded"
    // );
    requeteAjax.onload = function () {
      if (requeteAjax.readyState === XMLHttpRequest.DONE) {
        if (requeteAjax.status === 200) {
          const resultats = JSON.parse(requeteAjax.response);
          console.log(resultats);

          // form.reset();
        } else {
          alert("Un problème est intervenu, merci de revenir plus tard.");
        }
      }
    };
    requeteAjax.send(data);
  });
}

callerFun();
