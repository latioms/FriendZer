<?php
	function enregistrer_la_publication($article_titre,$article_contenu){
		$bd = new PDO('mysql:host=localhost;dbname=social', 'root', '');
		$ins = $bd->prepare('INSERT INTO articles (titre,contenu,date_publication) VALUES (?, ?, NOW())');
		$ins->execute(array($article_titre, $article_contenu));
	}
?>