<?php
require_once("../php/database.php");
$id = $_GET['id'];
$query= "DELETE FROM inscription WHERE Matricule=? ";
 $etudiant=$connexion->prepare($query);
 $etudiant->execute([$id]); 
 header("location:affichetu.php");
 exit;
?>