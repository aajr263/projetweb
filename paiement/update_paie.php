<?php
require_once("../php/database.php");
$number=htmlspecialchars($_POST['number']);
$number1=htmlspecialchars($_POST['number1']);
$number2=htmlspecialchars($_POST['number2']);
$date=htmlspecialchars($_POST['date']);
$matricule=htmlspecialchars($_POST['matricule']);
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$email=htmlspecialchars($_POST['email']);
$contact=htmlspecialchars($_POST['contact']);

$sql="UPDATE paiement SET Matricule=?,Nom=?,Prénom=?,Mail=?,Contact=?,totalpaye=?,versement=?,Restepaye=?,Datepaiem=?   WHERE Matricule=?";
$insertion=$connexion->prepare($sql);
$insertion->execute([$matricule,$nom,$prenom,$email,$contact,$number,$number1,$number2,$date,$matricule]);

      header("Location:../tableau.php");
?> 