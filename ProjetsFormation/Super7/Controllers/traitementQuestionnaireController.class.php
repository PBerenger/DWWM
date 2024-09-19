<?php
// require_once '../Models/traitementQuestionnaireManager.class.php';
// require_once './Models/MyDbConnection.php';

function getPostValue($key, $default = 0) {
    return isset($_POST[$key]) && is_numeric($_POST[$key]) ? (int)$_POST[$key] : $default;
}

// Récupération des réponses du formulaire
$reponses = [
    'interpersonnelle' => 
    getPostValue('question05') + getPostValue('question14') + getPostValue('question17') + getPostValue('question25') + getPostValue('question40') + getPostValue('question42') + getPostValue('question55') + getPostValue('question60') + getPostValue('question71') + getPostValue('question78'),

    'intrapersonnelle' => 
    getPostValue('question04') + getPostValue('question15') + getPostValue('question24') + getPostValue('question27') + getPostValue('question34') + getPostValue('question45') + getPostValue('question50') + getPostValue('question59') + getPostValue('question70') + getPostValue('question73'),

    'spatiale' => 
    getPostValue('question06') + getPostValue('question11') + getPostValue('question18') + getPostValue('question31') + getPostValue('question35') + getPostValue('question38') + getPostValue('question56') + getPostValue('question57') + getPostValue('question72') + getPostValue('question79'),

    'musicale' => 
    getPostValue('question08') + getPostValue('question10') + getPostValue('question20') + getPostValue('question30') + getPostValue('question36') + getPostValue('question44') + getPostValue('question51') + getPostValue('question58') + getPostValue('question66') + getPostValue('question76'),

    'Ecologique' => 
    getPostValue('question01') + getPostValue('question13') + getPostValue('question21') + getPostValue('question26') + getPostValue('question37') + getPostValue('question47') + getPostValue('question54') + getPostValue('question61') + getPostValue('question67') + getPostValue('question75'),

    'kinesthesique' => 
    getPostValue('question03') + getPostValue('question16') + getPostValue('question22') + getPostValue('question32') + getPostValue('question43') + getPostValue('question46') + getPostValue('question52') + getPostValue('question64') + getPostValue('question69') + getPostValue('question77'),

    'verbale' => 
    getPostValue('question02') + getPostValue('question09') + getPostValue('question19') + getPostValue('question29') + getPostValue('question39') + getPostValue('question48') + getPostValue('question49') + getPostValue('question62') + getPostValue('question65') + getPostValue('question80'),

    'logique' => 
    getPostValue('question07') + getPostValue('question12') + getPostValue('question23') + getPostValue('question28') + getPostValue('question33') + getPostValue('question41') + getPostValue('question53') + getPostValue('question63') + getPostValue('question68') + getPostValue('question74')
];

// Détermination de l'intelligence dominante
arsort($reponses);
$dominante = key($reponses);
$score_dominant = current($reponses);




