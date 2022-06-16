<?php
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
$authDB = require_once '../Models/User.php';

// Creation du tableau d'erreur
$errors = [
  'email' => '',
  'password' => '',
  'message' => '',
  'confirmpassword' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // 1. Analyser les paramètres passés en POST
  if (!array_key_exists('email', $_POST) || !array_key_exists('password', $_POST) || !array_key_exists('confirmpassword', $_POST)) {
    echo json_encode(
      $errors["message"] = ERROR_REQUIRED
    );
    return;
  } else {
    $email    = $_POST['email'];
    $password = $_POST['password'];

    $input = filter_input_array(INPUT_POST, [
      'email' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);
    $email    = $input['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // verification du email
    if (!$email) {
      echo json_encode(
        $errors['email'] = ERROR_REQUIRED
      );
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      echo json_encode(
        $errors['email'] = ERROR_EMAIL_INVALID
      );
    } else {
      $reqUser = $authDB->checkMail($email);
      var_dump($reqUser);
      if ($reqUser) {
        echo json_encode(
          $errors['email'] = ERROR_EMAIL_EXIST
        );
      }
    }
    // verification du mdp

    if (!$password) {
      echo json_encode(
        $errors['password'] = ERROR_REQUIRED
      );
    } elseif (mb_strlen($password) < 6) {
      echo json_encode(
        $errors['password'] = ERROR_PASSWORD_TOO_SHORT
      );
    } elseif ($confirmpassword !== $password) {
      $errors['confirmpassword'] = ERROR_PASSWORD_MISMATCH;
    }


    // verification du tableu d'erreur
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
      // creation de de la session

      // header('Location: /views/profile.php');

      $messages = $authDB->register([
        'email' => $email,
        'password' => $password
      ]);

      // 3. Donner un statut de succes ou d'erreur au format JSON
      // var_dump($messages);
      if ($messages !== 0) {
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
}