<?php
	//Création d'une classe Meuble
	
	class Meuble
	{
		//Variables de classe
		protected $_id;
		protected $_type;
		protected $_photo1;
		protected $_photo2;
		protected $_photo3;
		protected $_rentedBy; //L'objet est-il loué et si oui par qui
		
		//Constantes de classe
		const NOT_RENTED = 0;
		
		//Constructeur
		public function __construct(array $donnees)
		{
			$this->hydrate($donnees);
		}
		
		//Getters
		public function id() { return $this->_id; }
		public function type() { return $this->_type; }
		public function photo1() { return $this->_photo1; }
		public function photo2() { return $this->_photo2; }
		public function photo3() { return $this->_photo3; }
		public function rentedBy() { return $this->_rentedBy; }
		
	
		//Fonction d'hydratation
		public function hydrate(array $donnees)
		{		
			foreach ($donnees as $key => $value)
			{
				// On récupère le nom du setter correspondant à l'attribut.
				$method = 'set'.ucfirst($key);
				
				// Si le setter correspondant existe.
				if (method_exists($this, $method))
				{
					// On appelle le setter.
					$this->$method($value);
				}
			}
		}
		
		//Setters
		public function setId($id)
		{
			$this->_id = (int) $id;
		}
		public function setType($type)
		{
			if(is_string($type)) {
				$this->_type = $type;
			}
		}
		public function setPhoto1($photo1)
		{
			if(is_string($photo1)){
				$this->_photo1 =  $photo1;
			}
		}
		public function setPhoto2($photo2)
		{
			if(is_string($photo2)){
				$this->_photo2 =  $photo2;
			}
		}
		public function setPhoto3($photo3)
		{
			if(is_string($photo3)){
				$this->_photo3 =  $photo3;
			}
		}
		public function setRentedBy($rentedBy)
		{
			$this->_rentedBy = (int) $rentedBy;
		}
		
	}
