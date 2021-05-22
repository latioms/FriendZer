<?php
function update_password($password){
	$db = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
		$sess = $_SESSION['pseudo'];
		$query = "UPDATE utilisateurs SET password='$password' WHERE pseudo='$sess'";
		mysqli_query($db, $query);
}

?>