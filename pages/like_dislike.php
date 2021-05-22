<?php

$bd = new PDO('mysql:host=localhost;dbname=social', 'root', '');
if (isset($_GET['type'],$_GET['id_arts']) AND !empty($_GET['id_arts'])) {
	$getid = (int) $_GET['id_arts'];
	$gettype = (int) $_GET['type'];

	$pseudo_membre = $_SESSION['social'];
  

	$check = $bd->prepare('SELECT id_arts FROM articles WHERE id_arts = ?');
	$check->execute(array($getid));

	if ($check->rowCount() == 1) {
		if ($gettype == 1) {
			$check_like = $bd->prepare('SELECT id FROM likes WHERE id_publication = ? AND pseudo_membre = ?');
			$check_like->execute(array($getid, $pseudo_membre));


				$supp_dislike = $bd->prepare('DELETE FROM dislikes WHERE id_publication = ? AND pseudo_membre = ?');
				$supp_dislike->execute(array($getid, $pseudo_membre));



			if ($check_like->rowCount() == 1) {
				$supp_like = $bd->prepare('DELETE FROM likes WHERE id_publication = ? AND pseudo_membre = ?');
				$supp_like->execute(array($getid, $pseudo_membre));
			}else{
				$ins = $bd->prepare('INSERT INTO likes (id_publication, pseudo_membre) VALUES (?, ?)');
			$ins->execute(array($getid, $pseudo_membre));
			}

			
		}elseif ($gettype == 2) {
				$check_like = $bd->prepare('SELECT id FROM dislikes WHERE id_publication = ? AND pseudo_membre = ?');
				$check_like->execute(array($getid, $pseudo_membre));

				$supp_like = $bd->prepare('DELETE FROM likes WHERE id_publication = ? AND pseudo_membre = ?');
				$supp_like->execute(array($getid, $pseudo_membre));

			if ($check_like->rowCount() == 1) {
				$supp_dislike = $bd->prepare('DELETE FROM dislikes WHERE id_publication = ? AND pseudo_membre = ?');
				$supp_dislike->execute(array($getid, $pseudo_membre));
			}else{
				$ins = $bd->prepare('INSERT INTO dislikes (id_publication, pseudo_membre) VALUES (?, ?)');
				$ins->execute(array($getid, $pseudo_membre));
			}

			
	}
	header("location: index.php?page=home");
	}else{
		exit('erreur fatale');
	}
}else{
	exit('erreur fatale 2');
}

?>