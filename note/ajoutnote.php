<?php
    require_once("../php/database.php"); 
    if(isset($_POST['value'])){
        if(!empty($_POST['matricule'])&&
           !empty($_POST['nom'])&&
           !empty($_POST['prenom'])&&
           !empty($_POST['niveau'])&&
           !empty($_POST['filiere'])&&
           !empty($_POST['credit'])&&
           !empty($_POST['note'])&&
           !empty($_POST['matiere'])
          
        ){
            $matricule=htmlspecialchars($_POST['matricule']);
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $niveau=htmlspecialchars($_POST['niveau']);
            $filiere=htmlspecialchars($_POST['filiere']);
            $matiere=htmlspecialchars($_POST['matiere']);
            $credit=htmlspecialchars($_POST['credit']);
            $not=htmlspecialchars($_POST['note']);
            
            $requete="INSERT INTO note VALUES(?,?,?,?,?,?,?,?,?)";
            $insertion=$connexion->prepare($requete);
            $insertion->execute([ NULL,$matricule,$nom,$prenom,$niveau,$filiere,$matiere,$credit,$not ]);
            header("Location:affichnote.php");
           
        }
        else{
            echo('Veuillez remplir les champs');
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
        <link rel="stylesheet" href="../ajoutnot.css">
        <title>ajout notes</title>
        <link rel="icon" type="image/x-icon" href="../image/logo.univ.png">
</head>
<body>
  <div id="logo">
            <a href="../projet.php"><img src="../image/logo.univ.png" class="UAIS" title="UAIS" ></a>
            <p> UNIVERSITE DE <br>L'AMITIE IVOIRO-SENEGALAISE</p>
      </div>
<fieldset class="contactez-nous">
           <legend><h1>AJOUT DE NOTES</h1></legend> 
           
            <form action="" method="post">
                <?php
                    if(isset($erreur_message)){
                    echo ("<p>$erreur_message</p>");
                }
                ?>
            <div class="personnel">
                 <label for="matricule">Matricule</label>
                 <input type="text" id="maticule" name="matricule" placeholder="entrez votre matricule" >
             </div>
            <div class="personnel">
                <label for="nom">Nom</label>
                <input type="text" id="nom" name="nom" placeholder="entrez votre nom" >
            </div>
            <div class="personnel">
                <label for="nom">Prénom</label>
                <input type="text" id="nom" name="prenom" placeholder="entrez votre prénom" >
            </div>
            <div class="niv">
                <label for="niveau">Niveau d'étude</label>
                <select name="niveau" id="niveau" >
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
            <div class="mat">
                <label for="matiere">Matières</label>
                <input type="text" id="matiere" name="matiere" placeholder="entrez la matière" >
            </div>
            <div class="cred">
                <label for="note">Crédits</label>
                <input type="number" id="credit" name="credit" placeholder="entrez le crédit de la matière" >
            </div>
            <div class="not">
                <label for="note">Note</label>
                <input type="number" id="note" name="note" placeholder="entrez la note" >
            </div>
           
            <div class="boutt">
            <button type="submit" name="value" value="valider"> AJOUTER</button>
            </div>
        </form>
    </fieldset>
</body>
</body>
</html>