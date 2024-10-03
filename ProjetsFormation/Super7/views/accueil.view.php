<?php ob_start();?>

<div id="topContent">
    <div class="textTopContent">
        <h1>SUPER7</h1>
    </div>
</div>

<div id="midContent">
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
        <a href="questionnaire">En cliquant sur ce lien, vous pouvez-testez vos capacités rapidements et commencer.</a>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
?>