<?php
//la fonction qui va nous afficher l'info bulle des invitations

	function afficher_infobulle(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
		$pseudo_exp = $_SESSION['pseudo'];
		
     		$res = $bd->query("SELECT COUNT(id_invitation) AS nbr FROM amis WHERE pseudo_dest='$pseudo_exp' AND date_invitation= date_confirmation OR pseudo_exp='$pseudo_exp' AND date_confirmation > date_vue");
     		$don = $res->fetch();
     		$res->closeCursor();

     		return $don['nbr'];
	}

	function afficher_info(){
		$bd = new PDO('mysql:host=localhost;dbname=rs', 'root', '');
		$pseudo_exp = $_SESSION['pseudo'];
		
     		$res = $bd->query("SELECT COUNT(id_invitation) AS nbr FROM amis WHERE pseudo_dest='$pseudo_exp' AND date_invitation= date_confirmation OR pseudo_exp='$pseudo_exp' AND date_confirmation > date_vue");
     		$don = $res->fetch();
     		$res->closeCursor();

     		return $don['nbr'];
	}

//la function qui va nous permettre de mettre a jour la date_vue dans la bdd pour pourvoir caché l'info-bulle

	function update_date_vue(){
		global $bdd ;
		$pseudo_exp = $_SESSION['pseudo'];
		
		$query = "UPDATE amis SET date_vue=NOW() WHERE pseudo_exp='$pseudo_exp' AND active = 1";
		$bdd->$query;
	}
?>