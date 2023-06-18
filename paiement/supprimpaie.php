<?php
require_once("../php/database.php");
$id = $_GET['id'];
$query= "DELETE FROM paiement WHERE Matricule=? ";
 $paie=$connexion->prepare($query);
 $paie->execute([$id]); 
 header("location:../tableau.php");
 exit;
?>