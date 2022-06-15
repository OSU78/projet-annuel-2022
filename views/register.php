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
      <div class="form-control">
        <label for="" class="">Mail:</label>
        <input type="email" value="<?= $email ?? '' ?>" name="email" id="">
      </div>
      <?php if ($errors['email']) : ?>
      <p class="text-danger"><?= $errors['email'] ?></p>
      <?php endif; ?>
      <div class="form-control">
        <label for="" class="">Password:</label>
        <input type="password" value="<?= $password ?? '' ?>" class="" name="password" id="password">

      </div>
      <?php if ($errors['password']) : ?>
      <p class="text-danger"><?= $errors['password'] ?></p>
      <?php endif; ?>

      <div class="form-control">
        <label for="" class="">Confirmer Password:</label>
        <input type="password" value="<?= $confirmpassword ?? '' ?>" class="" name="confirmpassword" id="">

      </div>
      <?php if ($errors['confirmpassword']) : ?>
      <p class="text-danger"><?= $errors['confirmpassword'] ?></p>
      <?php endif; ?>

      <div class="">
        <input class="" type="checkbox" role="" id="">
        <label class="" for="">Se souvenir de moi </label>
      </div>
      <div class="">
        Deja membre? <a href="/views/login.php">Connexion</a>
      </div>
      <div class="submit">
        <button type="reset" class="btn btn-secondary">Fermer</button>
        <button type="submit" class="btn btn-primary">Envoyer</button>
      </div>
    </form>
  </div>
  <?php require "includes/footer.php" ?>