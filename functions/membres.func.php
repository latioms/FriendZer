<?php
//la fonction qui va récupérer l'avatar et les membres du site

function recuperer_avatar_list_membre(){
	$bd = new PDO('mysql:host=localhost;dbname=social', 'root', '');
	$results = array();
	$pseudo = $_SESSION['social'];
	  $res = $bd->query("SELECT pseudo,email,avatar FROM users WHERE pseudo != '$pseudo'");
	

	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
}

?>