<?php
require_once("./php/database.php");
$id=htmlspecialchars($_POST['id']);
$email=htmlspecialchars($_POST['email']);
$nom=htmlspecialchars($_POST['nom']);
$prenom=htmlspecialchars($_POST['prenom']);
$password=sha1($_POST['motpass']);
$sql="UPDATE administrateur SET mail=?,Nom=?,Prénom=?,Motdepass=? WHERE mail=?";
$insertion=$connexion->prepare($sql);
$insertion->execute([$email,$nom,$prenom,$password,$id ]);

      header("Location:affichadmin.php");
?> 