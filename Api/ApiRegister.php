<?php
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
$authDB = require_once '../Models/User.php';
$user = new User($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // 1. Analyser les paramètres passés en POST
  if (array_key_exists('email', $_POST) || array_key_exists('password', $_POST) || array_key_exists('confirmpassword', $_POST)) {

    // verification du contenue des inputs
    $errors['message'] = $user->verifEmpty($_POST);

    $input = filter_input_array(INPUT_POST, [
      'email' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);

    $email           = trim(strtolower($input['email']));
    $password        = trim($_POST['password']) ?? '';
    $confirmpassword = trim($_POST['confirmpassword']) ?? '';

    // verification du email
    $errors['email'] = $user->validateEmailRegister($email);

    // verification du mdp
    $errors['password'] = $user->validatePasswordRegister($password, $confirmpassword);

    // verification du tableu d'erreur
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
      // creation de de la session
      session_start();
      // enregistrement des données en base
      $insertUser = $authDB->register([
        'email' => $email,
        'password' => $password
      ]);

      // 3. Donner un statut de succes ou d'erreur au format JSON
      if ($insertUser !== 0) {
        // recuperation des information de l'utilisateur 
        $getUserIdBymail = $user->getUserBymail($email);
        // die();
        if ($getUserIdBymail) {
          $_SESSION['user'] = [
            'email' => $email,
            'idUser' => $getUserIdBymail['idUser']
          ];
          var_dump($getUserIdBymail['idUser']);

          // enregistement de 'ID de l'utilisateur en base de donnée
          $insertAddress = $authDB->registerAddress(
            $getUserIdBymail['idUser']
          );

          echo json_encode([
            'status' => "succes enregistrement",
            'sessionEmail' => $_SESSION["email"]
          ]);
        } else {
          echo json_encode([
            'status' => "Erreur d'enregistement"
          ]);
        }
      }
      // si le tableau n'est pas vide on renvoie le tableau d'erreur 
    } else {
      echo json_encode($errors);
    }
  }
}