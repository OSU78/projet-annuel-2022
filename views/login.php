<?php require_once '../controllers/auth-login.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require "includes/head.php" ?>
  <title>Connexion</title>
</head>

<body>
  <?php require "includes/header.php" ?>

  <div class="wrapper">
    <form action="" , method="POST" id="form">
      <div class="">
        <label for="" class="">Mail:</label>
        <input type="email" value="<?= $email ?? '' ?>" name="email" id="">
        <?php if ($errors['email']) : ?>
        <p class="text-danger"><?= $errors['email'] ?></p>
        <?php endif; ?>
      </div>
      <div class="">
        <label for="" class="">Password:</label>
        <input type="password" value="<?= $password ?? '' ?>" class="" name="password" id="password">
        <?php if ($errors['password']) : ?>
        <p class="text-danger"><?= $errors['password'] ?></p>
        <?php endif; ?>
      </div>

      <div class="">
        <input class="" type="checkbox" role="" id="">
        <label class="" for="">Se souvenir de moi </label>
      </div>
      <div class="">
        Pas encore membre? <a href="/views/login.php">Inscription</a>
      </div>
      <div class="">
        <button type="reset" class="btn btn-secondary">Fermer</button>
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </form>
  </div>
  <?php require "includes/footer.php" ?>