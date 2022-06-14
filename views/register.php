<?php require_once '../controllers/auth-register.php'; ?>
<!DOCTYPE html>
<html lang="fr">

<head>
  <?php require "includes/head.php" ?>
  <title>Inscription</title>
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
      <div class="mb-3">
        <label for="" class="">Confirmer Password:</label>
        <input type="password" value="<?= $confirmpassword ?? '' ?>" class="" name="" id="">
        <?php if ($errors['confirmpassword']) : ?>
        <p class="text-danger"><?= $errors['confirmpassword'] ?></p>
        <?php endif; ?>
      </div>
      <div class="">
        <input class="" type="checkbox" role="" id="">
        <label class="" for="">Se souvenir de moi </label>
      </div>
      <div class="">
        Deja membre? <a href="/views/login.php">Connexion</a>
      </div>
      <div class="">
        <button type="reset" class="btn btn-secondary">Fermer</button>
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </form>
  </div>
  <?php require "includes/footer.php" ?>