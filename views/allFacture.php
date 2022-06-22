<?php
session_start();
$_SESSION['user'] = [
    'idUser' => 1,
    'email' => "omdousmane@gmail.com",
    'password' => "12345678",
    'idAdress' => "1",
    'postalCode' => "93420",
    'numVoice' => "25",
    'twon' => "Villepinte",
    'country' => "France",
    'voice' => "25"
];

var_dump($_SESSION["user"]["idUser"]);
?>
<!DOCTYPE html>
<html lang="fr">

<!-- On crée une fausse session test -->
<!-- Code à supprimer en prod -->

<!-- Fin de la creation des session de test -->

<head>
    <?php require "includes/head.php" ?>
    <!-- <script async defer src="/Public/Js/api/google/adress.js"></script> -->
    <!-- <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDyILSkRGZeoQRLlAWCIIZCiNuIjrUw76I&libraries=places&callback=initMap">
  </script>; -->
    <title>profile</title>
</head>

<body>
    <?php require "includes/header.php" ?>
    <div class="wrapper" id="wrapper">

        <!-- Liste facture d'un user -->
        <script src="https://fast.wistia.com/embed/medias/bat8z021w7.jsonp" async></script><script src="https://fast.wistia.com/assets/external/E-v1.js" async></script><div class="wistia_responsive_padding" style="padding:100.0% 0 0 0;position:relative;"><div class="wistia_responsive_wrapper" style="height:100%;left:0;position:absolute;top:0;width:100%;"><div class="wistia_embed wistia_async_bat8z021w7 videoFoam=true" style="height:100%;position:relative;width:100%"><div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;"><img src="https://fast.wistia.com/embed/medias/bat8z021w7/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" aria-hidden="true" onload="this.parentNode.style.opacity=1;" /></div></div></div></div>

        <div style="display: flex;flex-direction: column;">

            <h1 class="h1">Mes Factures</h1>
            <div id="listFacture">
            </div>

        </div>


        <style>
            #listFacture {
                display: flex;
                width: fit-content;
                align-items: center;
                padding: 15px 25px;
                flex-direction: column;
                justify-content: space-between;
                gap: 25px;

            }

            .listFacture_item {
                -webkit-user-select: none;
                user-select: none;
                min-width: 250px;
                border: 1px solid #2980b9;
                display: flex;
                justify-content: space-between;
                align-items: center;
                padding: 0px 25px;
                border-radius: 8px;
                transition: 0.3s;
                gap: 25px;
                width: -webkit-fill-available;

            }

            .listFacture_item:hover {
                background-color: rgb(41 128 185 / 20%);
                transition: 0.3s;
                transform: scale(1.05);
                box-shadow: 1px 2px 25px rgb(0 0 0 / 10%), 1px 2px 12px 7px #13131317;


            }

            .viewListFacture {
                cursor: pointer;
                text-decoration-line: none;
                color: #2980b9;

            }

            .viewListFacture:hover {
                cursor: pointer;

                text-decoration-line: underline
            }

            .listFacture_item_etat {
                background-color: #00800082;
                color: white;
                padding: 5px;
                border: solid 1px rgba(0, 255, 0, 0.3);
                border-radius: 5px;
            }

            .h1 {
                text-align: center;
                font-weight: 35px;
                font-weight: bold;
                text-transform: uppercase;
            }
        </style>



        <script src="../Public/js/customFunction.js"></script>
        <script>
            function viewListFacture(listFacture) {

                console.log("viewListFacture");
                let DivlistFacture = document.querySelector("#listFacture");
                for (var i = 0; i < listFacture.length; i++) {
                    let etatFacture = listFacture[i]["etat_commande"];
                    let dateFacture = listFacture[i]["dateCmd"];
                    let div1 = document.createElement("div");
                    let div2 = document.createElement("div");

                    let p = document.createElement("p");
                    p.className = "viewListFacture"

                    p.innerText = "Voir";
                    p.setAttribute("onclick", "getFacture(" + listFacture[i]["idCmd"] + "," + listFacture[i]["idUser"] + ")")
                    div1.className = "listFacture_item"
                    div1.setAttribute("idCmd", listFacture[i]["idCmd"]);
                    //div1.innerText = "Facture"+listFacture[i]["etat"];
                    div1.innerHTML = '<p>Facture REF#' + listFacture[i]["idCmd"] + '</p> <p class="listFacture_item_etat">' + etatFacture + '</p> <p>' + dateFacture + '</p>';
                    DivlistFacture.appendChild(div1)

                    div1.appendChild(p);
                }
            }
        </script>



        <!--
            On inclue le script facture qui permet de :
            -recuperer la liste des factures de l'utilisateur
            -Afficher les details d'une facture en format pdf grace au requete ajax
        -->
        <script src="../Public/js/getFacture.js"></script>
        <script>
            console.log(`email : <?= $_SESSION["user"]["email"]; ?>`)
            console.log(`id : <?= $_SESSION["user"]["idUser"]; ?>`)
            /*On appel la fonction getAllFacture pour recupérer la liste des factures de l'utilisateur connecter*/
            getAllFacture('<?= $_SESSION["user"]["idUser"]; ?>');
        </script>
    </div>
    <?php require "includes/footer.php" ?>