<?php
class Models
{
  private PDOStatement $statementRegister;
  private PDOStatement $statementReadUserFromEmails;
  private PDOStatement $statementReadById;
  private PDOStatement $statementUpdateUser;
  private PDOStatement $statementRegisterAddress;
  private PDO $pdo;

  public function __construct(PDO $pdo)
  {
    $this->pdo = $pdo;
    $this->statementRegister = $pdo->prepare('INSERT INTO user(
            idUser,
            email,
            password
            )VALUES(
            DEFAULT,
            :email,
            :password
            )');

    $this->statementUpdateUser = $pdo->prepare(
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
    $this->statementRegisterAddress = $pdo->prepare('INSERT INTO adress (
            `idAdress`, 
            `postalCode`, 
            `numVoice`, 
            `twon`, 
            `country`, 
            `voice`
            )VALUES(
            DEFAULT,
            :postalCode, 
            :numVoice, 
            :twon, 
            :country, 
            :voice
            )');
    $this->statementReadUserFromEmails = $pdo->prepare('SELECT * FROM user WHERE email=:email');
    $this->statementReadById = $pdo->prepare('SELECT * FROM `user` INNER JOIN adress ON adress.idUser = user.idUser WHERE user.idUser =:idUser;');
  }

  //enregistrement d'un utilisateur a la connexion
  public function register(array $user): int
  {
    $hashedPassword = password_hash($user['password'], PASSWORD_ARGON2I);
    $this->statementRegister->bindValue(':email', $user['email']);
    $this->statementRegister->bindValue(':password', $hashedPassword);
    $this->statementRegister->execute();
    return $this->pdo->lastInsertId();
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
  }

  //enregistrement d'une adresse
  public function registerAddress(array $address): void
  {
    $this->statementRegisterAddress->bindValue(':numVoice', $address['numVoice']);
    $this->statementRegisterAddress->bindValue(':postalCode', $address['postalCode']);
    $this->statementRegisterAddress->bindValue(':twon', $address['twon']);
    $this->statementRegisterAddress->bindValue(':country', $address['country']);
    $this->statementRegisterAddress->bindValue(':voice', $address['voice']);
    $this->statementUpdateUser->bindValue(':idUser', (int)$address['idUser']);
    $this->statementRegisterAddress->execute();
    return;
  }

  // recuperation des informations par l'ID
  public function getUser(int $idUser): array | false
  {
    $this->statementReadById->bindValue(':idUser', $idUser);
    $this->statementReadById->execute();
    return $this->statementReadById->fetch();
  }

  // recuperation des informations a partir del'adresse mail
  public function checkMail(string $email): array | false
  {
    $this->statementReadUserFromEmails->bindValue(':email', $email);
    $this->statementReadUserFromEmails->execute();
    return $this->statementReadUserFromEmails->fetch();
  }
}
return new Models($pdo);