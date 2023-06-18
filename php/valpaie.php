<?php
require_once("../projet/php/database.php");
?>
<?php
    if(isset($_POST['value'])){
      if(
        !empty($_POST['number'])&&
      !empty($_POST['number1'])&&
      !empty($_POST['number2'])&&
      !empty($_POST['date'])&&
      !empty($_POST['utilise'])&&
      !empty($_POST['matricule'])&&
      !empty($_POST['nom'])&&
      !empty($_POST['prenom'])&&
      !empty($_POST['email'])&&
      !empty($_POST['contact'])
        ){
            $number=htmlspecialchars($_POST['number']);
            $number1=htmlspecialchars($_POST['number1']);
            $number2=htmlspecialchars($_POST['number2']);
            $date=htmlspecialchars($_POST['date']);
            $utilise=htmlspecialchars($_POST['utilise']);
            $matricule=htmlspecialchars($_POST['matricule']);
            $nom=htmlspecialchars($_POST['nom']);
            $prenom=htmlspecialchars($_POST['prenom']);
            $email=htmlspecialchars($_POST['email']);
            $contact=htmlspecialchars($_POST['contact']);

            // $prix=1000000;
            // $reste=$prix-$number1;
            require_once("./pdf_paie.php");
            $sql="INSERT INTO paiement values (?,?,?,?,?,?,?,?,?)";
            $insertion=$connexion->prepare($sql);
            $insertion->execute([$matricule,$nom,$prenom,$email,$contact,$number,$number1,$number2,$date]);
      }
      else{

        $erreur_message="veuillez remplir tous les champs";  
      }
    
    }
        
  ?>