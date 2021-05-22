<?php
if (isLogged() == 1) {
    header("Location:index.php?page=membres");
}
$bdd = new PDO('mysql:host=localhost;dbname=social', 'root', '');
?>

<head>
    <title>Connexion</title>
</head>

<?php

if (isset($_POST['submit'])) {
    $pseudo = htmlspecialchars(trim($_POST['pseudo']));
    $mdp = sha1(htmlspecialchars(trim($_POST['mdp'])));

    if (user_exist($pseudo, $mdp) == 1) {
        $_SESSION['social'] = $pseudo;
        header("Location:index.php?page=home");
    } else {
        $error_user_not_found = "Identifiants incorrects";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./styles/loginStyle.css">
    <title>Login</title>
</head>

<body>
    <section>
        <div class="box">
            <div class="form">
                <h2>Connexion</h2>
                <span class="error"><?php echo (isset($error_user_not_found)) ? $error_user_not_found : ''; ?></span>
                <form method="POST">
                    <div class="inputBox">
                        <input type="text" placeholder="username" name="pseudo">
                        <img src="./assets/user.svg" width="25px">
                    </div>
                    <div class="inputBox">
                        <input type="password" placeholder="password" name="mdp">
                        <img src="./assets/lock.svg" aria-placeholder="password" width="25px">
                    </div>
                    <label class="remember"><input type="checkbox">Se souvenir</label>
                    <div class="inputBox">
                        <input type="submit" name="submit" value="Login">
                    </div>
                </form>
                <p><a href="index.php?page=register">
                        <div class="name"> <span data-text="S'incrire">S'incrire</span></div>
                    </a></p>
            </div>
        </div>
    </section>
</body>

</html>