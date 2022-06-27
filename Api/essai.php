<?php
require '../config.php';
$authDB = require_once '../Models/Basket.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  // recuperation des donnée a partier du pseudo
  if (array_key_exists('idProd', $_GET)) {
    $_GET = filter_input_array(INPUT_GET, [
      'idProd' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);

    $idProd = $_GET['idProd'] ?? '';
    if ($idProd) {
      $oneProd = $authDB->getOneProd($idProd);
      if ($oneProd) {
        session_start();
        $_SESSION['basket'] = [
          "idProd" => $oneProd['idProd'],
          'description' => $oneProd['description'],
          'imgLink' => $oneProd['imgLink'],
          'nomProd' => $oneProd['nomProd'],
          'priceProd' => $oneProd['priceProd'],
          'quantityProd' => $oneProd['quantityProd'],
        ];
        echo json_encode($_SESSION['basket']);
      }
    } else {
      echo json_encode([
        'error' => "Produit idisponible indisponible 😒",
      ]);
    }
  }
}