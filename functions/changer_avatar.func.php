<?php

//la fonction qui va changer l'image de profil

function modifier_image_profil($avatar_tmp, $avatar)
{
	global $bdd;

	move_uploaded_file($avatar_tmp, 'avatar/' . $avatar);
	$fil = $_FILES['avatar']['name'];

	$query = "UPDATE users SET avatar ='$fil' WHERE pseudo='{$_SESSION['social']}' ";
	$bdd->$query;
}

//la fonction qui recupère les infos de la personne connecter
function infos_membre()
{
	$bd = new PDO('mysql:host=localhost;dbname=social', 'root', '');
	$infos = array();
	$pseudo = $_SESSION['social'];
	$res = $bd->query("SELECT * FROM users WHERE pseudo = '$pseudo' ");


	while ($row = $res->fetchObject()) {
		$infos[] = $row;
	}
	return $infos;
}
