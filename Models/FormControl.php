<?php
require 'Models.php';

class FormControl extends Models
{
  private string $email;
  private string $password;
  private string $confirmMdp;
  public function __construct()
  {
    // $this->email = $email;
    // $this->password = $password;
    // $this->confirmMdp = $confirmMdp;
  }

  // les getters

  public function getEmail()
  {
    if (!$this->email) {
      $errors['email'] = ERROR_REQUIRED;
    } else {
      $count = $this->pdo->checkMail($this->email);
      if ($count !== 0) {
        $errors['email'] = ERROR_EMAIL_EXIST;
      }
    }
    return $this->$errors['email'];
  }

  public function getPassword()
  {
    return $this->_password;
  }

  public function getConfirmdp()
  {
    return $this->_confirmMdp;
  }


  // setters
  public function setEmail($email)
  {
  }

  public function SetPassword($password)
  {
  }
  public function setConfirmdp($confirmMdp)
  {
  }
}