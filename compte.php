<?php
session_start();
require("../projet/php/database.php");

?>
<?php
if(isset($_POST['valide'])){
    if(!empty($_POST['username'])&&
           !empty($_POST['password'])
        ){

            $username=htmlspecialchars($_POST['username']);
            $password=htmlspecialchars($_POST['password']);
            $sql ='SELECT * FROM inscription where Matricule=? AND Nom=?';
            $select = $connexion->prepare($sql);
            $select->execute([$password,$username]);
            $etudiant=$select->fetch();
            if($select->rowCount()>0){
                $_SESSION["inscription"]=$etudiant;
                header("location:../projet/espace.php");
            }
            else{
                $password=sha1($_POST['password']);
                $sql2 ='SELECT * FROM administrateur where Motdepass=? AND Nom=?';
                $admin = $connexion->prepare($sql2);
                $admin->execute([$password,$username]);
                $user=$admin->fetch();
                if($admin->rowCount()>0){
                    $_SESSION["administrateur"]=$user;
                    header("location:tableau.php");
            }else{
                $erreur_message='vos informations sont incorrectes';
            }
            

        }
     } else {
           
            $erreur_message="veuillez remplir tous les champs";
        }


}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="compte.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">
    <title>Compte UAIS </title>
    <link rel="icon" type="image/x-icon" href="image/logo.univ.png">
<body>
<?php
     require("../projet/header.php");
    ?>
    <section>
        <div id="container">
            <form action="" method="post">
                <?php if (isset($erreur_message)){
                    echo("<p>$erreur_message</p>");
                }
                ?>
                <h1>COMPTE</h1>
                
                <label><b>Nom</b></label>
                <input type="text" placeholder="Entrez votre nom" name="username" required>
            
                <label><b>Mot de passe </b></label>
                <input type="password" placeholder="Entrez votre mot de passe" name="password" required>
            
                <input type="submit" id='submit' name='valide' value='CONNEXION' >
            </form>
        </div>
    </section>
    <?php
     require("../projet/footer.php");
    ?>
</body>
</html>