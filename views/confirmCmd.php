<?php
session_start();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Public/css/product.css" />
    <link rel="stylesheet" href="/Public/css/confirmCmd.css">
    <script src="/Public/Js/data.js"></script>
    <script src="/Public/Js/function.js"></script>
    <script src="/Public/Js/getProduct.js"></script>
    <script src="/Public/Js/basketTooltip.js"></script>

    <title>Confirmation de commande</title>

</head>


<?php require "includes/header.php" ?>
<main class="wrapper__confirmation">
<style>
      p,a,label{
        font-family: sans-serif !important;
      }
      .badge {
        border-radius: 0px;
        background-color: #ffffff;
        color: black;
        text-align: center !important;
        position: absolute !important;
        width: 30px !important;
        text-align: center !important;
        padding: 5px !important;
        height: 18px !important;
        font-size: 13px !important;
        top: 24px !important;
        left: 12px !important;
        transition: 0.35s;
        user-select: none;
        cursor: pointer;
      }

      .tooltip {
        display: inline-block;
        position: relative;
        border-bottom: 1px dotted #666;
        text-align: left;
      }

      .tooltip h3 {
        margin: 12px 0;
      }

    
      .tooltip .bottom {
        min-width: 250px;
        position: absolute;
        top: 40px;
        left: 80%;
        transform: translate(-80%, 0);
      
        font-weight: normal;
        font-size: 13px;
        border-radius: 8px;
        z-index: 999999999999999999999999;
        box-sizing: border-box;
        box-shadow: 0 1px 8px rgba(0, 0, 0, 0.5);
        display: none;
      }

      .tooltip:hover .bottom {
        display: flex;
        background-color: #0f0f0f;
        color: white;
        padding: 25px;
        border: 1px solid rgba(253, 253, 253, 0.355);
        flex-direction: column-reverse;
      }

      .tooltip .bottom img {
        width: 100%;
        max-width: 200px;
        height: auto;
      }

      .tooltip .bottom i {
        position: absolute;
        bottom: 100%;
        left: 0%;
        right: 20%;
        margin-left: -10px;
        width: 24px;
        height: 12px;
        overflow: hidden;
      }

      .tooltip .bottom i::after {
        content: "";
        position: absolute;
        width: 12px;
        height: 12px;
        left: 50%;
        transform: translate(-50%, 50%) rotate(45deg);
        background-color: #eeeeee;
        box-shadow: 0 1px 8px rgba(0, 0, 0, 0.5);
      }

      .bottom p {
        top: 45px;
        margin: 0px;
      }
    

      .indeFlex {
        flex-direction: column !important;
        gap: 10px !important;
      }

      .panier_btn_headerSecondary {
        background-color: #f1bc1e;
        padding: 10px 10px;
        border-radius: 10px;
        color: #0f0f0f !important;
        text-decoration-line: none;
        transition: 0.3s;
        width: -webkit-fill-available;
        font-family: sans-serif;
        font-size: 15px;
        text-align: center;
      }

      .panier_btn_headerSecondary {
        background-color: #ffffff22;
        color: rgba(255, 255, 255, 0.729) !important;
      }

      .panier_btn_headerSecondary:hover {
        background-color: #ffffff54;
        color: rgb(255, 255, 255) !important;
        transition: 0.3s;
      }

      .panier_btn_header {
        background-color: #f1bc1e;
        padding: 10px 10px;
        border-radius: 10px;
        color: #0f0f0f !important;
        text-decoration-line: none;
        transition: 0.3s;
        width: -webkit-fill-available;
        font-family: sans-serif;
        font-size: 15px;
        text-align: center;
      }

      .panier_btn_header:hover {
        background-color: #ffffff;
        color: #0f0f0f;
        transition: 0.3s;
      }
    </style>
    <img class="casque" src="/Public/assets/img/bg-casque.svg" alt="casque">
    <img class="casque__retourne" src="/Public/assets/img/bg-casque.svg" alt="casque">

    <section class="message jello-horizontal">
        <h2 >Félicitation !</h2>
        <p>Votre commande n°<?= htmlspecialchars($_GET["auth"]??"") ?> sera validée et traitée dans les plus brefs délais.</p>
        <img class="message__feuille" src="/Public/assets/img/bg-leaf.svg" alt="feuille">
    </section>


</main>




<?php require "includes/footer.php" ?>