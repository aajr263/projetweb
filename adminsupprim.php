<?php
require_once("./php/database.php");
$id = $_GET['id'];
$query= "DELETE FROM administrateur WHERE mail=? ";
 $admin=$connexion->prepare($query);
 $admin->execute([$id]); 
 header("location:affichadmin.php");
 exit;
?>