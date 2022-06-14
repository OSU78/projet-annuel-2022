<?php

class AuthDB
{
    private PDOStatement $statementRegister;
    private PDOStatement $statementReadUserFromEmails;
    private PDOStatement $statementUpdateUser;

    function __construct(PDO $pdo)
    {
        $this->statementRegister = $pdo->prepare('INSERT INTO user(
            id_user,
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


    function register(array $user): void
    {
        $hashedPassword = password_hash($user['password'], PASSWORD_ARGON2I);
        $this->statementRegister->bindValue(':firstname', $user['firstname']);
        $this->statementRegister->bindValue(':lastname', $user['lastname']);
        $this->statementRegister->bindValue(':speudo', $user['speudo']);
        $this->statementRegister->bindValue(':images', $user['images']);
        $this->statementRegister->bindValue(':email', $user['email']);
        $this->statementRegister->bindValue(':password', $hashedPassword);
        $this->statementRegister->execute();
        return;
    }

    function checkMail(string $email): array | false
    {
        $this->statementReadUserFromEmails->bindValue(':email', $email);
        $this->statementReadUserFromEmails->execute();
        return $this->statementReadUserFromEmails->fetch();
    }

    //mise a jours d'un utilisateur
    function updateUser(array $user)
    {
        var_dump($user);
        $this->statementUpdateUser->bindValue(':speudo', $user['speudo']);
        $this->statementUpdateUser->bindValue(':images', $user['images']);
        $this->statementUpdateUser->bindValue(':email', $user['email']);
        $this->statementUpdateUser->bindValue(':password', $user['password']);
        $this->statementUpdateUser->bindValue(':id', (int)$user['id_user']);
        $this->statementUpdateUser->execute();
        return;
    }
}
return new AuthDB($pdo);