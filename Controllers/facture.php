<?php
require '../vendor/autoload.php';
require_once '../Models/Database.php';
use Spatie\Browsershot\Browsershot;


class Facture
{
    private PDOStatement $statementGetAllFacture;
    private PDOStatement $statementDeleteFacture;
    private PDOStatement $statementGetFactureDetail;
    private PDOStatement $statementConfirmeFacture;
    private PDO $pdo;
    private int $idFacture;
    private int $idUser;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
        $this->statementGetAllFacture = $this->pdo->prepare('SELECT * FROM commande WHERE idUser=:idUser');
        $this->statementGetFactureDetail =$this->pdo->prepare("SELECT * FROM products inner join lign_commande where products.idProd=lign_commande.idProd && idCmd=:idCmd");
    }
    

    
    public function getAllFacture(): array
    { 
        $this->statementGetAllFacture->bindValue(':idUser', $this->idUser);
        $this->statementGetAllFacture->execute();
        return $this->statementGetAllFacture->fetchAll();
       // $this->statementGetAllFacture->closeCursor();
    }

    public function getFactureDetail():array{
        $this->statementGetFactureDetail->bindValue(':idCmd', $this->idFacture);
        $this->statementGetFactureDetail->execute();
        return $this->statementGetFactureDetail->fetchAll();
        //SELECT * FROM products inner join lign_commande where products.idProd=lign_commande.idProd && idCmd=1;
       
    }

    public function getFacture($idFacture,$factureItem)
    {
        // $t=json_decode($factureItem, true);
        // print_r(json_decode($factureItem));
        // die();
        $cvName = 'facture-n-' . $idFacture . '.pdf';
        $path = explode("\\", getcwd());

        $url='http://' . $_SERVER['SERVER_NAME'] . '/Public/templateFacture/template.html?idCmd='.$idFacture;
        // var_dump($url);
        // die();
        Browsershot::url($url)->ignoreHttpsErrors();
        $html = Browsershot::url($url)->bodyHtml();
        //echo $html;
       
        $pdf=Browsershot::html($html)->format('A4')->pdf();
        header("Content-type:application/pdf");
        echo $pdf;
        return $idFacture;
    }

    // encodage du header
    public function sendJSON($infos,$code=200)
    {
        switch($code){
            case 200 :
            http_response_code(200);
            break;
            case 404 :
            http_response_code(404);
            break;
            

        }
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json");
        
        echo json_encode($infos, JSON_UNESCAPED_UNICODE);
    }


    /*Getter et setter*/
    /**
     * Get the value of idFacture
     */
    public function getIdFacture(): int
    {
        return $this->idFacture;
    }

    /**
     * Set the value of idFacture
     */
    public function setIdFacture(int $idFacture): self
    {
        $this->idFacture = $idFacture;
        return $this;
    }



    /**
     * Get the value of idUser
     */
    public function getIdUser(): int
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     */
    public function setIdUser(int $idUser): self
    {
        $this->idUser = $idUser;

        return $this;
    }


}




