<header>
	<h2 class="header-change">Changer ma photo de profil</h2>
</header>

<?php
$infos = infos_membre();
$bdd = new PDO('mysql:host=localhost;dbname=social', 'root', '');


if (isset($_POST['submit'])) {
	if (isset($_FILES['avatar']) and !empty($_FILES['avatar']['name'])) {

		$taillemax = 2097152;
		$extensionsvalides = array('jpg', 'jpeg', 'gif', 'png');
		if ($_FILES['avatar']['size'] <= $taillemax) {

			$extensionUpload = strtolower(substr(strrchr($_FILES['avatar']['name'], '.'), 1));

			if (in_array($extensionUpload, $extensionsvalides)) {
				$chemin = "avatar/" . $_SESSION['social'] . "." . $extensionUpload;

				$resultat = move_uploaded_file($_FILES['avatar']['tmp_name'], $chemin);
				if ($resultat) {


					$updateavatar = $bdd->prepare('UPDATE users SET avatar = :avatar WHERE pseudo = :pseudo');
					$updateavatar->execute(array(
						'avatar' => $_SESSION['social'] . "." . $extensionUpload,
						'pseudo' => $_SESSION['social']
					));
					
				} else {

					$msg = "une erreur s'est produite durant l'importation de votre photo de profil";
				}
			} else {
				$msg = "Votre photo de profil doit être au format soit:jpg, jpeg, gif ou png";
			}
		} else {
			$msg = "Votre photo de profil ne doit pas dépasser 2 mo";
		}
	}

	header('Location:reload');
}


foreach ($infos as $info) {
?>
	<center><img src="avatar/<?= $info->avatar ?>" width="150" alt="avatar"></center><br /><br />

<?php
}

?>
<center>
	<form method="post" action="" enctype="multipart/form-data">
		<input type="file" name="avatar"><br /><br />
		<button type="submit" name="submit">Modifier</button>
	</form>
</center>
