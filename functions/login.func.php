<?php

    function user_exist($pseudo,$mdp){
        global $bdd;
        $u = array(
            'pseudo'=>$pseudo,
            'mdp'=>($mdp)
        );
        $sql = "SELECT * FROM users WHERE pseudo=:pseudo AND mdp=:mdp  ";
        $req = $bdd->prepare($sql);
        $req->execute($u);
        $exist = $req->rowCount();
        return $exist;

    }
