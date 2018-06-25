<?php

	if(isset($_POST["name"]) and isset($_POST["anschrift"]) and isset($_POST["tel"]) and isset($_POST["component"])) {
		$rekla = new Reklamation();
		$rekla->reklamateur = new Reklamateur($_POST["name"], $_POST["anschrift"], $_POST["tel"]);
		$rekla->komponente = $_POST["component"];
		$rekla->datum = date("Y.m.d H:i:s", time());
		$rekla->reklamation_speichern();
	}

?>

<html>

	<head>
		<title>Reklamation ausf&uuml;llen</title>
	</head>
	
	<body>
		<h1>Reklamation ausf&uuml;llen</h1>
		<form action="component_search.php" method="post">
			<p>Besch&auml;digte Komponente ausw&auml;hlen</p>
			<select name="component">
				<?php
					foreach(suche_komponenten($_POST["product"]) as $komponente) {
						echo "<option>".$komponente."</option>";
					}
				?>
			</select><br/>
			Name: <input type="text" name="name" /><br/>
			Anschrift: <input type="text" name="anschrift" /><br/>
			Rel.Nr.: <input type="text" name="tel" /><br/>
			<input type="submit" value="Absenden" />
		</form>
	</body>

</html>