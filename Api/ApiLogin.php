<?php
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
$authDB = require_once '../Models/Security.php';
$authUser = require_once '../Models/User.php';
$authSecurity = new AuthDB($pdo);
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

    if (!$password) {
      $errors['password'] = ERROR_REQUIRED;
    } elseif (mb_strlen($password) < 6) {
      $errors['password'] = ERROR_PASSWORD_TOO_SHORT;
    }
    $users = $user->getUserBymail($email);
    if ($users == false) {
      $errors['email'] = ERROR_EMAIL_UNKOWN;
    } else {
      if (!password_verify($password, $users['password'])) {
        $errors['password'] = ERROR_PASSWORD_MISMATCH;
      }
    }
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
      // recuperation des informations de l'utilisateur
      if ($users) {
        $authSecurity->login($users['idUser']);
        $currentUser = $authSecurity->isLoggedin();
        echo json_encode($users);
      }
    } else {
      echo json_encode([
        'status' => 'Les information sont incorrectes'
      ]);
    }
  } else {
    echo json_encode('error reception');
  }
}