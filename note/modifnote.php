<?php
 require_once("../php/database.php");
$id = $_GET['id'];
 $query= "SELECT *FROM note WHERE Matricule=? ";
 $not=$connexion->prepare($query);
 $not->execute([$id]);
 $modif=$not->fetch();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../ajoutnot.css">
        <title>Modification</title>
        <link rel="icon" type="image/x-icon" href="../image/logo.univ.png">
</head>
<body>
  <div id="logo">
            <a href="../projet.php"><img src="../image/logo.univ.png" class="UAIS" title="UAIS" ></a>
            <p> UNIVERSITE DE <br>L'AMITIE IVOIRO-SENEGALAISE</p>
      </div>
<fieldset class="contactez-nous">
           <legend><h1>MODIFICATION DE NOTES</h1></legend> 
           
            <form action="update_note.php" method="post">
            <input type="hidden" name="id" value="<?php echo($modif['Matricule'])?>">
                <?php
                    if(isset($erreur_message)){
                    echo ("<p>$erreur_message</p>");
                }
                ?>
            <div class="personnel">
                 <label for="matricule">Matricule</label>
                 <input type="text" id="maticule" name="matricule" placeholder="entrez votre matricule" value="<?php echo($modif['Matricule'])?>">
             </div>
            <div class="personnel">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="entrez votre nom"value=" <?php echo($modif['Nom'])?>">
            </div>
            <div class="personnel">
                <label for="nom">Prénom</label>
                <input type="text" id="nom" name="prenom" placeholder="entrez votre prénom"value=" <?php echo($modif['Prénom'])?>">
            </div>
            <div class="niv">
                <label for="niveau">Niveau d'étude</label>
                <select name="niveau" id="niveau" value="<?php echo($modif['Niveau'])?>">
                    <option value="" disabled selected hidden>Choisissez votre niveau d'étude </option>
                    <option value="lience 1">lience 1</option>
                    <option value="Licence 2">Licence 2</option>
                    <option value="licence 3">licence 3</option>
                    <option value="Master 1">Master 1</option>
                    <option value="Master 2">Master 2</option>
                </select>
            </div>
            <div class="fil">
                <label for="filiere">Filières</label>
                <select name="filiere" id="filiere" value="<?php echo($modif['Filière'])?>" >
                    <?php
                    $sql=$connexion->prepare("SELECT * FROM filière");
                    $sql->execute();
                    $formu=$sql->fetchAll();?>
                    <option value="" disabled selected hidden>Choisissez la filière</option>
                    <?php    foreach($formu as $filiere){ ?>
                            <option value="<?php echo($filiere['id_filière'])?>"><?php echo($filiere['Nom_filière'])?></option>
                   <?php }?>>
                </select>
            </div>
            <div class="mat">
                <label for="matiere">Matières</label>
                <input type="text" id="matiere" name="matiere" placeholder="entrez la matière" value="<?php echo($modif['Matière'])?>">
            </div>
            <div class="cred">
                <label for="note">Credits</label>
                <input type="number" id="credit" name="credit" placeholder="entrez le crédit de la matière" >
            </div>
            <div class="not">
                <label for="note">Note</label>
                <input type="number" id="note" name="note" placeholder="entrez la note" value="<?php echo($modif['Note'])?>">
            </div>
           
            <div class="boutt">
            <button type="submit" name="value" value="valider">MODIFIER</button>
            </div>
        </form>
    </fieldset>
</body>
</body>
</html>