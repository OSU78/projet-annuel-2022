<?php
class Models
{
  private PDOStatement $statementRegister;
  private PDOStatement $statementReadUserFromEmails;
  private PDOStatement $statementUpdateUser;

  public function __construct(PDO $pdo)
  {
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
                `speudo`=:speudo,
                `email`=:email, 
                `images`=:images, 
                `password`=:password
            WHERE id_user =:id'
    );

    $this->statementReadUserFromEmails = $pdo->prepare('SELECT * FROM user WHERE email=:email');
  }

  public function register(array $user): void
  {
    $hashedPassword = password_hash($user['password'], PASSWORD_ARGON2I);
    $this->statementRegister->bindValue(':email', $user['email']);
    $this->statementRegister->bindValue(':password', $hashedPassword);
    $this->statementRegister->execute();
    return;
  }

  public function checkMail(string $email): array | false
  {
    $this->statementReadUserFromEmails->bindValue(':email', $email);
    $this->statementReadUserFromEmails->execute();
    return $this->statementReadUserFromEmails->fetch();
  }

  //mise a jours d'un utilisateur
  public function updateUser(array $user)
  {
    $this->statementUpdateUser->bindValue(':speudo', $user['speudo']);
    $this->statementUpdateUser->bindValue(':images', $user['images']);
    $this->statementUpdateUser->bindValue(':email', $user['email']);
    $this->statementUpdateUser->bindValue(':password', $user['password']);
    $this->statementUpdateUser->bindValue(':id', (int)$user['idUser']);
    $this->statementUpdateUser->execute();
    return;
  }
}
return new Models($pdo);