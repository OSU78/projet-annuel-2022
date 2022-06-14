<?php
require_once("config.php");
include("createSession.php");
//requete INSERT INTO user( id,pseudo,nom,prenom,email,mdp ) VALUES (null,"d", "d","dd","d","d");
if (isset($_POST['submit'])) {

  /*securisation des variable du formulaire*/
  $prenom = htmlspecialchars($_POST['prenom']);
  $nom = htmlspecialchars($_POST['nom']);
  $pseudo = htmlspecialchars($_POST['pseudo']);
  $email = htmlspecialchars($_POST['email']);
  $mdp1 = htmlspecialchars($_POST['mdp1']);
  $mdp2 = htmlspecialchars($_POST['mdp2']);

  /*--------------------------------------*/
  /*Condition de leur validation*/
  /*--------------------------------------*/
  /*Condition de leur validation*/
  if (isset($_POST['prenom']) && !empty($_POST['prenom']) && isset($_POST['nom']) && !empty($_POST['nom']) && isset($_POST['mdp1']) && !empty($_POST['mdp1']) && isset($_POST['mdp2']) && !empty($_POST['mdp2']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['pseudo']) && !empty($_POST['pseudo'])) {
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $requser = $bdd->prepare('SELECT * FROM user WHERE email= ?');
      $requser->execute(array($email));
      $email_exist = $requser->rowCount();

      if ($email_exist == 0) {

        /*envoi de mail de confirmation*/
        $longueurKey = 15;/*LONGUEUR DE LA CLE DE CONFIRMATION 15*/
        $key = "";
        for ($i = 1; $i < $longueurKey; $i++) {
          $key .= mt_rand(1, 9);
        }
        $mdp = $mdp1;
        //KEY EST LA CLE ALEATOIREMENT GENERER
        /*on securise le mot de passe du client*/
        $mdpsec = hash('sha256', $mdp);
        $confirme = 0;
        /*REQUETE PREPARER D'INSERTION DU NOUVEAU MEMBRES*/

        $insertmbr = $bdd->prepare("INSERT INTO user( id,pseudo,nom,prenom,email,keyC,userVerifier,mdp) VALUES (null,?,?,?,?,?,?,?);
          ");
        $insertmbr->execute(array($pseudo, $nom, $prenom, $email, $key, $confirme, $mdpsec));

        $req_user = $bdd->prepare('SELECT * FROM user WHERE email =? AND mdp =?');
        //var_dump($req_user);
        $req_user->execute(array($email, $mdpsec));
        //print_r($email);
        //print_r($mdpsec);
        $user_info = $req_user->fetch();
        //var_dump($user_info);
        $user_exist = $req_user->rowCount();
        if ($user_exist >= 1) {
          createSession($user_info);
          header("Location:../homePage.php?email=" . $_SESSION['pseudo'] . "&ID=" . $_SESSION['session_start']);
        } else {
          /*On appel la fonction qui permet de crée la session de l'utilisateur*/
          header('Location: ../connexion.php?erreur=sessioncreatefailed');
        }
      } else {
        header('Location: ../connexion.php?erreur=emailAlreadyExit');
      }
    } else {
      header('Location: ../index.php?erreur=emailInvalide');
      $msg = 'Adresse mail Invalide';
    }
  } else {
    header('Location: ../index.php?erreur="field"');
  }
}