<?php
	function email_existe($email){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
     		$res = $bd->query("SELECT COUNT(id_pseudo) AS nbr FROM utilisateurs WHERE email='$email'");
     		$don = $res->fetch();
     		$res->closeCursor();

     		return $don['nbr'];
    }

    function update_email($email){
    	$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$sess = $_SESSION['pseudo'];
		$query = "UPDATE utilisateurs SET email='$email' WHERE pseudo='$sess'";
		mysqli_query($db, $query);
    }
?>