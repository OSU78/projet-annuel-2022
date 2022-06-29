<?php
require '../config.php';
$authDB = require_once '../Models/Security.php';

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $currentUser = $authDB->isLoggedin();
  echo json_encode($currentUser);
}