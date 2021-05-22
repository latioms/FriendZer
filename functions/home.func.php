<?php
include_once('membres.func.php');

function publier_post()
{
	$bd = new PDO('mysql:host=localhost;dbname=social', 'root', '');
	$results = array();
	$articles = $bd->query('SELECT * FROM articles INNER JOIN users ON users.pseudo = articles.pseudo_post ORDER BY date_publication DESC');

	while ($row = $articles->fetchObject()) {
		$results[] = $row;
	}
	return $results;
}

function post_profil()
{
	$bd = new PDO('mysql:host=localhost;dbname=social', 'root', '');
	$results = array();

	$res = $bd->query("SELECT avatar FROM articles INNER JOIN users ON users.pseudo = articles.pseudo_post ");


	while ($row = $res->fetchObject()) {
		$results[] = $row;
	}
	return $results;
}
?>
<?php

//la fonction qui recupère les infos de la personne connectée
function infos_membre()
{
	$bd = new PDO('mysql:host=localhost;dbname=social', 'root', '');
	$res = $bd->query("SELECT * FROM users WHERE pseudo = '{$_SESSION['social']}' ");


	while ($row = $res->fetchObject()) {
		$infos[] = $row;
	}
	return $infos;
}

function nombre_membre()
{
	$bd = new PDO('mysql:host=localhost;dbname=social', 'root', '');
	$res = $bd->query("SELECT COUNT(id) AS nbr FROM users");
	$don = $res->fetch();
	$res->closeCursor();

	return $don['nbr'];
}
?>