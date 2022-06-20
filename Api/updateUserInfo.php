<?php
// declaration de la session
session_start();
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
// $authDB = require_once '../Models/User.php';
require_once '../Models/Profile.php';

$user = new User($pdo);
$profile = new Profile($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  if (
    array_key_exists('email', $_POST) || array_key_exists('idUser', $_POST) || array_key_exists('tel1', $_POST) || array_key_exists('tel2', $_POST) || array_key_exists('voice', $_POST) || array_key_exists('firstname', $_POST) || array_key_exists('lastname', $_POST) || array_key_exists('numVoice', $_POST) || array_key_exists('postalCode', $_POST)
  ) {
    // verification du contenue des inputs
    $errors['message'] = $user->verifEmpty($_POST);

    // suppression des espaces avec trim
    $email           = trim($_POST['email']);
    // $idUser          = trim($_POST['idUser']) ?? '';
    $confirmpassword = trim($_POST['confirmpassword']) ?? '';
    $password        = trim($_POST['password']) ?? '';
    $tel1            = trim($_POST['tel1']);
    $tel2            = trim($_POST['tel2']) ?? '';
    $numVoice        = trim($_POST['numVoice']);
    $postalCode      = trim($_POST['postalCode']) ?? '';
    $voice           = trim($_POST['voice']) ?? '';
    $firstname       = trim($_POST['firstname']) ?? '';
    $lastname        = trim($_POST['lastname']) ?? '';

    // filtrages des elements input
    $input = filter_input_array(INPUT_POST, [
      'email' => FILTER_SANITIZE_EMAIL,
      // 'idUser' => FILTER_SANITIZE_NUMBER_INT,
      'tel1' => FILTER_SANITIZE_NUMBER_INT,
      'tel2' => FILTER_SANITIZE_NUMBER_INT,
      'numVoice' => FILTER_SANITIZE_NUMBER_INT,
      'postalCode' => FILTER_SANITIZE_NUMBER_INT,
      'voice' => FILTER_SANITIZE_SPECIAL_CHARS,
      'firstname' => FILTER_SANITIZE_SPECIAL_CHARS,
      'lastname' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);

    $email           = $input['email'] ?? '';
    // $idUser          = $input['idUser'] ?? '';
    $confirmpassword = $input['confirmpassword'] ?? '';
    $password        = $input['password'] ?? '';
    $tel1            = $input['tel1'];
    $tel2            = $input['tel2'] ?? '';
    $numVoice        = $input['numVoice'];
    $postalCode      = $input['postalCode'] ?? '';
    $voice           = $input['voice'] ?? '';
    $firstname       = $input['firstname'] ?? '';
    $lastname        = $input['lastname'] ?? '';

    // // verification du email
    // $errors['email'] = $user->validateEmailRegister($email);

    // // verification du mdp
    // $errors['password'] = $user->validatePasswordRegister($password, $confirmpassword);

    // // verification des numeros de telephone
    $errors['tel1'] = $profile->validateTel($tel1);
    $errors['tel1'] = $profile->formatFrenchPhoneNumber($tel1);
    $errors['tel2'] = $profile->validateTel($tel2);
    $errors['tel2'] = $profile->formatFrenchPhoneNumber($tel2);
    // // var_dump($errors['tel1']);
    // // var_dump($errors['tel2']);

    // // verification du code postal
    $errors['postalCode'] = $profile->postalCode($postalCode);
    // // var_dump($errors['postalCode']);

    // // verification des noms et prenoms
    $errors['firstname'] = $profile->validateString($firstname);
    $errors['lastname']  = $profile->validateString($lastname);
    // // var_dump($errors['lastname']);
    // // var_dump($errors['email']);
    // $user->sendJSON($tel1);
  }
} else {
  $user->sendJSON('Mauvaise requete');
}

// verification du tableu d'erreur
if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
  // creation de de la session
  // session_start();
  // // enregistrement des données en base
  // $insertUser = $authDB->register([
  //   'email' => $email,
  //   'password' => $password
  // ]);
  $user->sendJSON('diallo');
  // // 3. Donner un statut de succes ou d'erreur au format JSON
  // if ($insertUser !== 0) {
  //   // recuperation des information de l'utilisateur 
  //   $getUserIdBymail = $user->getUserBymail($email);
  //   // die();
  //   if ($getUserIdBymail) {
  //     $_SESSION['user'] = [
  //       'email' => $email,
  //       'idUser' => $getUserIdBymail['idUser']
  //     ];
  //     var_dump($getUserIdBymail['idUser']);

  //     // enregistement de 'ID de l'utilisateur en base de donnée
  //     $insertAddress = $authDB->registerAddress(
  //       $getUserIdBymail['idUser']
  //     );

  //     echo json_encode([
  //       'status' => "succes enregistrement",
  //       'sessionEmail' => $_SESSION["email"]
  //     ]);
  //   } else {
  //     echo json_encode([
  //       'status' => "Erreur d'enregistement"
  //     ]);

  // si le tableau n'est pas vide on renvoie le tableau d'erreur 
} else {
  $user->sendJSON($errors);
}