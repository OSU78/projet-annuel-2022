async function getAllFacture(id) {

  console.log("getAllFacture");
  // window.addEventListener("load", initialize);
  console.log("After waiting");
  const url = "/Api/getFacture.php";
  const userData = {
    "id": id,
    "req": "getAllFacture",
  };
  const divFacture = document.getElementById("divFacture");
  console.log(divFacture);

  let data = new FormData();
  /*arrayToFormData permet de parser un tableau js en formData*/
  arrayToFormData(data, userData)

  //   for (var value of data.values()) {
  //     console.log(value);
  //  }

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
        // console.log(resultats);
        viewListFacture(resultats);

        // form.reset();
      } else {
        alert(`Erreur lors de la requete de recuperation des factures de l'id : ${id}`);
      }
    }
  };
  requeteAjax.send(data);

}



async function getFacture(idCmd, idUser) {


  console.log("getFacture");
  // window.addEventListener("load", initialize);
  console.log("After waiting");
  const url = "/Api/getFacture.php";
  const userData = {
    "idCmd": idCmd,
    "id": idUser,
    "req": "getFacture",
  };

  let data = new FormData();
  /*arrayToFormData permet de parser un tableau js en formData*/
  arrayToFormData(data, userData)

  //   for (var value of data.values()) {
  //     console.log(value);
  //  }

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

        addLocalStorage(idCmd, resultats)

        getDowloadLink(idCmd, idUser, resultats);

        //document.location.href="templateFacture/template.html?idCmd="+idCmd;

        // form.reset();
      } else {
        alert(`Erreur lors de l'affichage de la facture N°: ${idCmd}`);
      }
    }
  };
  requeteAjax.send(data);

}

function getDowloadLink(idCmd, idUser, cmdArray) {


  console.log("dowloadFacture");
  // window.addEventListener("load", initialize);
  console.log("After waiting");
  const url = "/Api/getFacture.php";
  const userData = {
    "idCmd": idCmd,
    "id": idUser,
    "factureItem": JSON.stringify(cmdArray),
    "req": "dowloadFacture",
  };

  let data = new FormData();
  /*arrayToFormData permet de parser un tableau js en formData*/
  arrayToFormData(data, userData)

  //   for (var value of data.values()) {
  //     console.log(value);
  //  }

  // 4. Elle doit configurer une requête ajax en POST et envoyer les données
  const requeteAjax = new XMLHttpRequest();
  requeteAjax.responseType = 'blob';


  requeteAjax.open("POST", url, true);
  //Envoyez les informations d'en-tête appropriées avec la demande


  requeteAjax.onload = function () {
    if (requeteAjax.readyState === XMLHttpRequest.DONE) {
      if (requeteAjax.status === 200) {
        const resultats = requeteAjax.response;
        console.log(resultats);
        var blob = new Blob([requeteAjax.response], {
          type: 'application/pdf'
        });
        var link = document.createElement('a');
        var filename="facture.pdf"
        link.href = window.URL.createObjectURL(blob);
        link.download = filename;
        document.body.appendChild(link);
        link.click();


      } else {
        alert(`Erreur lors du telechargement de la facture N°: ${idCmd}`);
      }
    }
  };
  requeteAjax.send(data);

}