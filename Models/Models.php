<?php
class Models
{
  private PDOStatement $statementRegister;
  public PDOStatement $statementReadUserFromEmails;
  private PDOStatement $statementReadById;
  private PDOStatement $statementUpdateUser;
  private PDOStatement $statementUpdateAddress;
  private PDOStatement $statementRegisterAddress;
  private PDOStatement $statementIslogged;

  public PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
    $this->statementRegister = $this->pdo->prepare('INSERT INTO user(
            idUser,
            email,
            password
            )VALUES(
            DEFAULT,
            :email,
            :password
            )');

    $this->statementUpdateUser = $this->pdo->prepare(
      'UPDATE user SET 
            `email`=:email,
            `password`=:password,
            `tel_1`=:tel_1,
            `tel_2`=:tel_2,
            `firstname`=:firstname,
            `lastname`=:lastname,
            `idAddress`=:idAddress,
      WHERE idUser =:idUser'
    );
    $this->statementUpdateAddress = $this->pdo->prepare(
      'UPDATE adress SET 
            `postalCode`=:postalCode,
            `numVoice`=:numVoice,
            `twon`=:twon,
            `country`=:country,
            `voice`=:voice,
      WHERE idUser =:idUser'
    );
    $this->statementRegisterAddress = $this->pdo->prepare('INSERT INTO adress ( `idAdress`,  `idUser` )VALUES( DEFAULT, :idUser);');
    $this->statementReadUserFromEmails = $this->pdo->prepare('SELECT * FROM user WHERE email=:email LIMIT 1');
    $this->statementReadById = $this->pdo->prepare('SELECT * FROM `user` INNER JOIN adress ON adress.idUser = user.idUser WHERE user.idUser =:idUser;');
    $this->statementIslogged = $this->pdo->prepare('SELECT email, password FROM user WHERE email=:email AND password=:password');
  }



  //enregistrement d'un utilisateur a la connexion
  public function register(array $user): int
  {
    $hashedPassword = password_hash($user['password'], PASSWORD_ARGON2I);
    $this->statementRegister->bindValue(':email', $user['email']);
    $this->statementRegister->bindValue(':password', $hashedPassword);
    $this->statementRegister->execute();
    return $this->pdo->lastInsertId();
    $this->statementRegister->closeCursor();
  }

  //mise a jours d'un utilisateur
  public function updateUser(array $user)
  {
    $hashedPassword = password_hash($user['password'], PASSWORD_ARGON2I);
    $this->statementUpdateUser->bindValue(':password', $hashedPassword);
    $this->statementUpdateUser->bindValue(':email', $user['email']);
    $this->statementUpdateUser->bindValue(':tel_1', $user['tel_1']);
    $this->statementUpdateUser->bindValue(':tel_2', $user['tel_2']);
    $this->statementUpdateUser->bindValue(':firstname', $user['firstname']);
    $this->statementUpdateUser->bindValue(':lastname', $user['lastname']);
    $this->statementUpdateUser->bindValue(':idAddress', $user['idAddress']);
    $this->statementUpdateUser->bindValue(':idUser', (int)$user['idUser']);
    $this->statementUpdateUser->execute();
    return;
    $this->statementUpdateUser->closeCursor();
  }

  //mise a jours d'une adresse 
  public function updateAddress(array $address)
  {
    $this->statementUpdateAddress->bindValue(':postalCode', $address['postalCode']);
    $this->statementUpdateAddress->bindValue(':numVoice', $address['numVoice']);
    $this->statementUpdateAddress->bindValue(':twon', $address['twon']);
    $this->statementUpdateAddress->bindValue(':country', $address['country']);
    $this->statementUpdateAddress->bindValue(':voice', $address['voice']);
    $this->statementUpdateAddress->bindValue(':idUser', $address['idUser']);
    $this->statementUpdateAddress->execute();
    $this->statementUpdateAddress->closeCursor();
  }

  //enregistrement d'une adresse
  public function registerAddress(int $idUser): int
  {
    $this->statementRegisterAddress->bindValue(':idUser', $idUser);
    $this->statementRegisterAddress->execute();
    return $this->pdo->lastInsertId();
    $this->statementRegisterAddress->closeCursor();
  }

  // recuperation des informations par l'ID
  public function getUser(int $idUser): array | false
  {
    $this->statementReadById->bindValue(':idUser', $idUser);
    $this->statementReadById->execute();
    return $this->statementReadById->fetch();
    $this->statementReadById->closeCursor();
  }

  public function checkUserLogged($email, $password)
  {
    $hashedPassword = password_hash($password, PASSWORD_ARGON2I);
    $this->statementIslogged->bindValue(':email', $email);
    $this->statementIslogged->bindValue(':password', $hashedPassword);
    $this->statementIslogged->execute();
    $this->statementIslogged->fetch();
    $count = $this->statementIslogged->rowCount();
    return $count;
    $this->statementIslogged->closeCursor();
  }


  // recuperation des informations de lutilisateur avec le mail
  public function getUserByMail(string $email): array | false
  {
    $this->statementReadUserFromEmails->bindValue(':email', $email);
    $this->statementReadUserFromEmails->execute();
    return $this->statementReadUserFromEmails->fetch();
    $this->statementReadUserFromEmails->closeCursor();
  }

  // recuperation des informations a partir del'adresse mail
  public function checkMail(string $email): int | false
  {
    $this->statementReadUserFromEmails->bindValue(':email', $email);
    $this->statementReadUserFromEmails->execute();
    $this->statementReadUserFromEmails->fetch();
    $count = $this->statementReadUserFromEmails->rowCount();
    return $count;
    $this->statementReadUserFromEmails->closeCursor();
  }
  // encodage du header
  public function sendJSON($infos)
  {
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json");
    echo json_encode([$infos], JSON_UNESCAPED_UNICODE);
  }
}
return new Models($pdo);