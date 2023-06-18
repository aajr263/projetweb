<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="presentation.css">
    <link rel="stylesheet" href="header.css">
    <link rel="stylesheet" href="footer.css">

    <title> présentation UAIS</title>
    <link rel="icon" type="image/x-icon" href="image/logo.univ.png">
</head>
<body>
    <?php
        require("../projet/header.php");
    ?>
    <div class="page1">
        <h6 class="bod">BIENVENUE A L'UNIVERSITE DE l'AMITIE IVOIRO-SENEGALAISE</h6>
    </div> 
    <h1>NOS FORMATIONS</h1>
    <div class="page2">
        <h3> filières Universitaires et professionnelles</h3>
        <p> une equipe pédagogique formée d'enseignants expérimentés issus des meilleurs universités nationales et internationales, de plus des enseignants expérimentés^pour une formation de qualité et un encadrement personnalisé.</p>
        <h3> Explorez nos filières selon vos interêts</h3>
    </div>
   <div class="content">
        <div class="cards">
            <div class="card">
                <div class= "math">
                    <h3>Sciences Mathématiques</h3>
                    <img src="image/math.png" alt="maths" style="width:100%">
                    <p>elles aident à comprendre comment fonctionnent le monde et les autres sciences.</p>
                    <h4> quelques débouchés : <br> enseignant chercheurs , professeurs de maths ,analyste statisticien ,comptable </h4>
                </div>              
          </div>
            <div class="card">
                <div class="meca">
                 <h3>Sciences Mécaniques</h3>
                 <img src="image/meca.png" alt="meca" style="width:100%">
                 <p>elles est au coeur de toutes industries ,elles aident à concevoir des robots, des machines spéciales etc.</p>
                 <h4>Quelques débouchés : <br> enseignant chercheur ,ingenieur concepteur de structures composites et sytèmes mecanique, eco-conceteur de materiaux  </h4>
             </div>
            </div>
                 
             <div class="card">
                <div class="bio">
                 <h3>Science Biologiques</h3>
                 <img src="image/biologie.png" alt="biologie"style="width:100%"> 
                 <p>elles aident à examiner la vie pour comprendre le fonctionnement et l'adaptation des organismes à leur environnement.</p>
                 <h4>Quelques débouchés : <br> enseignant chercheur , biologiste anatomiste, morphologiste , embrylogiste </h4>
             </div>
            </div>
             <div class="card">
                <div class="info">
                 <h3>Sciences Informatiques</h3>
                 <img src="image/infor.png" alt="info" style="width:100%">
                 <p>elles sont un levier pourles autres sciences ,elles aident à mieux comprendre des notions universelles ou fondamentale.</p>
                 <h4> Quelques débouchés : <br> enseignant chercheur,développeur web ,administrateur base de données ,architecte réseau ,administrateur réseau</h4>
               </div>
             </div>
             <div class="card">
             <div class="geni">
                 <h3>Génie Civil</h3> 
                 <img src="image/geniec.jpg" alt="genie" style="width:100%">
                 <p>ils aident à la conception,la réalisation l'exploitation et la réhabilisation d'ouvrages de constructions et d'infrastructures afin de repondre aux besions de la société , tout en assurant la sécurité du public et la protection de l'environnement. </p>
                 <h4>Quelques débouchés : <br> ingénieur batiment, géomètre,ingénieur génie civil </h4>
               </div>
             </div>
             <div class="card">
             <div class="chimi">
                 <h3>Science Chimique</h3>
                 <img src="image/chimie.png" alt=" chimie" style="width:100%">
                 <p>elles aident à revolutionner la fabrication des médicaments,des vêtements, des cosmétiques mais aussi la diffusion de l'énergie et la production d'appareils technologiques.</p>
                 <h4> Quelques débouchés : <br> enseignant chercheur ,ingenieur chimiste, concepteuret formulateur de molécules ,pétrochimiste</h4>
              </div>
            </div>
     </div>
   </div>
   </div>  
    <h1>NOS ATOUTS</h1>
    <div class="page3">
        <p>un environnent stimulant ,des infrastructures de pointes et des professeurs de renom. <br> A l'Université de l'Amitié Ivoiro-Sénégalaise,vous êtes une personne à part entière ,porteuse d'un potentiel considérable ,et vous recevez toute la considération que vous méritez afin d'assurer votre epanouissement personnel.</p>
         <video width="700" height="700" controls>
            <source src="video/videoUNI.mp4" type="video/mp4">
        </video>
    </div>
    <h5>Etudier à UAIS , c'est adopter cette science attachante pour vivre une expérience fascinante</h5>
    <div class="page4">
       <table>
         <tr>
             <th>
             <h2>1.</h2></th>
             <th><h4>la qualité de l'enseignement <br>l'amélioration continue de la qualité des formations est un souci constant qui est au coeur des mission de l'UAIS.</h4></th>
         </tr>
         <tr>
             <th><h2>2.</h2></th>
             <th><h4>un suivi pédagogique personnalisé <br> un suivi pédagogique de l'étudiant dont le but est d'apprécier l'acquisition des conpétences et des connaissances.</h4></th>
         </tr>
         <tr>
             <th><h2>3.</h2></th>
             <th><h4>un partenariat avec les entreprises <br> la relation " Université-Millieux scientifiques" est au coeur de l'action de l'UAIS , avec pour double objectif de renforcer l'employabilité des étudiants et de promouvoir l'innovation. </h4></th>
         </tr>
        </table> 

    <div class="bout"> <button><a href="./formulaire.php">préinscription</a></button> </div>
    <?php
     require("../projet/footer.php");
    ?>
   
</body>
</html>