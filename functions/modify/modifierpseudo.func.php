<?php
	//la function qui verifie si l'utilisateur existe
	function pseudo_existe($pseudo){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
     		$res = $bd->query("SELECT COUNT(id) AS nbr FROM utilisateurs WHERE pseudo='$pseudo'");
     		$don = $res->fetch();
     		$res->closeCursor();

     		return $don['nbr'];

	}

	function update_pseudo($pseudo){
		
		$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$sess = $_SESSION['pseudo'];
		$query = "UPDATE utilisateurs SET pseudo='$pseudo' WHERE pseudo='$sess'";
		mysqli_query($db, $query);
	}
	
?>