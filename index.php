<?php
include 'functions/main-connexion.php';

$pages = scandir('pages/');

if (isset($_GET['page']) && !empty($_GET['page']) && in_array($_GET['page'] . '.php', $pages)) {
    $page = $_GET['page'];
} else {
    $page = 'home';
}

$pages_functions = scandir('functions/');

if (in_array($page . '.func.php', $pages_functions)) {
    include 'functions/' . $page . '.func.php';
}

$bdd = new PDO('mysql:host=localhost;dbname=social', 'root', '');


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?php if ($page != 'login' &&  $page != 'register') {
            echo 'FriendZer';
        }
        ?>
    </title>
    <link rel="icon" href="icon.png" sizes="20*20" type="image/png">
        <?php 
            if($page != 'chats'){
            ?><link rel="stylesheet" href="./styles/style.css"><?php
            }
        ?>
</head>

<body>
    <header>
        <?php
        if ($page != "login" && $page != 'register') {
            include 'body/topbar.php';
           
        }
        if($page == 'chats'){
        ?>
             <script src="js/chats.func.js"></script> <?php
        }  
        ?>
    </header>
    
<!-- **************************************** Contenu ************************************************** -->
    <div class="content">
        <?php
        include 'pages/' . $page . '.php';
        ?>
    </div>
    <div class="pied">
    <?php
     include 'body/footer.php';
    ?>
    </div>
</body>

</html>