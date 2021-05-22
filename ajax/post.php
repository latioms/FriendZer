<?php

    include '../functions/main-connexion.php';
    $user = $_SESSION['user'];
    $membre = $_SESSION['social'];
    $message = htmlspecialchars(trim($_POST['message']));

    $i = array(
        'sender' => $membre,
        'receiver' =>$user,
        'message'=>$message
    );

    $sql = "INSERT INTO messages(sender,receiver,msg,date_msg) VALUES(:sender,:receiver,:message,NOW())";
    $req = $bdd->prepare($sql);
    $req->execute($i);