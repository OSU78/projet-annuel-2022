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
      'message' => '',
      'confirmpassword' => '',
      'tel' => '',
    ];

    // verification du contenue des inputs
    $errors['message'] = $user->verifEmpty($_POST);

    $email    = $_POST['email'];
    $password = $_POST['password'];
    $input = filter_input_array(INPUT_POST, [
      'email' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);

    $email     = trim(strtolower($input['email']));
    $password  = trim($_POST['password']) ?? '';

    // verification du email
    $errors['email'] = $user->validateEmailLogin($email);

    // verification du mdp
    $errors['password'] = $authDB->validatePasswordLogin($password, $email);

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {

      // recuperation des informations de l'utilisateur
      $getUserIdBymail = $user->getUserBymail($email);
      if ($getUserIdBymail) {
        $contentUserInfo = $user->getUser($getUserIdBymail['idUser']);
        // creation de de la session et stockage des informations du user
        session_start();
        $_SESSION['user'] = [
          'idUser' => $contentUserInfo['idUser'],
          'email' => $contentUserInfo['email'],
          'password' => $contentUserInfo['password'],
          'idAdress' => $contentUserInfo['idAdress'],
          'postalCode' => $contentUserInfo['postalCode'],
          'numVoice' => $contentUserInfo['numVoice'],
          'twon' => $contentUserInfo['twon'],
          'country' => $contentUserInfo['country'],
          'voice' => $contentUserInfo['voice']
        ];
      }
      // var_dump($_SESSION['user']);
    } else {
      echo json_encode($errors);
    }
  }
}