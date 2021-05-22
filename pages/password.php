<?php

$bdd = new PDO('mysql:host=localhost;dbname=social', 'root','');
if(isset($_POST['submite'])){

    $encPass = sha1($_POST['Apwd']);
    $modif = $bdd->query("SELECT mdp FROM users WHERE pseudo = '{$_SESSION['social']}' AND mdp = '$encPass' ");
    $exist = $modif->rowCount();

    if($exist && $_POST['Npwd'] == $_POST['Cnpwd']){

        update_password(sha1($_POST['Npwd']));
        echo'Enregistrement effectué avec succes!!!';

    }elseif($_POST['Npwd'] != $_POST['Cnpwd']){
        echo'confirmer bien votre nouveau mot de pass je vous prie';
    }else{
        echo'entrer un mot de passe correct';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="pswdform">
        <center>
            <form  method="post" name="pwd" id=="pwd">
                <label for="Apwd"> Ancien mot de passe:</label>
                <br/><input type="password" name="Apwd" id="">
                <br/><br/>
                <label for="Npwd">Nouveau mot de passe:</label>
                <br/>
                <input type="password" name="Npwd" id="">
                <br/><br/>
                <input type="password" name="Cnpwd" id="" placeholder="confirmer le mot de passe">
                <br/><br/>
                <button name="submite">modifier</button>
            </form>
        </center>
    </div>
</body>
</html>