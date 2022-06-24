// Fonction pour sauvegarder un tableau dans le localStorageJS
function saveUser(user) {
  localStorage.setItem("user", JSON.stringify(user));
}

// function de recuperation des utilisateurs
function getUser() {
  let user = localStorage.getItem("user");
  if (user == null) {
    return [];
  } else {
    return JSON.parse(user);
  }
}

// ajouter un utilisateur
// function addUser(conect) {
//   let user = getUser();
//   // console.log(user);
//   let foundUser = user.find((u) => u.idUser == conect.idUser);
//   if (foundUser == undefined) {
//     user.push(conect);
//   } else {
//     console.log("vous etes deja connecté");
//   }
//   saveUser(tabUser);
// }

function findElement(status, resultat) {
  let result = resultat;
  let foundResponseType = result.find(status);
}
