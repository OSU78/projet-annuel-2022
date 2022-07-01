<?php
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
$authUser = require_once '../Models/Basket.php';
$order = new Basket($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (array_key_exists('id', $_GET)) {
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $idUser = $_GET['id'] ?? '';
    $contenteOrder = $order->getOneProd($idUser);
    echo json_encode($contenteOrder);
  } else {
    echo json_encode('error reception');
  }
}