<?php
function update_password($password){
	global $bdd;
		$sess = $_SESSION['social'];
		$bdd->query("UPDATE users SET mdp = '$password' WHERE pseudo='$sess' ");
}

?>