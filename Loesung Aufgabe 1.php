<?php

	function suche_komponenten($produkt) {
		$connection = mysqli_connect('DB_HOST', 'DB_USER', 'DB_PW');
		mysqli_select_db($connection, 'DB_NAME');
		
		$sql = "SELECT * FROM komponenten WHERE produkt = '".$produkt."'";
		$result = mysqli_query($connection, $sql);
		$komponenten = array();
		
		while($komponente = mysqli_fetch_assoc($result)) {
			$komponenten[] = $komponente;
		}
		
		return $komponenten;
	}

?>