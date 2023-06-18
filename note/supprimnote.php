<?php
require_once("../php/database.php");
$id = $_GET['id'];
$query= "DELETE FROM note WHERE Matricule=? ";
 $note=$connexion->prepare($query);
 $note->execute([$id]); 
 header("location:./affichnote.php");
 exit;
?>