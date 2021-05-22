 <?php
    // session_start();
    // $bdd = new PDO("mysql:host=localhost;dbname=usernet;charset=utf8","root");

    // if (isset($_SESSION['id'])) {
    //     header("Location: .index.php");
    //     exit;
    // }
    // if(!empty($_POST)){
    //     extract($_POST);

      //   if (isset($_POST['register'])) {
      //       $nom = htmlentities(trim($_POST['nom']));
      //       $prenom = htmlentities(trim($_POST['prenom']));
      //       $email = htmlentities(strtolower(trim($_POST['email'])));
      //       $pseudo = htmlspecialchars(trim($_POST['pseudo']));
      //       $sexe = trim(($_POST['sexe']));
      //       $mdp = trim($_POST['mdp']);
      //       $confmdp = trim($_POST['confmdp']);
      //   }

      //   if ($mdp != $confmdp) {
      //     $errors[] = "Les mots de passes ne correspondent pas !";
      //   }
      //   if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
      //     $errors[] = "Votre adresse email n'est pas correcte";
      //   }
        
      //   if (pseudo_existe($pseudo) == 1) {
      //     $errors[] = "Ce pseudo n'est pas disponible";
      //   }
      //   if (email_existe($email) == 1) {
      //     $errors[] = "Cette email existe déja";
      //   }

      //   if (empty($sexe)){
      //     $errors[] = "Veuillez choisir un sexe !";  
      //   }

      //   if(!empty($errors)) {
      //       foreach ($errors as $error) {
      //         alert("<div class='error'>".$error."</div>");
      //       }
      //     }else{
      //       register($pseudo, $mdp, $email, $sexe, $prenom, $nom);
      //       die('incription terminée, vous pouvez vous  <a href=\'index.php?page=login\'>connecter</a>');
      //     }

      // }
    
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./styles/registerStyle.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div id="reg" class="container">
    <div class="title">Inscription</div>
    <div class="content">
      <form action="./functions/insertion.php" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Prenom</span>
            <input type="text" placeholder="Entrez votre prenom" name="prenom" value="<?php if(isset($prenom)){echo $prenom;}?>" required>
          </div>
          <div class="input-box">
            <span class="details">Nom</span>
            <input type="text" placeholder="Entrez votre nom" name="nom" value="<?php if(isset($nom)){echo $nom ;}?>" required>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Entrez votre adresse e-mail" name="email" value="<?php if(isset($mail)){echo $mail ;}?>" required>
          </div>
          <div class="input-box">
            <span class="details">pseudo</span>
            <input type="text" placeholder="Entrez votre pseudo" name="pseudo" value="<?php if(isset($pseudo)){echo $pseudo ;}?>" required>
          </div>
          <div class="input-box">
            <span class="details">Mot de Passe</span>
            <input type="password" placeholder="Entrez votre mot de passe" name="mdp" value="<?php if(isset($mdp)){echo $mdp ;}?>" required>
          </div>
          <div class="input-box">
            <span class="details">Confirmer votre mot de passe</span>
            <input type="password" placeholder="Ressaisir mot de passe" name="confmdp" value="<?php if(isset($confmdp)){echo $confmdp ;}?>" required>
          </div>
  
        </div>
        <div class="gender-details">
          <input type="radio" name="sexe" id="dot-1" value="M">
          <input type="radio" name="sexe" id="dot-2" value="F">
          <span class="gender-title">Sexe</span>
          <div class="category">
            <label for="dot-1">
            <span class="dot one"></span>
            <span class="gender">Masculin</span>
          </label>
          <label for="dot-2">
            <span class="dot two"></span>
            <span class="gender">Feminin</span>
          </label>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="register" value="register">
        </div>
      </form>
    </div>
  </div>
</body>
</html>
