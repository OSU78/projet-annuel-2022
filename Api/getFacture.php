<?php
// le fichier config contient le constantes definis et la connexion a la base de donnée
require '../config.php';
$authDB = require_once '../Controllers/facture.php';

$facture = new Facture($pdo);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idUser= htmlspecialchars($_POST["id"])??"";
    $req=htmlspecialchars($_POST["req"])??"";
    
    if($req=="getAllFacture"){
       $allFacture= $facture->setIdUser($idUser);
    //    print_r($facture->getAllFacture());
    //    die();
        $facture->sendJSON( $facture->getAllFacture());
        //print_r( $facture->getAllFacture() );
       // die();
    }
    else if($req=="getFacture"){
        $idCmd=htmlspecialchars($_POST["idCmd"])??"";
        $facture->setIdFacture($idCmd);
        
        $getFacture= $facture->getFactureDetail();
        // print_r($getFacture);
        //     die();
            $facture->sendJSON($getFacture);
            //print_r( $facture->getAllFacture() );
           // die();

    }

    else if ($req=="dowloadFacture"){
        $idCmd=htmlspecialchars($_POST["idCmd"])??"";
        $factureItem=htmlspecialchars($_POST["factureItem"])??"";
        $facture->setIdFacture($idCmd);
        $getFacture= $facture->getFacture($idCmd,$factureItem);
        echo $getFacture;
        //return $getFacture;
    }
   

 
} else {
  $facture->sendJSON('Mauvaise requete');
}