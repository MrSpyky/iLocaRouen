<?
	class MeubleManager {
		
		private $_db; // Instance de PDO.
		
		public function __construct($db)
		{
			$this->setDb($db);
		}
		
		public function add(Meuble $meuble)
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
		
		public function delete(Meuble $meuble)
		{
			// Exécute une requête de type DELETE.
		}
		
		public function get($id)
		{
			// Exécute une requête de type SELECT avec une clause WHERE, et retourne un objet Meuble.
		}
		
		public function getList()
		{
			// Retourne la liste de tous les meubles.
		}
		
		public function update(Meuble $meuble)
		{
			// Prépare une requête de type UPDATE.
			// Assignation des valeurs à la requête.
			// Exécution de la requête.
		}
		
		public function setDb(PDO $db)
		{
			$this->_db = $db;
		}
	}
?>
