<?php
require 'User.php';

class Basket extends User
{
  private PDOStatement $statementRegisterBasket;
  public PDOStatement $statementReadBasket;
  public PDOStatement $statementUpdateBasket;

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
            `street_number`=:street_number,
            `locality`=:locality,
            `country`=:country,
            `route`=:route,
      WHERE idUser =:idUser'
    );
    $this->statementRegisterAddress = $this->pdo->prepare('INSERT INTO adress ( `idAdress`,  `idUser` )VALUES( DEFAULT, :idUser);');
    $this->statementReadUserFromEmails = $this->pdo->prepare('SELECT * FROM user WHERE email=:email LIMIT 1');
    $this->statementReadBasket = $this->pdo->prepare('SELECT * FROM `products` WHERE idProd =:idProd;');
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

  //mise a jours d'une adresse 
  public function updateAddress(array $address)
  {
    $this->statementUpdateAddress->bindValue(':postalCode', $address['postalCode']);
    $this->statementUpdateAddress->bindValue(':street_number', $address['street_number']);
    $this->statementUpdateAddress->bindValue(':locality', $address['locality']);
    $this->statementUpdateAddress->bindValue(':country', $address['country']);
    $this->statementUpdateAddress->bindValue(':route', $address['route']);
    $this->statementUpdateAddress->bindValue(':idUser', $address['idUser']);
    $this->statementUpdateAddress->execute();
    $this->statementUpdateAddress->closeCursor();
  }

  // recuperation des informations par l'ID
  public function getOneProd(int $idProd): array | false
  {
    $this->statementReadBasket->bindValue(':idProd', $idProd);
    $this->statementReadBasket->execute();
    return $this->statementReadBasket->fetch();
    $this->statementReadBasket->closeCursor();
  }
}
return new Basket($pdo);