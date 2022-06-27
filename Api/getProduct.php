<?php
require '../config.php';
$authDB = require_once '../Models/Models.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {

  $products = $authDB->getProduct();
  if ($products) {
    // session_start();
    echo json_encode($products);
  }
}
// }
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  echo json_encode("di  aaaa");
}