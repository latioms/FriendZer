<?php

    function email_taken($email){
        global $bdd;
        $e = array('email' => $email);
        $sql = 'SELECT * FROM users WHERE email = :email';
        $req = $bdd->prepare($sql);
        $req->execute($e);
        $free = $req->rowCount($sql);

        return $free;
    }

    function register($nom, $prenom, $email, $pseudo, $mdp, $sexe){
        global $bdd;
        $r = array(
            'nom'=>$nom,
            'prenom'=>$prenom,
            'email'=>$email,
            'pseudo'=>$pseudo,
            'mdp'=>$mdp,
            '$sexe'=>$sexe
        );
        $sql = "INSERT INTO users(prenom, nom, email,pseudo,mdp,sexe) VALUES(:prenom, :nom, :email, :pseudo, :mdp, :sexe)";
        $req = $bdd->prepare($sql);
        $req->execute($r);
    }