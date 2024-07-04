<?php
if (session_status() == PHP_SESSION_NONE) session_start();


require_once "dbConnect.php";
require_once "auth.php";
// Vérification de la variable $_SESSION['user_id'] dans le fichier 'index.php' pour s'assurer que seuls les utilisateurs authentifiés y accèdent. 
// if(!isset($_SESSION['user_id'])) {
//     header('location: login.php');
//     exit();
// }
// verifAdmin();
?>
<!-- <div class="Welcome-text">
    <p>Bienvenue</p>
</div> -->
<?php
// ob_start();
?>
<div id="section1">
    <img src="/img/Desktop/headerAccueilDesktop1.jpg" alt="">
    <div class="intro">
        <p>
            La liste des skateurs qui participeront aux Olympic Qualifier Series (OQS) a été dressée.
            Au total, 176 athlètes participeront aux OQS et tenteront d'obtenir un quota<span class="asterisque">*</span> pour les prochains Jeux Olympiques de Paris 2024.
        </p>
    </div>
</div>

<div id="section2">
    <p class="un">
    Les Olympic Qualifier Series s’annoncent comme l’un des événements  sportifs les plus passionnants et les plus animés de 2024. Il  rassemblera des athlètes du monde du BMX freestyle, du breaking, du skateboard et de l’escalade sportive,  qui s’affronteront côte à côte dans les parcs urbains de Shanghai, en  République populaire de Chine, et de Budapest, en Hongrie.
    L’étape de Shanghai se déroulera au Huangpu Riverside du 16 au 19 mai 2024, alors que  l’étape de Budapest aura lieu au Ludovika Campus du 20 au 23 juin 2024.
    Découvrez la liste des noms et des nations qui espèrent remporter l’or en BMX freestyle aux Jeux Olympiques de Paris 2024.
    </p>
    <p class="deux">
    *Les Comités nationaux olympiques ayant l’autorité exclusive pour  la représentation de leur pays respectif aux Jeux Olympiques,<br>la  participation des athlètes aux Jeux de Paris dépend de la sélection de  leur CNO pour représenter leur délégation à Paris 2024.
    </p>
</div>




<?php
$content = ob_get_clean();
$titre = "Epreuve de Skateboard aux jeux Olympiques de Paris 2024";
require "template.php";
?>