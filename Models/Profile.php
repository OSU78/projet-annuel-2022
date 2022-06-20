<?php
// exportatation de la classe USER
require 'User.php';

class Profile extends User
{
  public function formatFrenchPhoneNumber($phoneNumber)
  {
    $international = false;
    //Supprimer tous les caractères qui ne sont pas des chiffres
    $phoneNumber = preg_replace('/[^0-9]+/', '', $phoneNumber);
    //Garder les 9 derniers chiffres
    $phoneNumber = substr($phoneNumber, -9);
    //On ajoute +33 si la variable $international vaut true et 0 dans tous les autres cas
    $motif = $international ? '+33 (\1) \2 \3 \4 \5' : '0\1 \2 \3 \4 \5';
    $phoneNumber = preg_replace('/(\d{1})(\d{2})(\d{2})(\d{2})(\d{2})/', $motif, $phoneNumber);
    return $phoneNumber;
  }

  // validation du numero de téléphone
  public function validateTel($tel)
  {
    $this->tel = $this->requireContent($tel);

    // $tel = $this->formatFrenchPhoneNumber($tel);
    // if (!$tel) {
    //   return $tel;
    // } else
    //   $tel = $this->formatFrenchPhoneNumber($tel);
    return $this->tel;
  }

  // verification code postal
  public function postalCode($postalcode)
  {
    $this->postalcode = $this->requireContent($postalcode);
    if ($postalcode) {
      if (!preg_match("/^[0-9]{5}$/", $postalcode)) {
        $this->postalcode = ERROR_POSTAL_CODE_INVALID;
      }
      // if ($postalcode === '1') {
      //   $postalcode = "";
      // }
    }
    return $this->postalcode;
  }

  // verification des chaines de caractere 
  function validateString($contentString)
  {
    $this->contentString = $this->requireContent($contentString);
    if ($this->contentString) {
      if (mb_strlen($contentString) < 2) {
        $this->contentString = ERROR_TOO_SHORT;
      }
    }
    return $this->contentString;
  }
}