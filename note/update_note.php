<?php
require_once("../php/database.php");
$id=htmlspecialchars($_POST['id']);
$matricule=htmlspecialchars($_POST['matricule']);
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$niveau=htmlspecialchars($_POST['niveau']);
$filiere=htmlspecialchars($_POST['filiere']);
$matiere=htmlspecialchars($_POST['matiere']);
$not=htmlspecialchars($_POST['note']);

$sql="UPDATE note SET Matricule=?,Nom=?,Prénom=?,Niveau=?,id_filière=?,Matière=?,Note=? WHERE matricule=?";
$insertion=$connexion->prepare($sql);
$insertion->execute([$matricule,$nom,$prenom,$niveau,$filiere,$matiere,$not,$id ]);

      header("Location:affichnote.php");
?> 