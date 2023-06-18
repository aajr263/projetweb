
<?php
 require_once("../php/database.php");
$id = $_GET['id'];
 $query= "SELECT *FROM inscription WHERE Matricule=? ";
 $etudiant=$connexion->prepare($query);
 $etudiant->execute([$id]);
 $modif=$etudiant->fetch();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../modif.css">
        <title>Modification</title>
        <link rel="icon" type="image/x-icon" href="../image/logo.univ.png">
</head>
<body>
<fieldset class="contactez-nous">
           <legend><h1>MODIFICATION</h1></legend> 
           
            <form action="update_etu.php" method="post">
                <input type="hidden" name="id" value="<?php echo($modif['Matricule'])?>">
                <?php
                    if(isset($erreur_message)){
                    echo ("<p>$erreur_message</p>");
                }
                ?>
            <div>
                 <label for="matricule">Matricule</label>
                 <input type="text" id="maticule" name="matricule" placeholder="entrez votre nom" value="<?php echo($modif['Matricule'])?>">
             </div>
            <div>
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="entrez votre nom"value="<?php echo($modif['Nom'])?>">
             </div>
            </div>
            <div>
                <label for="nom">Prénom</label>
                <input type="text" id="prenom" name="prenom" placeholder="entrez votre prénom" value="<?php echo($modif['Prénom'])?>">
             </div>
            </div>
            <div>
                <label for="niveau">Niveau d'étude</label>
                <select name="niveau" id="niveau" value="<?php echo($modif['Niveau'])?>">
             </div>
                    <option value="" disabled selected hidden>Choisissez votre niveau d'étude </option>
                    <option value="Licence 1">lience 1</option>
                    <option value="Licence 2">Licence 2</option>
                    <option value="Licence 3">licence 3</option>
                    <option value="Master 1">Master 1</option>
                    <option value="Master 2">Master 2</option>
                </select>
            </div>
            <div>
                <label for="filiere">Filières</label>
                <select name="filiere" id="filiere" >
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
            <div>
                <label for="email">e-mail</label>
                <input type="email" id="email" name="email" placeholder="monadresse@mail.com"value="<?php echo($modif['Mail'])?>">
             </div>
            </div>
            <div>
                <label for="number">Contact</label>
                <input type="tel" id="number" name="number" placeholder="entrez votre contact"value="<?php echo($modif['Contact'])?>">
             </div>
            </div>
            <section>
                <label for="rnom">GENRE</label><br>
                <input type="radio" name="sexe" id="fem" value="F"><label for="fem">Femme</label>
                <input type="radio" name="sexe" id="mas" value="M"><label for="mas">Homme</label>
            </section>
            <div>
                <label for="message">Votre message</label>
                <textarea id="message" name="message" placeholder="Bonjour, pour toutes vos préoccupation veillez laisser un message" ></textarea>
            </div>
            <div class="boutt">
            <button type="submit" name="value" value="valider"> VALIDER</button>
            </div>
        </form>
    </fieldset>
</body>
</html>