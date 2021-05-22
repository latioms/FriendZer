
<?php

global $bdd ;

if(isset($_POST['subPseudo'])){

    $modif = $bdd->query(" SELECT pseudo FROM users WHERE pseudo = '{$_SESSION['social']}' AND pseudo = '{$_POST['o_pseudo']}' ");
    
    $exist = $modif->rowCount();

    if(empty($_POST['o_pseudo']) || empty($_POST['n_pseudo'])){
        echo 'remplis tous les champs please';
    }elseif($exist){

        $bdd->query("UPDATE users SET pseudo = '{$_POST['n_pseudo']}' WHERE pseudo ='{$_SESSION['social']}' ");
       /* header("Location:index.php?page = home");
        $_SESSION['social'] = ($_SESSION['social'])->pseudo ;*/
    }else{
        echo 'erreur!! vérifiez please...';
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
    <div class="pseudoForm">
        <center>
            <form method="post" id="psdo">
                <label for="o_pseudo">Ancien pseudo</label>
                <br/>
                <input type="text" name="o_pseudo" placeholder="Entrez le ici">
                <br/><br/>
                <label for="n_pseudo">Nouveau pseudo</label>
                <br/>
                <input type="text" name="n_pseudo" placeholder="Entrez le ici">
                <br/><br/>
                <button name="subPseudo">Modifier</button>
            </form>
        </center>
    </div>
</body>
</html>