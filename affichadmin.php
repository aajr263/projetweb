<!DOCTYPE html>
<html lang="fr" title="UAIS">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Affichage administrateur</title>
    <link rel="stylesheet" href="affi.css">
    <link rel="icon" type="image/x-icon" href="image/logo.univ.png">
</head>

<body>
    <main class="table">
      <div id="logo">
            <a href="./projet.php"><img src="./image/logo.univ.png" class="UAIS" title="UAIS" ></a>
            <p> UNIVERSITE DE <br>L'AMITIE IVOIRO-SENEGALAISE</p>
      </div>
      <div id="ajout">
      <a href="ajoutadmin.php"><img src="./image/add-button.png" class="ajouter" title="Ajouter"></a>
      </div> 
        <section class="table__header">
            <h1>ADMINISTRATEUR DE l'UAIS</h1>
            <div class="input-group">
                <input type="search" placeholder="Rechercher utilisateur">
                <img src="./image/magnifying-glass.png" class="rechercher" title="rechercher">
            </div>
        </section>
        <section class="table__body">
            <table>
                  <thead>
                        <tr>
                                <th title="Nom"> Nom </th>
                                <th title="Prenom"> Prénom</th>
                                <th title="Email"> Email </th>
                               
                                <th title="Action">Action</th>
                        </tr>
                    </thead>
            
            <tbody>
                <?php 
                require_once("./php/database.php");
                $nombadmin= "SELECT *FROM administrateur";
                $adminaffi=$connexion->prepare($nombetu);
                $adminaffi->execute();
                $affi=$adminaffi->rowCount();
                $admin= $adminaffi->fetchAll();
                ?>
                <tr>
                  <?php
                          foreach($admin as $ins){
                         ?>
                        
                             
                             <td><?php echo($ins["Nom"])?></td>
                             <td><?php echo($ins["Prénom"])?></td>
                             <td><?php echo($ins["mail"])?></td>
                             

                             <td>
                                <a href="adminmodif.php?id=<?php echo($ins['mail'])?>" class="btn"><img src="./image/edit.png" class="modifier" title="modifier" ></a>
                                <a href="adminsupprim.php?id=<?php echo($ins['mail'])?>" class="btn"><img src="./image/trash.png" class="supprimer" title="supprimer" ></a>

                            </td>
                             </tr>  
                     <?php }?>
                    
            </tbody>
            </table>
        </section>
        
    </main>
        
</body>
</html>