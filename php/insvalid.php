<?php
    require_once("database.php");
?>
<?php 
    if(isset($_POST['value'])){
        if(!empty($_POST['matricule'])&&
           !empty($_POST['nom'])&&
           !empty($_POST['prenom'])&&
           !empty($_POST['niveau'])&&
           !empty($_POST['email'])&&
           !empty($_POST['number'])&&
           !empty($_POST['sexe'])
        ){
            $matricule=htmlspecialchars($_POST['matricule']);
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $niveau=htmlspecialchars($_POST['niveau']);
            $email=htmlspecialchars($_POST['email']);
            $number=htmlspecialchars($_POST['number']);
            $sexe=htmlspecialchars($_POST['sexe']);
            $message=htmlspecialchars($_POST['message']);
            $filiere=htmlspecialchars($_POST['filiere']);
    
            $requete="INSERT INTO inscription VALUES(?,?,?,?,?,?,?,?,?)";
            $insertion=$connexion->prepare($requete);
            $insertion->execute([$matricule,$nom,$prenom,$niveau,$email,$number,$sexe,$message, $filiere]);
            $suces="Inscription effectue";
           
        }
        else{
            echo('Veuillez remplir les champs');
            $erreur_message="veuillez remplir tous les champs";
        }
    }
?>