<?php 

// ouverture d'une connexion  a la base de social

$objetpdo = new PDO('mysql:host=localhost;dbname=social','root','');

$avSexe = $_POST['sexe'] ;
// preparons la requette d'inertion(sql)
if(isset($avSexe)){
    $avatar = $avSexe .'.png';
}

$pdostat =$objetpdo->prepare("INSERT INTO users VALUE(NULL, :prenom, :nom, :email, :pseudo, :mdp, :sexe, '$avatar')");

// lier chaque marqueur a une valeur

$pdostat->bindValue(':prenom',htmlspecialchars(trim($_POST['prenom'])), PDO::PARAM_STR );
$pdostat->bindValue(':nom',htmlspecialchars(trim($_POST['nom'])), PDO::PARAM_STR );
$pdostat->bindValue(':email',htmlspecialchars(trim($_POST['email'])), PDO::PARAM_STR );
$pdostat->bindValue(':pseudo',htmlspecialchars(trim($_POST['pseudo'])), PDO::PARAM_STR );
$pdostat->bindValue(':mdp',sha1($_POST['mdp']), PDO::PARAM_STR );
$pdostat->bindValue(':sexe',$_POST['sexe'], PDO::PARAM_STR );

// execution de la requete preparee

$insertIsOk = $pdostat->execute();

if($insertIsOk){
    $message = 'utilisateur enregistré avec succes';
}else{
    $message = "echec de l'enregistrement";
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>insertion d'utilisateur</h1>
    <p><?php 
    die("Enregistrement termine !");
    ?><br><?php
    echo $message; 
    echo '<h3>Veuillez vous </h3>'
    ?> <a href="index.php?page=login">connecter</a></p>
</body>
</html>