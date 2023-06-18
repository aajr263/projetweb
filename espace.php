<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="fr" title="UAIS">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Espace etudiant</title>
    <link rel="stylesheet" href="espace.css">
    <link rel="icon" type="image/x-icon" href="image/logo.univ.png">
    
</head>

<body>
  <section class="espace">
   <div id="logo">
     <a href="projet.php"><img src="./image/logo.univ.png" class="UAIS" title="UAIS" ></a>
     <p> UNIVERSITE DE <br>L'AMITIE IVOIRO-SENEGALAISE</p>
    </div>
    <section class="table__header">
      <h1> BIENVENUE Etudiant(e) <?php echo($_SESSION["inscription"]["Nom"]." ".($_SESSION["inscription"]["Prénom"]) )?>  de l'UAIS</h1>
    </section>
    <div class="voir">
       <a href="./note/affichnote.php"><button type="button" name="value" value="valider">Voir Notes</button></a>
      </div>         
  </section>
</body>
</html>