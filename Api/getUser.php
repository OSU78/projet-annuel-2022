<?php
session_start();

use libphonenumber\PhoneNumberUtil;
// declaration de la session
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
require '../vendor/autoload.php';
$authDB = require_once '../Models/User.php';
$user = new User($pdo);

$swissNumberStr = "044 668 18 00";
$phoneUtil = \libphonenumber\PhoneNumberUtil::getInstance();
$tabRegions = $phoneUtil->getSupportedRegions();
$codes = $phoneUtil->getCountryCodeForRegion($tabRegions);
$tabCode = [];
$regions = [];
// var_dump($tabRegion);
foreach ($tabRegions as $region) {
  array_push($tabCode, $phoneUtil->getCountryCodeForRegion($region));
  array_push($regions, $region);
}
// var_dump($tabCode);
asort($tabCode);
// $tabCode = (array_unique($tabCode, SORT_NUMERIC));

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  if (!array_key_exists('user', $_SESSION)) {
    $user->sendJSON('Vous etes pas connecté');
  } else {
    $contentUser = $authDB->getUserByMail($_SESSION['user']['email']);
    $contentUserInfo = $authDB->getUser($contentUser['idUser']);
    echo json_encode(
      [
        'user' => $contentUserInfo,
        'countryCode' => $tabCode,
        'country' => $regions
      ]
    );
  }
} else {
  $user->sendJSON('Mauvaise requete');
}