<?php
 // // verification du email
 // $errors['email'] = $user->validateEmailRegister($email);

 // // verification du mdp
 // $errors['password'] = $user->validatePasswordRegister($password, $confirmpassword);

 // // verification des numeros de telephone
 // $errors['tel1'] = $profile->validateTel($tel1);
 // $errors['tel1'] = $profile->formatFrenchPhoneNumber($tel1);
 // $errors['tel2'] = $profile->validateTel($tel2);
 // $errors['tel2'] = $profile->formatFrenchPhoneNumber($tel2);
 // // var_dump($errors['tel1']);
 // // var_dump($errors['tel2']);
 if (!$tel1) {
 $errors['tel1'] = ERROR_REQUIRED;
 } else {
 if ($profile->isValidTelephoneNumber($tel1)) {
 //normalize telephone number if needed
 $profile->normalizeTelephoneNumber($tel1);
 // return $tel1;
 }
 }
 if (!$tel2) {
 $errors['tel2'] = ERROR_REQUIRED;
 } else {
 if ($profile->isValidTelephoneNumber($tel2)) {
 //normalize telephone number if needed
 $profile->normalizeTelephoneNumber($tel2);
 // return $tel2;
 }
 }

 // // verification du code postal
 $errors['postalCode'] = $profile->postalCode($postalCode);
 // // var_dump($errors['postalCode']);

 // // verification des noms et prenoms
 $errors['firstname'] = $profile->validateString($firstname);
 if (!$errors['firstname']) {
 $errors['firstname'] = "";
 }
 if ($firstname == "") {
 return ERROR_REQUIRED;
 }
 if ($firstname) {
 if (mb_strlen($firstname) < 2) { return ERROR_TOO_SHORT; } } // $errors['lastname']=$profile->validateString($lastname);
   // if (!$errors['lastname']) {
   // $errors['lastname'] = "";
   // }




   // verifi si c'est des chiffres
   function isDigits(string $s, int $minDigits = 9, int $maxDigits = 14): bool
   {
   return preg_match('/^[0-9]{' . $minDigits . ',' . $maxDigits . '}\z/', $s);
   }

   function isValidTelephoneNumber(string $telephone, int $minDigits = 9, int $maxDigits = 14): bool
   {
   if (preg_match('/^[+][0-9]/', $telephone)) { //is the first character + followed by a digit
   $count = 1;
   $telephone = str_replace(['+'], '', $telephone, $count); //remove +
   }

   //remove white space, dots, hyphens and brackets
   $telephone = str_replace([' ', '.', '-', '(', ')'], '', $telephone);

   //are we left with digits only?
   return $this->isDigits($telephone, $minDigits, $maxDigits);
   }

   function normalizeTelephoneNumber(string $telephone): string
   {
   //remove white space, dots, hyphens and brackets
   $telephone = str_replace([' ', '.', '-', '(', ')'], '', $telephone);
   return $telephone;
   }

   // validation du numero de téléphone


   // verification code postal
   public function postalCode($postalcode)
   {
   $postalcode = $this->requireContent($postalcode);
   if ($postalcode) {
   if (!preg_match("/^[0-9]{5}$/", $postalcode)) {
   $postalcode = ERROR_POSTAL_CODE_INVALID;
   }
   }
   return $postalcode;
   }

   // verification des chaines de caractere
   function validateString($contentString)
   {
   // $contentString = $this->requireContent($contentString);
   if (!$contentString) {
   if (mb_strlen($contentString) < 2) { $contentString=ERROR_TOO_SHORT; } } return $contentString ?? "" ; } <!-- dans les element a envoyer -->

     // creation de de la session
     // session_start();
     // // enregistrement des données en base
     // $insertUser = $authDB->register([
     // 'email' => $email,
     // 'password' => $password
     // ]);
     // $user->sendJSON('diallo');
     // // 3. Donner un statut de succes ou d'erreur au format JSON
     // if ($insertUser !== 0) {
     // // recuperation des information de l'utilisateur
     // $getUserIdBymail = $user->getUserBymail($email);
     // // die();
     // if ($getUserIdBymail) {
     // $_SESSION['user'] = [
     // 'email' => $email,
     // 'idUser' => $getUserIdBymail['idUser']
     // ];
     // var_dump($getUserIdBymail['idUser']);

     // // enregistement de 'ID de l'utilisateur en base de donnée
     // $insertAddress = $authDB->registerAddress(
     // $getUserIdBymail['idUser']
     // );

     // echo json_encode([
     // 'status' => "succes enregistrement",
     // 'sessionEmail' => $_SESSION["email"]
     // ]);
     // } else {
     // echo json_encode([
     // 'status' => "Erreur d'enregistement"
     // ]);

     // si le tableau n'est pas vide on renvoie le tableau d'erreur