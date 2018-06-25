<?php

	class Reklamation {
		private $id = 0;
		public $produkt = "";
		public $komponente = "";
		public $reklamateur = null;
		public $datum = null;
		private $connection = null;
		
		public function __construct($id = 0) {
			$this->connection = mysqli_connect('DB_HOST', 'DB_USER', 'DB_PW');
			mysqli_select_db($this->connection, 'DB_NAME');
			
			if($id == 0) {
				$this->id = $this->generate_id();
			} else {
				$this->reklamation_lesen();
			}
		}
		
		public function generate_id() {
			$sql = "SELECT max(id) as maximum FROM reklamationen";
			$result = mysqli_query($this->connection, $sql);
			$row = mysqli_fetch_assoc($result);
			return $row["maximum"]++;
		}
		
		public function reklamation_speichern() {
			$sql = "INSERT INTO reklamationen (id, produkt, komponente, reklamateur_name, reklamateur_anschrift, reklamateur_tel, datum)".
					"VALUES (".$this->id.", ".$this->produkt.", ".$this->komponente.", ".$this->reklamateur->name." , ".$this->reklamateur->anschrift.
					", ".$this->reklamateur->tel_num.", ".$datum.")";
			mysqli_query($this->connection, $sql);
		}
		
		public function reklamation_lesen() {
			$sql = "SELECT * FROM reklamationen WHERE id = ".$this->id;
			$result = mysqli_query($this->connection, $sql);
			$row = mysqli_fetch_assoc($result);
			$this->produkt = $row["produkt"];
			$this->komponente = $row["komponente"];
			$this->reklamateur = new Reklamateur();
			$this->reklamateur->name = row["reklamateur_name"];
			$this->reklamateur->anschrift = row["reklamateur_anschrift"];
			$this->reklamateur->tel_num = row["reklamateur_tel"];
			$this->datum = row["datum"];
		}
	}
	
	class Reklamateur {
		public $name = "";
		public $anschrift = "";
		public $tel_num = "";
		
		public function __construct($name, $anschrift, $tel_num) {
			$this->name = $name;
			$this->anschrift = $anschrift;
			$this->tel_num = $tel_num;
		}
	}
?>