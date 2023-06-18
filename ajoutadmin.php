<?php
    require_once("./php/database.php"); 
    if(isset($_POST['value'])){
        if(!empty($_POST['email'])&&
           !empty($_POST['nom'])&&
           !empty($_POST['prenom'])&&
           !empty($_POST['motpass'])
          
        ){
            $email=htmlspecialchars($_POST['email']);
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $password=sha1($_POST['motpass']);
           
            $requete="INSERT INTO administrateur VALUES(?,?,?,?)";
            $insertion=$connexion->prepare($requete);
            $insertion->execute([$email,$nom,$prenom,$password ]);
            header("Location:affichadmin.php");
           
        }
        else{
            echo('Veuillez remplir les champs');
            $erreur_message="veuillez remplir tous les champs";
        }
    }
?>
?>
<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="ajoutadmin.css">
        <title>administrateur</title>
        <link rel="icon" type="image/x-icon" href="image/logo.univ.png">
</head>
<body>
<div id="logo">
            <a href="projet.php"><img src="image/logo.univ.png" class="UAIS" title="UAIS" ></a>
            <p> UNIVERSITE DE <br>L'AMITIE IVOIRO-SENEGALAISE</p>
      </div>
<fieldset class="contactez-nous">
           <legend><h1>ADMINISTRATEUR</h1></legend> 
           
            <form action="" method="post">
                <?php
                    if(isset($erreur_message)){
                    echo ("<p>$erreur_message</p>");
                }
                ?>
            
            <div class="personnel">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="entrez votre nom" >
            </div>
            <div class="personnel">
                <label for="nom">Prénom</label>
                <input type="text" id="nom" name="prenom" placeholder="entrez votre prénom" >
            </div> 
           
            <div class="mat">
                <label for="matiere">Email</label>
                <input type="text" id="email" name="email" placeholder="monadresse@mail.com" >
            </div>
            <div class="not">
                <label for="note">Mot de pass</label>
                <input type="password" id="passwor" name="motpass" placeholder="entrez votre mot de pass" >
            </div>
           
            <div class="boutt">
            <button type="submit" name="value" value="valider"> AJOUTER</button>
            </div>
        </form>
    </fieldset>

</body>
</html>