<?php
// controle tel
$tel = "04-77-55-88-99";
if (preg_match(" #^[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}[-/ ]?[0-9]{2}?$# ", $tel)) {
  echo "Le téléphone est valide";
}



if (preg_match(" /^.+@.+\.[a-zA-Z]{2,}$/ ", $email)) {
  echo json_encode(
    ['email' => ERROR_EMAIL_INVALID . " diallo"]
  );
  $errors['email'] = ERROR_EMAIL_INVALID;
}