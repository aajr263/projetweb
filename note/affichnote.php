<?php
  session_start();
  require("../php/database.php");
  $id=$_SESSION['inscription']['Matricule'];
  $sql= "SELECT n.* FROM inscription i,note n, filière f 
        WHERE n.Matricule=i.Matricule AND f.id_filière=n.id_filière AND n.Matricule=? 
        GROUP BY n.Matière ";
    $selection=$connexion->prepare($sql);  
    $selection->execute([$id]);
    $affichage=$selection->fetchAll() ;
?>
<!DOCTYPE html>
<html lang="fr" title="UAIS">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Affichage notes</title>
    <link rel="stylesheet" href="../affi.css">
    <link rel="icon" type="image/x-icon" href="../image/logo.univ.png">
</head>

<body>
    <main class="table">
      <div id="logo">
            <a href="../projet.php"><img src="../image/logo.univ.png" class="UAIS" title="UAIS" ></a>
            <p> UNIVERSITE DE <br>L'AMITIE IVOIRO-SENEGALAISE</p>
      </div>
       
        <div id="ajout">
        <?php if (isset($_SESSION['administrateur'])){?>
        <a href="ajoutnote.php">
            <img src="../image/add-button.png" class="ajouter" title="Ajouter">
        </a>
       
        <?php }
            else{?>
             <a href="../pdf_note.php">
             <img src="../image/printer.png" class="ajouter" title="imprimer">
             </a>
             <?php }?>
            
            
        </div> 
     
        <section class="table__header">
            <h1> 
            <?php if (isset($_SESSION['administrateur'])){ 
              echo(" Notes des Etudiants de l'UAIS");
             }else{
                echo(" Notes de l'étudiant(e)". $_SESSION["inscription"]["Nom"]." ". $_SESSION["inscription"]["Prénom"]);
             }
               ?>

            </h1>
            <div class="input-group">
                <input type="search" placeholder="Rechercher utilisateur">
                <img src="../image/magnifying-glass.png" class="rechercher" title="rechercher">
            </div>
        </section>
        <section class="table__body">
            <table>
                  <thead>
                        <tr>
                        <?php if (isset($_SESSION['administrateur'])){?>
                        <th title="Status"> Matricule </th>
                                <th title="Nom"> Nom </th>
                                <th title="Prenom"> Prénom</th>
                                <th title="Niveau"> Niveau </th>
                                <th title="Filiere">Id_Filière</th>
                                <th title="Matiere">Matières</th>
                                <th title="Credit">crédits</th>
                                <th title="Note">Notes</th>
                               
                                <th title="Action">Action</th>
                                <?php } 
                                else{?>
                                    <th title="Matiere">Matières</th>
                                    <th title="Credit">crédits</th>
                                    <th title="Note">Notes</th>
                                <?php } ?>
                        </tr>
                    </thead>
            
                <tbody>
                    <?php 
                   
                    // require_once("../php/database.php");
                         $nombetu= "SELECT *FROM note";
                         $etunote=$connexion->prepare($nombetu);
                         $etunote->execute();
                         $affiche=$etunote->rowCount();
                         $note= $etunote->fetchAll();
                    ?>
                    <tr>
                    <?php
                        if (isset($_SESSION['administrateur'])){
                            foreach($note as $ins){
                            ?>
                            
                                <td><?php echo($ins["Matricule"])?></td>
                                <td><?php echo($ins["Nom"])?></td>
                                <td><?php echo($ins["Prénom"])?></td>
                                <td><?php echo($ins["Niveau"])?></td>
                                <td><?php echo($ins["id_filière"])?></td>
                                <td><?php echo($ins["Matière"])?></td>
                                <td><?php echo($ins["Credit"])?></td>
                                <td><?php echo($ins["Note"])?></td>
                                <?php if (isset($_SESSION['administrateur'])){?>
                                <td>
                                    <a href="modifnote.php?id=<?php echo($ins["Matricule"])?>" class="btn"><img src="../image/edit.png" class="modifier" title="modifier" ></a>
                                    <a href="supprimnote.php?id=<?php echo($ins["Matricule"])?>" class="btn"><img src="../image/trash.png" class="supprimer" title="supprimer" ></a>
                                     <?php } ?>
                                </td>
                                </tr>  
                        <?php }?>
                        <?php }?>
                   
                        <?php
                        if (isset($_SESSION['inscription'])){
                            foreach ($affichage as $note ){
                            ?> <tr>
                             <td><?php echo($note["Matière"])?></td>
                             <td><?php echo($note["Credit"])?></td>
                            <td><?php echo($note["Note"])?></td>
                            </tr>
                            <?php }?>
                        <?php }?>
                   
                </tbody>
            </table>
        </section>
        
    </main>
        
</body>
</html>