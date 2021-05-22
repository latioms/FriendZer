<?php
	//la fonction qui va changer l'image de profil

	function modifier_image_profil($avatar_tmp,$avatar){

		move_uploaded_file($avatar_tmp, 'avatar/'.$avatar);

		$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$fil = $_FILES['avatar']['name'];
		$sess = $_SESSION['pseudo'];
		$query = "UPDATE utilisateurs SET avatar ='$fil' WHERE pseudo='$sess'";
		mysqli_query($db, $query);
	}

?>