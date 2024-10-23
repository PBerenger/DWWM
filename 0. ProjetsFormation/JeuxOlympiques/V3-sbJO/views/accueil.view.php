<?php ob_start(); ?>

<div id="topContent">
    <div class="textTopContent">
        <h1>Jeux Olympiques de PARIS 2024: EPREUVES DE SKATEBOARD</h1>
        <h2>La liste des skateurs qui participeront aux Olympic Qualifier Series (OQS) a été dressée.
            Au total, 176 athlètes participeront aux OQS et tenteront d'obtenir un quota<span class="asterisque">*</span> pour les prochains Jeux Olympiques de Paris 2024.</h2>
    </div>
    <img class="imgAccueil" src="../public/images/Desktop/headerAccueilDesktop1.jpg" alt="topSkate">
</div>

<div id="midContent">
    <p class="principalText">
        Les Olympic Qualifier Series s’annoncent comme l’un des événements sportifs les plus passionnants et les plus animés de 2024. Il rassemblera des athlètes du monde du BMX freestyle, du breaking, du skateboard et de l’escalade sportive, qui s’affronteront côte à côte dans les parcs urbains de Shanghai, en République populaire de Chine, et de Budapest, en Hongrie.
        L’étape de Shanghai se déroulera au Huangpu Riverside du 16 au 19 mai 2024, alors que l’étape de Budapest aura lieu au Ludovika Campus du 20 au 23 juin 2024.
        Découvrez la liste des noms et des nations qui espèrent remporter l’or en BMX freestyle aux Jeux Olympiques de Paris 2024.
    </p>
    <p class="asterisque">
        *Les Comités nationaux olympiques ayant l’autorité exclusive pour la représentation de leur pays respectif aux Jeux Olympiques, la participation des athlètes aux Jeux de Paris dépend de la sélection de leur CNO pour représenter leur délégation à Paris 2024.
    </p>
</div>

<?php
$content = ob_get_clean();
require "template.php";
?>
