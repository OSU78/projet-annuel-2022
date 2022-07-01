<?php
session_start();
$idCmd = "";
global $idCmd;

require_once 'config.php';
$authDbOrder = require_once '/models/Order.php';
global $idCmd;
if (array_key_exists('idUser', $_POST)) {
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
}

if (array_key_exists('basket', $_POST)) {
  $content = (json_decode($_POST['basket']));
  $contents = (json_decode($content));
  // var_dump($_SESSION['idCmd']);
  for ($i = 0; $i < count($contents); $i++) {
    if ($idCmd !== null) {
      $count = $authDbOrder->registerDetailOrder([
        'idProd' => $contents[$i]->idProd,
        'idCmd' => $_SESSION['idCmd'],
        'priceTotalProd' => (int) $contents[$i]->priceProd * (int)$contents[$i]->quantity,
        'quantityProd' => $contents[$i]->priceProd
      ]);
      if ($count == null) {
        echo json_encode($idCmd);
      } else {
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