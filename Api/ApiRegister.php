<?php
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
$authDB = require_once '../Models/User.php';
$user = new User($pdo);
$authDBs = require_once '../Models/Security.php';
$authSecurity = new AuthDB($pdo);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 1. Analyser les paramètres passés en POST
  if (array_key_exists('email', $_POST) || array_key_exists('password', $_POST) || array_key_exists('confirmpassword', $_POST)) {
    $input = filter_input_array(INPUT_POST, [
      'email' => FILTER_SANITIZE_EMAIL,
    ]);
    // var_dump($_POST);

    $email = $input['email'] ?? '';
    $password = $_POST['password'] ?? '';
    $confirmpassword = $_POST['confirmpassword'] ?? '';

    $regex = "/^([a-zA-Z0-9.]+@+[a-zA-Z]+(.)+[a-zA-Z]{2,3})$/";
    $contentDataBemail = $authDB->validatePregGrep($email);
    $count = $authDB->checkMail($email);
    // var_dump($count);

    // verification de l'adresse mail
    if (!$email) {
      $errors['email'] = ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = ERROR_EMAIL_INVALID;
    } elseif (!preg_match($regex, $email)) {
      $errors['email'] = ERROR_EMAIL_INVALID;
    } elseif ($count !== 0) {
      $errors['email'] = ERROR_EMAIL_EXIST;
    }
    $users = $user->getUserBymail($email);
    if (!$users == false) {
      $errors['email'] = "Mail deja utilisé";
    }
    // verification du mot de passe 
    if (!$password) {
      $errors['email'] = ERROR_REQUIRED;
    } elseif (mb_strlen($password) < 6) {
      $errors['email'] = ERROR_PASSWORD_TOO_SHORT;
    }

    // confirmation du mot de passe
    if (!$confirmpassword) {
      $errors['email'] = ERROR_REQUIRED;
    } elseif ($confirmpassword !== $password) {
      $errors['email'] = ERROR_PASSWORD_MISMATCH;
    }

    // verification du tableu d'erreur
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
      // enregistrement des données en base
      $insertUser = $authDB->register([
        'email' => $email,
        'password' => $password
      ]);

      // 3. Donner un statut de succes ou d'erreur au format JSON
      if ($insertUser !== 0) {
        // recuperation des information de l'utilisateur 
        $getUserIdBymail = $user->getUserBymail($email);
        echo json_encode($getUserIdBymail);
        // enregistement de 'ID de l'utilisateur en base de donnée
        $insertAddress = $authDB->registerAddress(
          $getUserIdBymail['idUser']
        );
      }
    } else {
      echo json_encode([
        'status' => $errors
      ]);
    }
  }
}