<?php
session_start();
// $_SESSION = array();
// session_destroy();
$idCmd = "";
global $idCmd;

require_once '../config.php';
$authDbOrder = require_once '../models/Order.php';
global $idCmd;
if (!empty($_GET["etat"]) && isset($_GET["etat"])) {

  $_SESSION = array();
  $result = json_decode($_POST["basket"]);
  // print_r(json_decode($_POST["basket"]));
  $totalArray = json_decode(json_decode($_POST["basket"], true), true);
  //print_r($totalArray[3]);
  $total = 0;
  for ($i = 0; $i < sizeof($totalArray); $i++) {
    $total += (int)$totalArray[$i]["priceProd"];
  }
  $_SESSION["order"] = $result;
  $_SESSION["totalPrice"] = $total;

  echo json_encode([
    'status' => "success",
  ]);
} else if (array_key_exists('idUser', $_POST)) {
  $count = $authDbOrder->registerOrder([
    'idUser'     => $_POST['idUser'],
    'montantCmd' => $_POST['totalPrice'],
    'statusCmd'  => $_POST['statusCmd'],
  ]);
  if ($count == null) {
    echo json_encode(('error'));
  } else {
    $cmdUser = $authDbOrder->fetchOne($_POST['idUser']);
    echo json_encode(($cmdUser['idCmd']));
    $idCmd = $cmdUser['idCmd'];
    $_SESSION['idCmd'] = $idCmd;
  }
} else if (array_key_exists('basket', $_POST)) {
  $content = (json_decode($_POST['basket']));
  $contents = (json_decode($content));
  // var_dump($_SESSION['idCmd']);
  for ($i = 0; $i < count($contents); $i++) {
    if ($idCmd !== null) {
      $count = $authDbOrder->registerDetailOrder([
        'idProd' => $contents[$i]->idProd,
        'idCmd' => $_SESSION['idCmd'],
        'priceTotalProd' => (int) $contents[$i]->priceProd * (int)$contents[$i]->quantity,
        'quantityProd' => $contents[$i]->quantity
      ]);
      if ($count == null) {
        echo json_encode($idCmd);
      } else {
        $_SESSION["TOTO"] = "oto";
        echo json_encode([
          'status' => "succes",
        ]);
      }
    } else {
      echo json_encode(('error'));
    }
  }
}






// $authDbOrder->registerDetailCommande([
//   'name_prod'        => $arrayContente['name'],
//   'id_cmd'           => $id['id_cmd'],
//   'id_prod'          => $contentProd['id_prod'],
//   'detail_qte'       => $arrayContente['quantity'],
//   'price_total_prod' => $arrayContente['priceTotal']
// ]);