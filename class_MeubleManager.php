<?php
	class MeubleManager
	{
		
		protected $_db; // Instance de PDO.
		
		public function __construct($db)
		{
			$this->setDb($db);
		}
		
		public function add(Meuble $meuble) //Ajouter un Meuble TESTE ET APPROUVE
		{
			// Préparation de la requête d'insertion.
			$q = $this->_db->prepare('INSERT INTO loca_meubles SET type = :type, photo1 = :photo1, photo2 = :photo2, photo3 = :photo3, rentedBy = :rentedBy');
			
			// Assignation des valeurs
			$q->bindValue(':type', $meuble->type());
			$q->bindValue(':photo1', $meuble->photo1(), PDO::PARAM_INT);
			$q->bindValue(':photo2', $meuble->photo2(), PDO::PARAM_INT);
			$q->bindValue(':photo3', $meuble->photo3(), PDO::PARAM_INT);
			$q->bindValue(':rentedBy', $meuble->rentedBy(), PDO::PARAM_INT);
			
			// Exécution de la requête.
			$q->execute();		
		}
		
		public function delete(Meuble $meuble) // Supprime un meuble TESTEET APPROUVE
		{
			$q = $this->_db->prepare('DELETE FROM loca_meubles WHERE id ='.$meuble->id());
			$q->execute();
		}
		
		public function get($id)  //Cherche et retourne un meuble selon son ID TESTE ET APPROUVE
		{		
			$q = $this->_db->query('SELECT * FROM loca_meubles WHERE id='.$id);
			$donnees = $q->fetch(PDO::FETCH_ASSOC);

			return new Meuble($donnees);		
		}
		
		public function getList() // Retourne la liste de tous les meubles.
		{
			$meubles = [];

			$q = $this->_db->prepare('SELECT * FROM loca_meubles ORDER BY id');
			$q->execute();

			while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
			{
			  $meubles[] = new Meuble($donnees);
			}

			return $meubles;
		}
		
		public function update(Meuble $meuble)
		{
			$q = $this->_db->prepare('UPDATE loca_meubles SET type=:type, photo1 = :photo1, photo2 = :photo2, photo3 = :photo3, rentedBy = :rentedBy WHERE id =:id');
			
			$q->bindValue(':id', $meuble->id());
			$q->bindValue(':type', $meuble->type());
			$q->bindValue(':photo1', $meuble->photo1(), PDO::PARAM_INT);
			$q->bindValue(':photo2', $meuble->photo2(), PDO::PARAM_INT);
			$q->bindValue(':photo3', $meuble->photo3(), PDO::PARAM_INT);
			$q->bindValue(':rentedBy', $meuble->rentedBy(), PDO::PARAM_INT);
			
			$q->execute();
		}
		
		public function setDb(PDO $db)
		{
			$this->_db = $db;
		}
		
	}
