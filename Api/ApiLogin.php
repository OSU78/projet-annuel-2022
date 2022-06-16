<?php
require '../config.php';
$authDB = require_once '../Models/User.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 1. Analyser les paramètres passés en POST
  if (!array_key_exists('email', $_POST) || !array_key_exists('password', $_POST)) {
    echo json_encode([
      "status" => "error",
      "message" => "tout les parametre n'ont pas été envoyer diallo"
    ]);
    return;
  } else {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    // 2. Créer une requête qui permettra d'insérer ces données
    $messages = $authDB->register([
      'email' => (int) $email,
      'password' => (int) $password
    ]);

    // 3. Donner un statut de succes ou d'erreur au format JSON
    if ($messages === true) {
      echo json_encode([
        'status' => "succes enregistrement"
      ]);
    } else {
      echo json_encode([
        'status' => "Erreur d'enregistement"
      ]);
    }
  }
}