<?php
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
$authUser = require_once '../Models/Order.php';
$order = new Order($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (array_key_exists('idUser', $_GET)) {
    $_GET = filter_input_array(INPUT_GET, FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $idUser = $_GET['idUser'] ?? '';
    $contenteOrder = $order->getAllCmdClient($idUser);
    echo json_encode($contenteOrder);
  } else {
    echo json_encode('error reception');
  }
}