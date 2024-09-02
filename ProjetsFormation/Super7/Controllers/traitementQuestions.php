<?php
// Récupération des réponses du formulaire
$reponses = [
    'naturelle' => $_POST['question01'] + $_POST['question13'] + $_POST['question21'] + $_POST['question26'] + $_POST['question37'] + $_POST['question47'] + $_POST['question54'],
    'linguistique' => $_POST['question02'] + $_POST['question09'] + $_POST['question19'] + $_POST['question29'] + $_POST['question39'] + $_POST['question48'] + $_POST['question49'],
    'logico-mathématique' => $_POST['question07'] + $_POST['question12'] + $_POST['question23'] + $_POST['question28'] + $_POST['question33'] + $_POST['question41'] + $_POST['question53'],
    'spatiale' => $_POST['question06'] + $_POST['question11'] + $_POST['question18'] + $_POST['question31'] + $_POST['question35'] + $_POST['question56'] + $_POST['question57'],
    'musicale' => $_POST['question08'] + $_POST['question10'] + $_POST['question20'] + $_POST['question30'] + $_POST['question36'] + $_POST['question44'] + $_POST['question51'] + $_POST['question58'],
    'kinesthésique' => $_POST['question03'] + $_POST['question16'] + $_POST['question22'] + $_POST['question32'] + $_POST['question43'] + $_POST['question46'] + $_POST['question52'],
    'interpersonnelle' => $_POST['question05'] + $_POST['question14'] + $_POST['question17'] + $_POST['question25'] + $_POST['question40'] + $_POST['question42'] + $_POST['question55'],
    'intrapersonnelle' => $_POST['question04'] + $_POST['question15'] + $_POST['question24'] + $_POST['question27'] + $_POST['question34'] + $_POST['question45'] + $_POST['question50']
];

// Détermination de l'intelligence dominante
arsort($reponses);
$dominante = key($reponses);
$score_dominant = current($reponses);

// Affichage du résultat
echo "<h1>Résultats du Questionnaire d'intelligences multiples</h1>";
echo "<p>Votre type d'intelligence dominant est : <strong>$dominante</strong> avec un score de $score_dominant.</p>";
echo "<p>Voici vos scores pour chaque type d'intelligence :</p>";

foreach ($reponses as $type => $score) {
    echo "<p><strong>" . ucfirst($type) . "</strong> : $score</p>";
}