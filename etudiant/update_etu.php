<?php
require_once("../php/database.php");
$matricule=htmlspecialchars($_POST['matricule']);
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$niveau=htmlspecialchars($_POST['niveau']);
$email=htmlspecialchars($_POST['email']);
$number=htmlspecialchars($_POST['number']);
$sexe=htmlspecialchars($_POST['sexe']);
$message=htmlspecialchars($_POST['message']);
$sql="UPDATE inscription SET Matricule=?,Nom=?,Prénom=?,Niveau=?,Mail=?,Contact=?,Genre=?,Message=? WHERE Matricule=?";
            $insertion=$connexion->prepare($sql);
            $insertion->execute([$matricule,$nom,$prenom, $niveau,$email,$number,$sexe,$message,$matricule]);
      header("Location:affichetu.php");
?> 