const INSTAGRAM_KEY =
  "IGQVJVVkdyNDBUSTZAtWWZA0TVpDTV9XMzlncGJuZA2pNUHI1cVc2bHB0QnFHZAjJBbUVjTzNmUXZARcHJGRzJablZAZARVZAjcjRhX2RyWUlqUlVjUFpBX2JKTGpwa1A5ajJDcFpxcENoMXdxWXFsbE9ILW5PTQZDZD";
const url = `https://graph.instagram.com/me?fields=id,caption,username&access_token=${INSTAGRAM_KEY}`;

let requete = new XMLHttpRequest(); // Nous créons un objet qui nous permettra de faire des requêtes
requete.open("GET", url); // Nous récupérons juste des données
requete.responseType = "json"; // Nous attendons du JSON
requete.send(); // Nous envoyons notre requête

// Dès qu'on reçoit une réponse, cette fonction est executée
requete.onload = function () {
  if (requete.readyState === XMLHttpRequest.DONE) {
    if (requete.status === 200) {
      let reponse = requete.response;
      // console.log(reponse);
      let temperature = reponse.main.temp;
      let ville = reponse.name;
      // console.log(temperature);
      document.querySelector("#temperature_label").textContent = temperature;
      document.querySelector("#ville").textContent = ville;
    } else {
      alert("Un problème est intervenu, merci de revenir plus tard.");
    }
  }
};
