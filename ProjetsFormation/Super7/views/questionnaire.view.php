<?php ob_start();
?>


<div id="questionnaireContainer">
    <h1>Questionnaire d'intelligences multiple</h1>
    <p class="time">10 minutes</p>

    <form id="questionnaire" action="./views/traitementQuestionnaire.view.php" method="POST">
        <p>J'aime les livres parlant d'animaux.</p>
        <input type="radio" name="question01" id="oui01" value="1" required checked>
        <label for="oui01">Oui</label>
        <input type="radio" name="question01" id="non01" value="0" required>
        <label for="non01">Non</label>

        <p>J'aime raconter des anecdotes et des plaisanteries.</p>
        <input type="radio" name="question02" id="oui02" value="1" required checked>
        <label for="oui02">Oui</label>
        <input type="radio" name="question02" id="non02" value="0" required>
        <label for="non02">Non</label>

        <p>Je bouge constamment et je préfère être en action que de rester assis.</p>
        <input type="radio" name="question03" id="oui03" value="1" required checked>
        <label for="oui03">Oui</label>
        <input type="radio" name="question03" id="non03" value="0" required>
        <label for="non03">Non</label>

        <p>J'aime écrire mes pensées dans un journal personnel.</p>
        <input type="radio" name="question04" id="oui04" value="1" required checked>
        <label for="oui04">Oui</label>
        <input type="radio" name="question04" id="non04" value="0" required>
        <label for="non04">Non</label>

        <p>J'aime organiser des activités sociales.</p>
        <input type="radio" name="question05" id="oui05" value="1" required checked>
        <label for="oui05">Oui</label>
        <input type="radio" name="question05" id="non05" value="0" required>
        <label for="non05">Non</label>

        <p>À la lecture de la description d'un lieu, je me le représente facilement.</p>
        <input type="radio" name="question06" id="oui06" value="1" required checked>
        <label for="oui06">Oui</label>
        <input type="radio" name="question06" id="non06" value="0" required>
        <label for="non06">Non</label>

        <p>J'aime comprendre le fonctionnement des choses.</p>
        <input type="radio" name="question07" id="oui07" value="1" required checked>
        <label for="oui07">Oui</label>
        <input type="radio" name="question07" id="non07" value="0" required>
        <label for="non07">Non</label>

        <p>Je reproduis facilement des rythmes avec des objets.</p>
        <input type="radio" name="question08" id="oui08" value="1" required checked>
        <label for="oui08">Oui</label>
        <input type="radio" name="question08" id="non08" value="0" required>
        <label for="non08">Non</label>

        <p>J'aime participer à des présentations orales.</p>
        <input type="radio" name="question09" id="oui09" value="1" required checked>
        <label for="oui09">Oui</label>
        <input type="radio" name="question09" id="non09" value="0" required>
        <label for="non09">Non</label>

        <p>J'ai du rythme quand je danse.</p>
        <input type="radio" name="question10" id="oui10" value="1" required checked>
        <label for="oui10">Oui</label>
        <input type="radio" name="question10" id="non10" value="0" required>
        <label for="non10">Non</label>

        <p>J'aime faire de la décoration.</p>
        <input type="radio" name="question11" id="oui11" value="1" required checked>
        <label for="oui11">Oui</label>
        <input type="radio" name="question11" id="non11" value="0" required>
        <label for="non11">Non</label>

        <p>J'aime organiser l'information d'une façon structurée.</p>
        <input type="radio" name="question12" id="oui12" value="1" required checked>
        <label for="oui12">Oui</label>
        <input type="radio" name="question12" id="non12" value="0" required>
        <label for="non12">Non</label>

        <p>Je suis passionné par les phénomènes naturels.</p>
        <input type="radio" name="question13" id="oui13" value="1" required checked>
        <label for="oui13">Oui</label>
        <input type="radio" name="question13" id="non13" value="0" required>
        <label for="non13">Non</label>

        <p>Je préfère le travail d'équipe au travail individuel.</p>
        <input type="radio" name="question14" id="oui14" value="1" required checked>
        <label for="oui14">Oui</label>
        <input type="radio" name="question14" id="non14" value="0" required>
        <label for="non14">Non</label>

        <p>J'aime me retrouver seul(e) pour travailler.</p>
        <input type="radio" name="question15" id="oui15" value="1" required checked>
        <label for="oui15">Oui</label>
        <input type="radio" name="question15" id="non15" value="0" required>
        <label for="non15">Non</label>

        <p>J'aime la danse.</p>
        <input type="radio" name="question16" id="oui16" value="1" required checked>
        <label for="oui16">Oui</label>
        <input type="radio" name="question16" id="non16" value="0" required>
        <label for="non16">Non</label>

        <p>Je me préoccupe du bien-être des autres.</p>
        <input type="radio" name="question17" id="oui17" value="1" required checked>
        <label for="oui17">Oui</label>
        <input type="radio" name="question17" id="non17" value="0" required>
        <label for="non17">Non</label>

        <p>Je visualise facilement des objets ou des situations dans ma tête.</p>
        <input type="radio" name="question18" id="oui18" value="1" required checked>
        <label for="oui18">Oui</label>
        <input type="radio" name="question18" id="non18" value="0" required>
        <label for="non18">Non</label>

        <p>J'adore écrire des lettres.</p>
        <input type="radio" name="question19" id="oui19" value="1" required checked>
        <label for="oui19">Oui</label>
        <input type="radio" name="question19" id="non19" value="0" required>
        <label for="non19">Non</label>

        <p>Je suis très sensible à l'intonation et au ton.</p>
        <input type="radio" name="question20" id="oui20" value="1" required checked>
        <label for="oui20">Oui</label>
        <input type="radio" name="question20" id="non20" value="0" required>
        <label for="non20">Non</label>

        <!-- ===================================================================================================== -->

        <p>J'aime observer les oiseaux.</p>
        <input type="radio" name="question21" id="oui21" value="1" required checked>
        <label for="oui21">Oui</label>
        <input type="radio" name="question21" id="non21" value="0" required>
        <label for="non21">Non</label>

        <p>J'aime manipuler des objets et faire des maquettes.</p>
        <input type="radio" name="question22" id="oui22" value="1" required checked>
        <label for="oui22">Oui</label>
        <input type="radio" name="question22" id="non22" value="0" required>
        <label for="non22">Non</label>

        <p>J'aime faire appel à différentes stratégies pour résoudre des difficultés.</p>
        <input type="radio" name="question23" id="oui23" value="1" required checked>
        <label for="oui23">Oui</label>
        <input type="radio" name="question23" id="non23" value="0" required>
        <label for="non23">Non</label>

        <p>Les gens qui m'entourent me perçoivent une personne sage et me consultent pour avoir mon avis.</p>
        <input type="radio" name="question24" id="oui24" value="1" required checked>
        <label for="oui24">Oui</label>
        <input type="radio" name="question24" id="non24" value="0" required>
        <label for="non24">Non</label>

        <p>J'aime rencontrer de nouvelles personnes.</p>
        <input type="radio" name="question25" id="oui25" value="1" required checked>
        <label for="oui25">Oui</label>
        <input type="radio" name="question25" id="non25" value="0" required>
        <label for="non25">Non</label>

        <p>Je visite le zoo avec intérêt.</p>
        <input type="radio" name="question26" id="oui26" value="1" required checked>
        <label for="oui26">Oui</label>
        <input type="radio" name="question26" id="non26" value="0" required>
        <label for="non26">Non</label>

        <p>J'ai besoin de travailler à mon rythme dans des projets que j'ai choisis.</p>
        <input type="radio" name="question27" id="oui27" value="1" required checked>
        <label for="oui27">Oui</label>
        <input type="radio" name="question27" id="non27" value="0" required>
        <label for="non27">Non</label>

        <p>J'ai des arguments logiques pour expliquer ce que je fais.</p>
        <input type="radio" name="question28" id="oui28" value="1" required checked>
        <label for="oui28">Oui</label>
        <input type="radio" name="question28" id="non28" value="0" required>
        <label for="non28">Non</label>

        <p>J'ai de la facilité en orthographe.</p>
        <input type="radio" name="question29" id="oui29" value="1" required checked>
        <label for="oui29">Oui</label>
        <input type="radio" name="question29" id="non29" value="0" required>
        <label for="non29">Non</label>

        <p>J'aime taper des mains ou du pied en écoutant la musique.</p>
        <input type="radio" name="question30" id="oui30" value="1" required checked>
        <label for="oui30">Oui</label>
        <input type="radio" name="question30" id="non30" value="0" required>
        <label for="non30">Non</label>

        <p>J'aime réaliser des cartes d'organisation d'idées.</p>
        <input type="radio" name="question31" id="oui31" value="1" required checked>
        <label for="oui31">Oui</label>
        <input type="radio" name="question31" id="non31" value="0" required>
        <label for="non31">Non</label>

        <p>Je suis très habile à démonter et à remonter des objets (moteur, calculatrice...).</p>
        <input type="radio" name="question32" id="oui32" value="1" required checked>
        <label for="oui32">Oui</label>
        <input type="radio" name="question32" id="non32" value="0" required>
        <label for="non32">Non</label>

        <p>J’aime faire du calcul mental (jogging mathématique).</p>
        <input type="radio" name="question33" id="oui33" value="1" required checked>
        <label for="oui33">Oui</label>
        <input type="radio" name="question33" id="non33" value="0" required>
        <label for="non33">Non</label>

        <p>J’aime me perdre dans mes réflexions.</p>
        <input type="radio" name="question34" id="oui34" value="1" required checked>
        <label for="oui34">Oui</label>
        <input type="radio" name="question34" id="non34" value="0" required>
        <label for="non34">Non</label>

        <p>Je m’oriente facilement dans un nouvel endroit.</p>
        <input type="radio" name="question35" id="oui35" value="1" required checked>
        <label for="oui35">Oui</label>
        <input type="radio" name="question35" id="non35" value="0" required>
        <label for="non35">Non</label>

        <p>J’aime jouer d’un instrument de musique.</p>
        <input type="radio" name="question36" id="oui36" value="1" required checked>
        <label for="oui36">Oui</label>
        <input type="radio" name="question36" id="non36" value="0" required>
        <label for="non36">Non</label>

        <p>J'aime les photographies de paysages illustrant la faune et la flore.</p>
        <input type="radio" name="question37" id="oui37" value="1" required checked>
        <label for="oui37">Oui</label>
        <input type="radio" name="question37" id="non37" value="0" required>
        <label for="non37">Non</label>

        <p>J'aime les arts plastiques.</p>
        <input type="radio" name="question38" id="oui38" value="1" required checked>
        <label for="oui38">Oui</label>
        <input type="radio" name="question38" id="non38" value="0" required>
        <label for="non38">Non</label>

        <p>J'aime les jeux impliquant des mots (scrabble, mots croisés, mots mystères...).</p>
        <input type="radio" name="question39" id="oui39" value="1" required checked>
        <label for="oui39">Oui</label>
        <input type="radio" name="question39" id="non39" value="0" required>
        <label for="non39">Non</label>

        <p>Je suis ouvert aux opinions des autres.</p>
        <input type="radio" name="question40" id="oui40" value="1" required checked>
        <label for="oui40">Oui</label>
        <input type="radio" name="question40" id="non40" value="0" required>
        <label for="non40">Non</label>

        <!-- ===================================================================================================== -->

        <p>J'aime écouter des émissions scientifiques.</p>
        <input type="radio" name="question41" id="oui41" value="1" required checked>
        <label for="oui41">Oui</label>
        <input type="radio" name="question41" id="non41" value="0" required>
        <label for="non41">Non</label>

        <p>Je m'adapte facilement aux différentes personnes (âge, culture, valeurs...) et y trouve de l’intérêt.</p>
        <input type="radio" name="question42" id="oui42" value="1" required checked>
        <label for="oui42">Oui</label>
        <input type="radio" name="question42" id="non42" value="0" required>
        <label for="non42">Non</label>

        <p>J'aime regarder des événements sportifs et en parler.</p>
        <input type="radio" name="question43" id="oui43" value="1" required checked>
        <label for="oui43">Oui</label>
        <input type="radio" name="question43" id="non43" value="0" required>
        <label for="non43">Non</label>

        <p>Je peux facilement identifier divers styles de musique.</p>
        <input type="radio" name="question44" id="oui44" value="1" required checked>
        <label for="oui44">Oui</label>
        <input type="radio" name="question44" id="non44" value="0" required>
        <label for="non44">Non</label>

        <p>Mes objectifs d'avenir sont bien définis.</p>
        <input type="radio" name="question45" id="oui45" value="1" required checked>
        <label for="oui45">Oui</label>
        <input type="radio" name="question45" id="non45" value="0" required>
        <label for="non45">Non</label>

        <p>J'aime improviser et jouer au théâtre.</p>
        <input type="radio" name="question46" id="oui46" value="1" required checked>
        <label for="oui46">Oui</label>
        <input type="radio" name="question46" id="non46" value="0" required>
        <label for="non46">Non</label>

        <p>Je collectionne des objets (animaux, insectes) se rapportant à la nature.</p>
        <input type="radio" name="question47" id="oui47" value="1" required checked>
        <label for="oui47">Oui</label>
        <input type="radio" name="question47" id="non47" value="0" required>
        <label for="non47">Non</label>

        <p>J'aime connaître la signification des mots.</p>
        <input type="radio" name="question48" id="oui48" value="1" required checked>
        <label for="oui48">Oui</label>
        <input type="radio" name="question48" id="non48" value="0" required>
        <label for="non48">Non</label>

        <p>J'aime expliquer aux autres ce que j'ai appris.</p>
        <input type="radio" name="question49" id="oui49" value="1" required checked>
        <label for="oui49">Oui</label>
        <input type="radio" name="question49" id="non49" value="0" required>
        <label for="non49">Non</label>

        <p>J'ai de la facilité à identifier les émotions que je ressens.</p>
        <input type="radio" name="question50" id="oui50" value="1" required checked>
        <label for="oui50">Oui</label>
        <input type="radio" name="question50" id="non50" value="0" required>
        <label for="non50">Non</label>

        <p>J'aime fredonner des mélodies.</p>
        <input type="radio" name="question51" id="oui51" value="1" required checked>
        <label for="oui51">Oui</label>
        <input type="radio" name="question51" id="non51" value="0" required>
        <label for="non51">Non</label>

        <p>Quand j'ai les mains libres, j'aime jouer avec les objets qui sont à ma portée.</p>
        <input type="radio" name="question52" id="oui52" value="1" required checked>
        <label for="oui52">Oui</label>
        <input type="radio" name="question52" id="non52" value="0" required>
        <label for="non52">Non</label>

        <p>J'ai de la facilité à organiser mentalement mes idées.</p>
        <input type="radio" name="question53" id="oui53" value="1" required checked>
        <label for="oui53">Oui</label>
        <input type="radio" name="question53" id="non53" value="0" required>
        <label for="non53">Non</label>

        <p>J'ai toujours eu ou voulu avoir des animaux domestiques.</p>
        <input type="radio" name="question54" id="oui54" value="1" required checked>
        <label for="oui54">Oui</label>
        <input type="radio" name="question54" id="non54" value="0" required>
        <label for="non54">Non</label>

        <p>Je saisis facilement les sentiments et les émotions des autres.</p>
        <input type="radio" name="question55" id="oui55" value="1" required checked>
        <label for="oui55">Oui</label>
        <input type="radio" name="question55" id="non55" value="0" required>
        <label for="non55">Non</label>

        <p>J'adore dessiner.</p>
        <input type="radio" name="question56" id="oui56" value="1" required checked>
        <label for="oui56">Oui</label>
        <input type="radio" name="question56" id="non56" value="0" required>
        <label for="non56">Non</label>

        <p>J'aime rassembler des casse-tête.</p>
        <input type="radio" name="question57" id="oui57" value="1" required checked>
        <label for="oui57">Oui</label>
        <input type="radio" name="question57" id="non57" value="0" required>
        <label for="non57">Non</label>

        <p>J'aime chanter sans musique (a capella).</p>
        <input type="radio" name="question58" id="oui58" value="1" required checked>
        <label for="oui58">Oui</label>
        <input type="radio" name="question58" id="non58" value="0" required>
        <label for="non58">Non</label>

        <p>Je connais bien mes goûts et mes préférences.</p>
        <input type="radio" name="question59" id="oui59" value="1" required checked>
        <label for="oui59">Oui</label>
        <input type="radio" name="question59" id="non59" value="0" required>
        <label for="non59">Non</label>

        <p>Je m’intéresse aux idées des autres.</p>
        <input type="radio" name="question60" id="oui60" value="1" required checked>
        <label for="oui60">Oui</label>
        <input type="radio" name="question60" id="non60" value="0" required>
        <label for="non60">Non</label>

        <!-- ===================================================================================================== -->

        <p>J'aime installer des mangeoires pour les animaux sauvages ou les oiseaux.</p>
        <input type="radio" name="question61" id="oui61" value="1" required checked>
        <label for="oui61">Oui</label>
        <input type="radio" name="question61" id="non61" value="0" required>
        <label for="non61">Non</label>

        <p>Je mémorise facilement ce que je lis.</p>
        <input type="radio" name="question62" id="oui62" value="1" required checked>
        <label for="oui62">Oui</label>
        <input type="radio" name="question62" id="non62" value="0" required>
        <label for="non62">Non</label>

        <p>J'aime les énigmes, les jeux d'enquête et de stratégies.</p>
        <input type="radio" name="question63" id="oui63" value="1" required checked>
        <label for="oui63">Oui</label>
        <input type="radio" name="question63" id="non63" value="0" required>
        <label for="non63">Non</label>

        <p>J'aime les arts parce que je peux travailler avec mes mains (dessin, couture...).</p>
        <input type="radio" name="question64" id="oui64" value="1" required checked>
        <label for="oui64">Oui</label>
        <input type="radio" name="question64" id="non64" value="0" required>
        <label for="non64">Non</label>

        <p>J'aime écouter des histoires et des poèmes.</p>
        <input type="radio" name="question65" id="oui65" value="1" required checked>
        <label for="oui65">Oui</label>
        <input type="radio" name="question65" id="non65" value="0" required>
        <label for="non65">Non</label>

        <p>Je suis sensible aux bruits de mon environnement (la pluie, la photocopieuse, l’horloge...).</p>
        <input type="radio" name="question66" id="oui66" value="1" required checked>
        <label for="oui66">Oui</label>
        <input type="radio" name="question66" id="non66" value="0" required>
        <label for="non66">Non</label>

        <p>J'aime aller à la ferme.</p>
        <input type="radio" name="question67" id="oui67" value="1" required checked>
        <label for="oui67">Oui</label>
        <input type="radio" name="question67" id="non67" value="0" required>
        <label for="non67">Non</label>

        <p>J'aime les cours de mathématique.</p>
        <input type="radio" name="question68" id="oui68" value="1" required checked>
        <label for="oui68">Oui</label>
        <input type="radio" name="question68" id="non68" value="0" required>
        <label for="non68">Non</label>

        <p>J'aime pratiquer des sports.</p>
        <input type="radio" name="question69" id="oui69" value="1" required checked>
        <label for="oui69">Oui</label>
        <input type="radio" name="question69" id="non69" value="0" required>
        <label for="non69">Non</label>

        <p>Presque toutes les questions m’inspirent une opinion précise et assurée.</p>
        <input type="radio" name="question70" id="oui70" value="1" required checked>
        <label for="oui70">Oui</label>
        <input type="radio" name="question70" id="non70" value="0" required>
        <label for="non70">Non</label>

        <p>J'aide les gens à résoudre leurs problèmes et leurs conflits.</p>
        <input type="radio" name="question71" id="oui71" value="1" required checked>
        <label for="oui71">Oui</label>
        <input type="radio" name="question71" id="non71" value="0" required>
        <label for="non71">Non</label>

        <p>J'ai un bon sens de l'observation.</p>
        <input type="radio" name="question72" id="oui72" value="1" required checked>
        <label for="oui72">Oui</label>
        <input type="radio" name="question72" id="non72" value="0" required>
        <label for="non72">Non</label>

        <p>Je n'ai pas besoin de récompenses pour être motivé.</p>
        <input type="radio" name="question73" id="oui73" value="1" required checked>
        <label for="oui73">Oui</label>
        <input type="radio" name="question73" id="non73" value="0" required>
        <label for="non73">Non</label>

        <p>Je comprends rapidement, je fais facilement des liens entre les idées.</p>
        <input type="radio" name="question74" id="oui74" value="1" required checked>
        <label for="oui74">Oui</label>
        <input type="radio" name="question74" id="non74" value="0" required>
        <label for="non74">Non</label>

        <p>Je me sens bien lorsque je suis dans la forêt.</p>
        <input type="radio" name="question75" id="oui75" value="1" required checked>
        <label for="oui75">Oui</label>
        <input type="radio" name="question75" id="non75" value="0" required>
        <label for="non75">Non</label>

        <p>Je trouve facilement des ressemblances entre des mélodies.</p>
        <input type="radio" name="question76" id="oui76" value="1" required checked>
        <label for="oui76">Oui</label>
        <input type="radio" name="question76" id="non76" value="0" required>
        <label for="non76">Non</label>

        <p>J'aime imiter les gestes des autres.</p>
        <input type="radio" name="question77" id="oui77" value="1" required checked>
        <label for="oui77">Oui</label>
        <input type="radio" name="question77" id="non77" value="0" required>
        <label for="non77">Non</label>

        <p>J'aime les sports d'équipe et les activités de coopération.</p>
        <input type="radio" name="question78" id="oui78" value="1" required checked>
        <label for="oui78">Oui</label>
        <input type="radio" name="question78" id="non78" value="0" required>
        <label for="non78">Non</label>

        <p>À partir d'un plan, je m’imagine facilement le produit final.</p>
        <input type="radio" name="question79" id="oui79" value="1" required checked>
        <label for="oui79">Oui</label>
        <input type="radio" name="question79" id="non79" value="0" required>
        <label for="non79">Non</label>

        <p>J'ai un grand intérêt pour les langues étrangères.</p>
        <input type="radio" name="question80" id="oui80" value="1" required checked>
        <label for="oui80">Oui</label>
        <input type="radio" name="question80" id="non80" value="0" required>
        <label for="non80">Non</label>


        <input type="submit" value="Terminer le questionnaire">
    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
?>