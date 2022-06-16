let formChats = document.querySelectorAll(".formChat");
var currentUser = "";
var onlineUser = "";
formChats.forEach((formChat) => {
  formChat.addEventListener("submit", (e) => {
    e.preventDefault();
    var data = new FormData(formChat);
    currentUser = data.get("currentUser");
    onlineUser = data.get("userOnline");
    currentUserLastName = data.get("lastName");
    // console.log(onlineUser);
    // console.log(currentUser);
    getMessages(currentUser, onlineUser);

    let chatSumit = document.getElementById("form-chat");
    chatSumit.addEventListener("submit", (e) => {
      // 1. Elle doit stoper le submit du formulaire
      e.preventDefault();
      // 2. Elle doit récupérer les données du formulaire
      var dataChat = new FormData(chatSumit);
      dataChat.append("onlineUser", onlineUser);
      dataChat.append("currentUser", currentUser);
      console.log(dataChat.values);
      // 4. Elle doit configurer une requête ajax en POST et envoyer les données
      const requeteAjax = new XMLHttpRequest();
      requeteAjax.open("POST", "/controllers/chat.php");

      requeteAjax.onload = function () {
        const resultats = JSON.parse(requeteAjax.response);
        // name.value = "";
        console.log(resultats);

        // name.focus();
        getMessages();
      };
      // console.log(dataChat.get("content"));

      requeteAjax.send(dataChat);

      const interval = window.setInterval(getMessages, 1000);
      getMessages();
    });

    function getMessages() {
      console.log(currentUser);
      // 1.2 Elle doit créer une requête AJAX pour se connecter au serveur, et notamment au fichier chat.php
      const requeteAjax = new XMLHttpRequest();
      requeteAjax.open(
        "GET",
        "/controllers/chat.php?currentUser=" +
          currentUser +
          "&onlineUser= " +
          onlineUser,
        true
      );

      // 2. Quand elle reçoit les données, il faut qu'elle les traite (en exploitant le JSON) et il faut qu'elle affiche ces données au format HTML
      requeteAjax.onload = function () {
        const resultat = JSON.parse(requeteAjax.responseText);
        console.log(resultat);
        const html = resultat
          .reverse()
          .map(function (messages) {
            if (messages.lastname === currentUserLastName) {
              return `
              <div class="messages">
                  <div class="message-data">
                    <span class="message-data-name">
                      <i class="fa fa-circle online"></i>${messages.lastname}
                    </span>
                    <span class="message-data-time">${messages.created_at.substring(
                      11,
                      16
                    )} AM, Today</span>
                  </div>

                   <div class="message my-message">
                     ${messages.content}
                    </div>
                </div>
              `;
            } else {
              return `
              <div class="messages">
                  <div class="message-data">
                    <span class="message-data-name">
                      <i class="fa fa-circle online"></i>${currentUserLastName}
                    </span>
                    <span class="message-data-time">${messages.created_at.substring(
                      11,
                      16
                    )} AM, Today</span>
                  </div>

                   <div class="message other-message">
                     ${messages.content}
                    </div>
                </div>
              `;
            }
          })
          .join("");
        const message = document.querySelector(".chat-contents");
        message.innerHTML = html;
        message.scrollTop = message.scrollHeight;
      };

      // 3. On envoie la requête
      requeteAjax.send();
    }
  });
});
