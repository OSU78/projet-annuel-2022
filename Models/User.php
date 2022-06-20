<?php
// session_start();

require 'Models.php';
class User extends Models
{
  private string $email = "";
  private string $password = "";
  private string $contentString = "";
  private string $message = "";
  private  string $tel = "";
  private  string $postalcode = "";
  // private  string $content = "";

  // verification de contenu vide
  public function requireContent($content)
  {
    if ($content === "") {
      $content = ERROR_REQUIRED;
    }
    return $content;
  }

  // verification de l'utilisateur est connecté ou pas 
  public function isLogged()
  {
    if (isset($_SESSION['user']) && isset($_SESSION['user']['idUser'])) {
      extract($_SESSION['user']);
      $count = $this->checkUserLogged($email, $password);
      if ($count > 0) {
        return true;
      }
    } else {
      return false;
    }
  }

  //preg_match verification
  public function validatePregGrep(string $email)
  {
    $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
    if (!preg_match($regex, $email)) {
      $this->email = ERROR_EMAIL_INVALID;
    }
    return $this->email;
  }

  // verifie si les element ne sont pas vide 
  public function verifEmpty($content)
  {
    foreach ($content as $contentPost) {
      if (empty($contentPost)) {
        $this->message = ERROR_REQUIRED_ALL;
      }
      return $this->message;
    }
  }

  // Fonction de controle de l'adresse mail
  function validateEmailRegister($email)
  {
    $this->email = $this->requireContent($email);
    $this->email = $this->validatePregGrep($email);
    $count = $this->checkMail($email);
    if ($count !== 0) {
      $this->email = ERROR_EMAIL_EXIST;
    }
    if ($this->email === '1') {
      $this->email = "";
    }
    return $this->email;
  }

  // Fonction de controle de l'adresse mail
  function validateEmailLogin($email)
  {
    $this->email = $this->requireContent($email);
    $regex = "/^([a-zA-Z0-9\.]+@+[a-zA-Z]+(\.)+[a-zA-Z]{2,3})$/";
    if (!preg_match($regex, $email)) {
      $this->email = ERROR_EMAIL_INVALID;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $this->email = ERROR_EMAIL_INVALID;
    }
    $contentUser = $this->getUserByMail($email);
    if (!$contentUser) {
      $this->email = ERROR_EMAIL_NOTfOUND;
    }
    if ($this->email === '1') {
      $this->email = "";
    }
    return $this->email;
  }

  // validation de preg-mag et controle du nombre de saisie
  public function validatePregGrepPassword($password)
  {
    if (mb_strlen($password) < 6) {
      $this->password = ERROR_PASSWORD_TOO_SHORT;
    }
    $majuscule = preg_match('@[A-Z]@', $password);
    $minuscule = preg_match('@[a-z]@', $password);
    $chiffre   = preg_match('@[0-9]@', $password);
    if (!$majuscule || !$minuscule || !$chiffre || strlen($password) < 6) {
      $this->password = ERROR_INCONSISTENT_PASSWORD;
    }
    if ($this->password === '1') {
      $this->password = "";
    }
    return $this->password;
  }

  // fonction de controle du mot de passe pour l'enregistrement
  public function validatePasswordRegister($password, $confirmpassword)
  {
    $this->password = $this->requireContent($password);
    $this->password = $this->validatePregGrepPassword($password);
    if ($confirmpassword !== $password) {
      $this->password = ERROR_PASSWORD_MISMATCH;
    }
    if ($this->password === '1') {
      $this->password = "";
    }
    return $this->password;
  }

  // fonction de controle du mot de passe pour l'enregistrement
  public function validatePasswordLogin($password, $email)
  {
    $this->password  = $this->requireContent($password);
    // verification du contenu du post
    if (mb_strlen($password) < 6) {
      $this->password  = ERROR_PASSWORD_TOO_SHORT;
    }
    $contentDbPassword = $this->getUserBymail($email);
    if ($contentDbPassword) {
      if (password_verify($password, $contentDbPassword['password']) === false) {
        $this->password  = ERROR_PASSWORD_INFORMATION;
      }
    }
    if ($this->password === '1') {
      $this->password = "";
    }
    return $this->password;
  }
}
return new User($pdo);