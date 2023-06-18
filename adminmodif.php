<?php
 require_once("./php/database.php");
$id = $_GET['id'];
 $query= "SELECT *FROM administrateur WHERE mail=? ";
 $admin=$connexion->prepare($query);
 $admin->execute([$id]);
 $modif=$admin->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="ajoutadmin.css">
        <title>Document</title>
</head>
<body>
    <div id="logo">
            <a href="projet.php"><img src="image/logo.univ.png" class="UAIS" title="UAIS" ></a>
            <p> UNIVERSITE DE <br>L'AMITIE IVOIRO-SENEGALAISE</p>
      </div>
      <div>MODIFICATION</div>
<fieldset class="contactez-nous">
           <legend><h1>ADMINISTRATEUR</h1></legend> 
           
            <form action="update_admin.php" method="post">
            <input type="hidden" name="id" value="<?php echo($modif['mail'])?>"> 
                <?php
                    if(isset($erreur_message)){
                    echo ("<p>$erreur_message</p>");
                }
                ?>
            
            <div class="personnel">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="entrez votre nom"value="<?php echo($modif['Nom'])?>">
            </div>
            <div class="personnel">
                <label for="nom">Prénom</label>
                <input type="text" id="nom" name="prenom" placeholder="entrez votre prénom" value="<?php echo($modif['Prénom'])?>">
            </div> 
           
            <div class="mat">
                <label for="matiere">Email</label>
                <input type="" id="email" name="email" placeholder="entrez votre email"value="<?php echo($modif['mail'])?>">
            </div>
            <div class="not">
                <label for="note">Mot de pass</label>
                <input type="password" id="passwor" name="motpass" placeholder="entrez votre mot de pass"value="<?php echo($modif['Motdepass'])?>">
            </div>
           
            <div class="boutt">
            <button type="submit" name="value" value="valider"> AJOUTER</button>
            </div>
        </form>
    </fieldset>

</body>
</html>