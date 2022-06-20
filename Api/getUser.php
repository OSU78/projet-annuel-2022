<?php
// declaration de la session
session_start();
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
$authDB = require_once '../Models/User.php';

$user = new User($pdo);
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
  $contentUser = $authDB->getUserByMail($_SESSION['user']['email']);
  $contentUserInfo = $authDB->getUser($contentUser['idUser']);
  $user->sendJSON($contentUserInfo);
} else {
  $user->sendJSON('Mauvaise requete');
}