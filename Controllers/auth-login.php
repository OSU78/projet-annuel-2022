<?php
require '../config.php';
$authDB = require '../Models/User.php';

$errors = [
  'email' => '',
  'password' => '',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $input = filter_input_array(INPUT_POST, [
    'email' => FILTER_SANITIZE_SPECIAL_CHARS,
  ]);
  $email    = $input['email'] ?? '';
  $password = $_POST['password'] ?? '';

  // verification du email
  if (!$email) {
    $errors['email'] = ERROR_REQUIRED;
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors['email'] = ERROR_EMAIL_INVALID;
  } else {
    $reqUser = $authDB->checkMail($email);
    // $emailExist = $reqUser->rowCount();
    if ($reqUser == 0) {
      $errors['email'] = ERROR_EMAIL_EXIST;
    }
  }

  // verification du mdp
  if (!$password) {
    $errors['password'] = ERROR_REQUIRED;
  } else {
    $userByemail = $authDB->checkMail($email);
    var_dump($userByemail);
  }

  if (!password_verify($password, $userByemail['password'])) {
    $errors['password'] = ERROR_PASSWORD_MISMATCH;
  }

  // verification du tableu d'erreur
  if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
    // creation de de la session
    // header('Location: /views/profile.php');
  }
}