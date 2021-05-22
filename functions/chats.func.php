<?php 

    function user_exist(){
        global $bdd ;

        $e = array('user' => $_GET['user'],'session' =>$_SESSION['social']);
        $sql = "SELECT * FROM users WHERE pseudo = :user AND pseudo != :session " ;
        
        $req = $bdd->prepare($sql);
        $req->execute($e);

        $exist = $req->rowCount();

        return $exist ; 
    }

    function get_user(){
        global $bdd ;

        $req = $bdd->query("SELECT * FROM users WHERE pseudo = '{$_SESSION['user']}' ");

        while($row = $req->fetchObject()){
            $user[] = $row ;
        }

        return $user ;
    }