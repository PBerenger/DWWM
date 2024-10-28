<?php ob_start();?>

<div id="accueilTopContent">
    <div class="textTopContent">
        <h1>SUPER7</h1>
    </div>
</div>

<div id="accueilMidContent">
    <p>Le site internet "Super 7 games" vous permet de visualiser vos progrès à partir de n'importe quel jeu et de confronter votre niveau à celui des autres. Une fois vos habilités identifiées, vous pourrez télécharger des badges de compétences pour votre CV mais aussi vous aventurer à vous confronter aux meilleurs joueurs de vos jeux préférés. Avec "Super 7 games", chaque partie révèle votre avenir. </p>
</div>

<div id="accueilBotContent">
    <h2>Les intelligences multiples</h2>
    <p class="principalText">
        "Votre intelligence ne se limite pas aux seules capacités verbales et logiques évaluées par les tests de QI. Il existe d´autres formes d´intelligences qui sont tout aussi nécessaires à la réussite personnelle et Howard Gardner, professeur en sciences de l´éducation à Harvard et auteur de nombreux ouvrages, affirme que « l´intelligence est tout à la fois la capacité de résoudre des problèmes et celle de créer des produits qui enrichiront la culture et la communauté ». À partir d´études scientifiques, H.Gardner a identifié huit formes d´intelligence qui sont décrites dans sa théorie qu'il peaufine depuis 1983:
        l´intelligence
        <span class="spanImportant">interpersonnelle</span>,
        <span class="spanImportant">intrapersonnelle</span>,
        <span class="spanImportant">spatiale</span>,
        <span class="spanImportant">musicale</span>,
        <span class="spanImportant">écologique</span>,
        <span class="spanImportant">kinesthésique</span>,
        <span class="spanImportant">verbale</span> et
        <span class="spanImportant">logique</span>.
        Dans l’optique de vous aider à bien
        préparer votre transition, nous avons mis au point un exercice librement inspiré de cette typologie. Il n’a bien sûr, aucune prétention scientifique, mais l’expérience nous a démontré qu’il était très représentatif et inspirant."
    </p>

    <div class="secondaryText">
        <a class="linkST" href="questionnaire">Questionnaire</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
?>