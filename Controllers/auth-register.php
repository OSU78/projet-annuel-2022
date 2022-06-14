<?php
require '../config.php';

// declaration du tableau d'erreur
$errors = [
    'email' => '',
    'password' => '',
    'confirmpassword' => ''
];

$email           = $_POST['email'] ?? '';
$password        = $_POST['password'] ?? '';
$confirmpassword = $_POST['confirmpassword'] ?? '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = filter_input_array(INPUT_POST, [
        'email' => FILTER_SANITIZE_EMAIL,
    ]);

    $email = $input['email'] ?? '';

    if (!$email) {
        $errors['email'] = ERROR_REQUIRED;
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = ERROR_EMAIL_INVALID;
    } else {
        $reqUser = $authDB->checkMail($email);
        $emailExist = $reqUser->rowCount();
        if ($emailExist != 0) {
            $errors['email'] = ERROR_EMAIL_EXIST;
        }
    }

    if (!$password) {
        $errors['password'] = ERROR_REQUIRED;
    } elseif (mb_strlen($password) < 6) {
        $errors['password'] = ERROR_PASSWORD_TOO_SHORT;
    }
    if (!$confirmpassword) {
        $errors['confirmpassword'] = ERROR_REQUIRED;
    } elseif ($confirmpassword !== $password) {
        $errors['confirmpassword'] = ERROR_PASSWORD_MISMATCH;
    }

    if (empty(array_filter($errors, fn ($e) => $e !== ''))) {
        $authDB->register([
            'email' => $email,
            'password' => $password
        ]);
        // creation de de la session
        header('Location: /views/profile.php');
    }
}