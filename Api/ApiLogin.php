<?php
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
$authDB = require_once '../Models/User.php';
$user = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 1. Analyser les paramètres passés en POST
  if (array_key_exists('email', $_POST) || array_key_exists('password', $_POST)) {

    // Creation du tableau d'erreur
    $errors = [
      'email' => '',
      'password' => '',
    ];

    // verification du contenue des inputs
    $errors['message'] = $user->verifEmpty($_POST);

    $email    = $_POST['email'];
    $password = $_POST['password'];
    $input = filter_input_array(INPUT_POST, [
      'email' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);

    $email     = trim(strtolower($input['email'])) ?? "";
    $password  = trim($_POST['password']) ?? "";

    if (!$email) {
      $errors['email'] = ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = ERROR_EMAIL_INVALID;
    }
    $getUserIdBymail = $user->getUserBymail($email);
    if (!$user) {
      $errors['email'] = ERROR_EMAIL_UNKOWN;
    } else {
      if (!password_verify($password, $getUserIdBymail['password'])) {
        $errors['password'] = ERROR_PASSWORD_MISMATCH;
      }

      if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        // recuperation des informations de l'utilisateur
        $contentUserInfo = $user->getUser($getUserIdBymail['idUser']);
        // var_dump($contentUserInfo);
        // die();
        // creation de de la session et stockage des informations du user
        session_start();
        $_SESSION['user'] = [
          'idUser' => $contentUserInfo['idUser'],
          'email' => $contentUserInfo['email'],
          'idAdress' => $contentUserInfo['idAdress'],
          'postalCode' => $contentUserInfo['postalCode'],
          'street_number' => $contentUserInfo['street_number'],
          'locality' => $contentUserInfo['locality'],
          'country' => $contentUserInfo['country'],
          'route' => $contentUserInfo['route']
        ];
        echo json_encode($_SESSION['user']);
      } else {
        echo json_encode([
          'status' => 'Le mot de passe ou l\'email est incorrect'
        ]);
      }
    }
  } else {
    echo json_encode('error reception');
  }
}