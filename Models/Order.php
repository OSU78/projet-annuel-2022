  <?php

	class Order
	{
		private PDOStatement $statementCreateOneCmd;
		private PDOStatement $statementReadAllCmd;
		private PDOStatement $statementCreateOneDetailCmd;
		private PDOStatement $statementReadOneOrder;
		private PDOStatement $statementReadOne;
		private PDOStatement $statementReadOneFromComd;
		private PDOStatement $statementReadAllFromDetailCmd;
		private PDO $pdo;

		function __construct(PDO $pdo)
		{
			$this->pdo = $pdo;
			$this->statementCreateOneCmd = $pdo->prepare('INSERT INTO `commande`(
		`idCmd`,
		`idUser`,
		`montantCmd`, 
		`statusCmd`
		)
		VALUES(
	  DEFAULT,
    :idUser,
    :montantCmd,
    :statusCmd
		)');

			$this->statementCreateOneDetailCmd = $pdo->prepare('INSERT INTO `lign_commande`(
		`idLineCmd`,
		`idProd`, 
		`idCmd`, 
		`priceTotalProd`, 
		`quantityProd`
		)
		VALUES(
		DEFAULT,
			:idProd,
			:idCmd,
			:priceTotalProd,
			:quantityProd
		)');

			$this->statementReadAllFromDetailCmd		= $pdo->prepare('SELECT * FROM  detail_commande WHERE id_cmd=:id_cmd');
			$this->statementReadAllCmd				      = $pdo->prepare('SELECT * FROM commande WHERE idUser=:idUser');
			$this->statementReadOneOrder			      = $pdo->prepare('SELECT commande.montant_cmd, detail_commande.* FROM detail_commande LEFT JOIN commande ON detail_commande.id_cmd = commande.id_cmd  WHERE commande.id_cmd=:id');
			$this->statementReadOneFromComd         = $pdo->prepare('SELECT id_cmd FROM commande WHERE client_id=:id ORDER BY id_cmd DESC LIMIT 0, 1');
			$this->statementReadOne                 = $pdo->prepare('SELECT idCmd FROM commande WHERE idUser=:idUser');
			$this->statementReadAllCommande         = $pdo->prepare('SELECT * FROM commande');
		}

		public function registerOrder($commande)
		{
			$this->statementCreateOneCmd->bindValue(':idUser', $commande['idUser']);
			$this->statementCreateOneCmd->bindValue(':montantCmd', $commande['montantCmd']);
			$this->statementCreateOneCmd->bindValue(':statusCmd', $commande['statusCmd']);
			$this->statementCreateOneCmd->execute();
			return $this->pdo->lastInsertId();
			$this->statementCreateOneCmd->closeCursor();
		}

		public function registerDetailOrder(array $Detailcommande)
		{
			$this->statementCreateOneDetailCmd->bindValue(':idProd', $Detailcommande['idProd']);
			$this->statementCreateOneDetailCmd->bindValue(':idCmd', $Detailcommande['idCmd']);
			$this->statementCreateOneDetailCmd->bindValue(':priceTotalProd', $Detailcommande['priceTotalProd']);
			$this->statementCreateOneDetailCmd->bindValue(':quantityProd', $Detailcommande['quantityProd']);
			$this->statementCreateOneDetailCmd->execute();
			return $this->pdo->lastInsertId();
			$this->statementCreateOneDetailCmd->closeCursor();
		}
		// recuperation des commandes d'un client
		public function getAllCmdClient($idUser): array
		{
			$this->statementReadAllCmd->bindValue(':idUser', $idUser);
			$this->statementReadAllCmd->execute();
			return $this->statementReadAllCmd->fetchAll();
		}

		public function fetchOneOrder(string $idUser): array
		{
			$this->statementReadOneOrder->bindValue(':idUser', $idUser);
			$this->statementReadOneOrder->execute();
			return $this->statementReadOneOrder->fetchAll();
		}


		public function fetchAllFromDetailCmd($id): array
		{
			$this->statementReadAllFromDetailCmd->bindValue(':id_cmd', $id);
			$this->statementReadAllFromDetailCmd->execute();
			return $this->statementReadAllFromDetailCmd->fetchAll();
		}



		public function ReadOneFromComd($id)
		{
			$this->statementReadOneFromComd->bindValue(':id', $id);
			$this->statementReadOneFromComd->execute();
			return $this->statementReadOneFromComd->fetch();
		}

		public function fetchOne(string $idUser): array
		{
			$this->statementReadOne->bindValue(':idUser', $idUser);
			$this->statementReadOne->execute();
			return $this->statementReadOne->fetch();
		}
	}
	return new Order($pdo);