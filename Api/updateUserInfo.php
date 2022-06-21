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
    array_key_exists('email', $_POST) || array_key_exists('idUser', $_POST) || array_key_exists('tel1', $_POST) || array_key_exists('tel2', $_POST) || array_key_exists('voice', $_POST) || array_key_exists('firstname', $_POST) || array_key_exists('lastname', $_POST) || array_key_exists('street_number', $_POST) || array_key_exists('postalCode', $_POST)
    || array_key_exists('country', $_POST)
    || array_key_exists('route', $_POST) || array_key_exists('locality', $_POST)
  ) {
    // verification du contenue des inputs
    $errors['message'] = $user->verifEmpty($_POST);

    $errors = [
      'tel2' => '',
      'tel1' => '',
      'firstname' => '',
      'lastname' => '',
      'email' => '',
      'street_number' => '',
      'country' => '',
      'route' => '',
      'country' => '',
      'locality' => ''
    ];

    /*
* `idAdress`, `idUser`, `postalCode`, `street_number`, `locality`, `country`, `route`
*/
    // suppression des espaces avec trim
    $email           = trim($_POST['email']);
    // $idUser          = trim($_POST['idUser']) ?? '';
    $confirmpassword = trim($_POST['confirmpassword']) ?? '';
    $password        = trim($_POST['password']) ?? '';
    $tel1            = trim($_POST['tel1']);
    $tel2            = trim($_POST['tel2']) ?? '';
    $streetNumber    = trim($_POST['street_number']);
    $country         = trim($_POST['country']);
    $route           = trim($_POST['route']);
    $locality        = trim($_POST['locality']) ?? '';
    $firstname       = trim($_POST['firstname']) ?? '';
    $lastname        = trim($_POST['lastname']) ?? '';

    // filtrages des elements input
    $input = filter_input_array(INPUT_POST, [
      'email' => FILTER_SANITIZE_EMAIL,
      'tel1' => FILTER_SANITIZE_NUMBER_INT,
      'tel2' => FILTER_SANITIZE_NUMBER_INT,
      'street_number' => FILTER_SANITIZE_NUMBER_INT,
      'postalCode' => FILTER_SANITIZE_NUMBER_INT,
      'route' => FILTER_SANITIZE_SPECIAL_CHARS,
      'firstname' => FILTER_SANITIZE_SPECIAL_CHARS,
      'lastname' => FILTER_SANITIZE_SPECIAL_CHARS,
      'country' => FILTER_SANITIZE_SPECIAL_CHARS,
      'locality' => FILTER_SANITIZE_SPECIAL_CHARS,
    ]);

    $confirmpassword = $input['confirmpassword'] ?? '';
    $password        = $input['password'] ?? '';
    $tel1            = $input['tel1'];
    $tel2            = $input['tel2'] ?? '';
    $streetNumber    = $input['street_number'] ?? "";
    $country         = $input['country'] ?? "";
    $route           = $input['route'] ?? "";
    $locality        = $input['locality'] ?? '';
    $firstname       = $input['firstname'] ?? '';
    $lastname        = $input['lastname'] ?? '';
    $postalCode      = $input['postalCode'] ?? '';


    if (!$firstname) {
      $errors['firstname'] = ERROR_REQUIRED;
    } elseif (mb_strlen($firstname) < 2) {
      $errors['firstname'] = ERROR_TOO_SHORT;
    }
    if (!$lastname) {
      $errors['lastname'] = ERROR_REQUIRED;
    } elseif (mb_strlen($lastname) < 2) {
      $errors['lastname'] = ERROR_TOO_SHORT;
    }
    if (!$email) {
      $errors['email'] = ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $errors['email'] = ERROR_EMAIL_INVALID;
    }
    // if (!$password) {
    //   $errors['password'] = ERROR_REQUIRED;
    // } elseif (mb_strlen($password) < 6) {
    //   $errors['password'] = ERROR_PASSWORD_TOO_SHORT;
    // }
    // if (!$confirmpassword) {
    //   $errors['confirmpassword'] = ERROR_REQUIRED;
    // } elseif ($confirmpassword !== $password) {
    //   $errors['confirmpassword'] = ERROR_PASSWORD_MISMATCH;
    // }

    if (!$postalCode) {
      $errors['postalcode'] = ERROR_REQUIRED;
    } elseif (!preg_match("/^[0-9]{5}$/", $postalCode)) {
      $errors['postalcode'] = ERROR_POSTAL_CODE_INVALID;
    }

    if (!$country) {
      $errors['country'] = ERROR_REQUIRED;
    } elseif (mb_strlen($country) < 2) {
      $errors['country'] = ERROR_TOO_SHORT;
    }

    if (!$locality) {
      $errors['locality'] = ERROR_REQUIRED;
    } elseif (mb_strlen($locality) < 2) {
      $errors['locality'] = ERROR_TOO_SHORT;
    }

    if (!$route) {
      $errors['route'] = ERROR_REQUIRED;
    } elseif (mb_strlen($route) < 2) {
      $errors['route'] = ERROR_TOO_SHORT;
    }
    // verification du tableu d'erreur
    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
      $user->sendJSON([
        'succes' => "cool mon gars"
      ]);
    } else {
      $user->sendJSON($errors);
    }
  }
} else {
  $user->sendJSON('Mauvaise requete');
}