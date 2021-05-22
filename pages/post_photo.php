<?php
$mode_edition = 0;
if (isset($_GET['edit']) and !empty($_GET['edit'])) {
	$mode_edition = 1;
	$bd = new PDO('mysql:host=localhost;dbname=social', 'root', '');
	$edit_id = htmlspecialchars($_GET['edit']);
	$edit_article = $bd->prepare('SELECT * FROM articles WHERE id = ?');
	$edit_article->execute(array($edit_id));

	if ($edit_article->rowCount() == 1) {
		$edit_article = $edit_article->fetch();
	} else {
		die('erreur : l\'article concerné n\'existe pas');
	}
}

if (isset($_POST['article_titre'], $_POST['article_contenu'])) {
	if (!empty($_POST['article_titre']) and !empty($_POST['article_contenu'])) {
		$article_titre = htmlspecialchars($_POST['article_titre']);
		$article_contenu = htmlspecialchars($_POST['article_contenu']);
		if ($mode_edition == 0) {


			$bd = new PDO('mysql:host=localhost;dbname=social', 'root', '');

			$ins = $bd->prepare('INSERT INTO articles (titre,contenu,date_publication,pseudo_post) VALUES (?, ?, NOW(), ?)');
			$ins->execute(array($article_titre, $article_contenu, $_SESSION['social']));
			$lastid = $bd->lastInsertId();

			if (isset($_FILES['miniature']) and !empty($_FILES['miniature']['name'])) {
				if (exif_imagetype($_FILES['miniature']['tmp_name']) == 2) {
					$chemin = 'miniature/' . $lastid . '.jpg';
					move_uploaded_file($_FILES['miniature']['tmp_name'], $chemin);
				} else {
					$message = "votre image doit être au format jpg";
				}
			}

			header("location: index.php?page=home");
		} else {
			$update = $bd->prepare('UPDATE articles SET titre = ?, contenu = ?, date_edition = NOW() WHERE id = ?');
			$update->execute(array($article_titre, $article_contenu, $edit_id));
			header("location: index.php?page=home");
		}
	} else {
		$message = "Veuillez remplir tous les champs";
	}
}



?>
<h2 class="header header-form">Publication</h2> <br />
<!DOCTYPE html>
<html>

<head>
	<title></title>
</head>

<body>
	<form method="post" enctype="multipart/form-data">
		<input type="text" name="article_titre" placeholder="titre" <?php if ($mode_edition == 1) { ?>value="<?= $edit_article['titre'] ?>" <?php } ?>><br />
		<textarea placeholder="écrire une légende" name="article_contenu"><?php if ($mode_edition == 1) { ?><?= $edit_article['contenu'] ?> <?php } ?></textarea><br />
		<?php if ($mode_edition == 0) {
		?>
			<input type="file" name="miniature">
		<?php
		} ?>
		<input type="submit" name="envoyer la publication">
	</form>
	<br /><br />
	<?php if (isset($message)) {
		echo $message;
	}
	?>