/*On Verifie ci dessous si tout les champs du formulaire sont remplie*/

document.getElementById("form").addEventListener("submit", function (e) {
  /*ParagrapheErreur recupère la div dans mon formulaire qui servira à afficher l'erreur s'il y en a*/
  var paragrapheErreur = document.getElementById("erreur");
  var erreur;

  var inputs = this;

  // On verifie si tout les champs on au moin un contenu
  for (var i = 0; i < inputs.length; i++) {
    console.log(inputs[i]);

    if (!inputs[i].value) {
      inputs[i].style.borderBottom = "2px solid #ff000057";
      paragrapheErreur.className = "alert alert-danger";
      erreur = "Veuillez renseigner tous les champs";
    }
  }

  if (erreur) {
    e.preventDefault();
    document.getElementById("erreur").innerHTML = erreur;
    return false;
  } else {
  }
});

/*Verification de MDP1 et MDP2(confirmation de mot de passe)*/
document.getElementById("password").addEventListener("blur", function () {
  console.log(this.value.length);

  var paragrapheErreur = document.getElementById("erreur");

  if (this.value.length < 8) {
    paragrapheErreur.className = "alert alert-danger";
    paragrapheErreur.innerHTML = "Mot de passe trop cours";
    this.style.borderBottom = "2px solid  red";
  } else {
    paragrapheErreur.className = " ";
    paragrapheErreur.innerHTML = "";
    this.style.borderBottom = "2px solid  #31bd52";
  }
});
document.getElementById("password").addEventListener("focus", function () {
  var paragrapheErreur = document.getElementById("erreur");

  if (this.value.length < 8) {
    paragrapheErreur.className = " ";
    paragrapheErreur.innerHTML = "";
    this.style.borderBottom = "2px solid  #31bd52";
  }
});

function checkEmail(email) {
  var re =
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  return re.test(email);
}

function validateEmail(email) {
  if (checkEmail(email)) {
    return true;
  } else {
    return false;
  }
}
/*ADRESSE Email VERIF */
document.getElementById("email").addEventListener("blur", function (e) {
  var paragrapheErreur = document.getElementById("erreur");
  console.log(validateEmail(this.value));

  if (!validateEmail(this.value) || this.value.length < 8) {
    paragrapheErreur.className = "alert alert-danger";
    paragrapheErreur.innerHTML = "l'email entré est incorrect";
    this.style.borderBottom = "2px solid  red";
  } else {
    paragrapheErreur.className = " ";
    paragrapheErreur.innerHTML = "";
    this.style.borderBottom = "2px solid  #31bd52";
  }
});

document.getElementById("email").addEventListener("focus", function (e) {
  var paragrapheErreur = document.getElementById("erreur");
  console.log(validateEmail(this.value));

  paragrapheErreur.className = " ";
  paragrapheErreur.innerHTML = "";
  this.style.borderBottom = "2px solid  #31bd52";
});
