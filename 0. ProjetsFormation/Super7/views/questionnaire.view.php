<?php ob_start();
?>

<div id="questionnaireContainer">
    <div class="titreQuestionnaire">
        <h1>Questionnaire</h1>
    </div>
    <h2>Intelligences multiples</h2>
    <p class="time">Durée : 10 minutes</p>

    <form id="questionnaire" action="traitementQuestionnaire" method="POST">
        <div class="question">
            <h6>Question n° 1</h6>
            <p>J'aime les livres parlant d'animaux.</p>
            <div class="oui">
                <input type="radio" name="question01" id="oui01" value="1" required checked>
                <label for="oui01">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question01" id="non01" value="0" required>
                <label for="non01">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 2</h6>
            <p>J'aime raconter des anecdotes et des plaisanteries.</p>
            <div class="oui">
                <input type="radio" name="question02" id="oui02" value="1" required checked>
                <label for="oui02">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question02" id="non02" value="0" required>
                <label for="non02">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 3</h6>
            <p>Je bouge constamment et je préfère être en action que de rester assis.</p>
            <div class="oui">
                <input type="radio" name="question03" id="oui03" value="1" required>
                <label for="oui03">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question03" id="non03" value="0" required checked>
                <label for="non03">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 4</h6>
            <p>J'aime écrire mes pensées dans un journal personnel.</p>
            <div class="oui">
                <input type="radio" name="question04" id="oui04" value="1" required>
                <label for="oui04">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question04" id="non04" value="0" required checked>
                <label for="non04">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 5</h6>
            <p>J'aime organiser des activités sociales.</p>
            <div class="oui">
                <input type="radio" name="question05" id="oui05" value="1" required>
                <label for="oui05">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question05" id="non05" value="0" required checked>
                <label for="non05">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 6</h6>
            <p>À la lecture de la description d'un lieu, je me le représente facilement.</p>
            <div class="oui">
                <input type="radio" name="question06" id="oui06" value="1" required checked>
                <label for="oui06">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question06" id="non06" value="0" required>
                <label for="non06">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 7</h6>
            <p>J'aime comprendre le fonctionnement des choses.</p>
            <div class="oui">
                <input type="radio" name="question07" id="oui07" value="1" required checked>
                <label for="oui07">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question07" id="non07" value="0" required>
                <label for="non07">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 8</h6>
            <p>Je reproduis facilement des rythmes avec des objets.</p>
            <div class="oui">
                <input type="radio" name="question08" id="oui08" value="1" required>
                <label for="oui08">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question08" id="non08" value="0" required checked>
                <label for="non08">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 9</h6>
            <p>J'aime participer à des présentations orales.</p>
            <div class="oui">
                <input type="radio" name="question09" id="oui09" value="1" required checked>
                <label for="oui09">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question09" id="non09" value="0" required>
                <label for="non09">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 10</h6>
            <p>J'ai du rythme quand je danse.</p>
            <div class="oui">
                <input type="radio" name="question10" id="oui10" value="1" required>
                <label for="oui10">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question10" id="non10" value="0" required checked>
                <label for="non10">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 11</h6>
            <p>J'aime faire de la décoration.</p>
            <div class="oui">
                <input type="radio" name="question11" id="oui11" value="1" required>
                <label for="oui11">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question11" id="non11" value="0" required checked>
                <label for="non11">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 12</h6>
            <p>J'aime organiser l'information d'une façon structurée.</p>
            <div class="oui">
                <input type="radio" name="question12" id="oui12" value="1" required checked>
                <label for="oui12">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question12" id="non12" value="0" required>
                <label for="non12">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 13</h6>
            <p>Je suis passionné par les phénomènes naturels.</p>
            <div class="oui">
                <input type="radio" name="question13" id="oui13" value="1" required checked>
                <label for="oui13">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question13" id="non13" value="0" required>
                <label for="non13">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 14</h6>
            <p>Je préfère le travail d'équipe au travail individuel.</p>
            <div class="oui">
                <input type="radio" name="question14" id="oui14" value="1" required checked>
                <label for="oui14">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question14" id="non14" value="0" required>
                <label for="non14">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 15</h6>
            <p>J'aime me retrouver seul(e) pour travailler.</p>
            <div class="oui">
                <input type="radio" name="question15" id="oui15" value="1" required>
                <label for="oui15">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question15" id="non15" value="0" required checked>
                <label for="non15">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 16</h6>
            <p>J'aime la danse.</p>
            <div class="oui">
                <input type="radio" name="question16" id="oui16" value="1" required checked>
                <label for="oui16">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question16" id="non16" value="0" required>
                <label for="non16">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 17</h6>
            <p>Je me préoccupe du bien-être des autres.</p>
            <div class="oui">
                <input type="radio" name="question17" id="oui17" value="1" required checked>
                <label for="oui17">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question17" id="non17" value="0" required>
                <label for="non17">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 18</h6>
            <p>Je visualise facilement des objets ou des situations dans ma tête.</p>
            <div class="oui">
                <input type="radio" name="question18" id="oui18" value="1" required checked>
                <label for="oui18">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question18" id="non18" value="0" required>
                <label for="non18">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 19</h6>
            <p>J'adore écrire des lettres.</p>
            <div class="oui">
                <input type="radio" name="question19" id="oui19" value="1" required>
                <label for="oui19">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question19" id="non19" value="0" required checked>
                <label for="non19">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 20</h6>
            <p>Je suis très sensible à l'intonation et au ton.</p>
            <div class="oui">
                <input type="radio" name="question20" id="oui20" value="1" required checked>
                <label for="oui20">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question20" id="non20" value="0" required>
                <label for="non20">Non</label>
            </div>
        </div>

        <!-- ===================================================================================================== -->

        <div class="question">
            <h6>Question n° 21</h6>
            <p>J'aime observer les oiseaux.</p>
            <div class="oui">
                <input type="radio" name="question21" id="oui21" value="1" required>
                <label for="oui21">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question21" id="non21" value="0" required checked>
                <label for="non21">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 22</h6>
            <p>J'aime manipuler des objets et faire des maquettes.</p>
            <div class="oui">
                <input type="radio" name="question22" id="oui22" value="1" required checked>
                <label for="oui22">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question22" id="non22" value="0" required>
                <label for="non22">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 23</h6>
            <p>J'aime faire appel à différentes stratégies pour résoudre des difficultés.</p>
            <div class="oui">
                <input type="radio" name="question23" id="oui23" value="1" required checked>
                <label for="oui23">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question23" id="non23" value="0" required>
                <label for="non23">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 24</h6>
            <p>Les gens qui m'entourent me perçoivent comme une personne sage et me consultent pour avoir mon avis.</p>
            <div class="oui">
                <input type="radio" name="question24" id="oui24" value="1" required>
                <label for="oui24">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question24" id="non24" value="0" required checked>
                <label for="non24">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 25</h6>
            <p>J'aime rencontrer de nouvelles personnes.</p>
            <div class="oui">
                <input type="radio" name="question25" id="oui25" value="1" required>
                <label for="oui25">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question25" id="non25" value="0" required checked>
                <label for="non25">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 26</h6>
            <p>Je visite le zoo avec intérêt.</p>
            <div class="oui">
                <input type="radio" name="question26" id="oui26" value="1" required>
                <label for="oui26">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question26" id="non26" value="0" required checked>
                <label for="non26">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 27</h6>
            <p>J'ai besoin de travailler à mon rythme dans des projets que j'ai choisis.</p>
            <div class="oui">
                <input type="radio" name="question27" id="oui27" value="1" required checked>
                <label for="oui27">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question27" id="non27" value="0" required>
                <label for="non27">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 28</h6>
            <p>J'ai des arguments logiques pour expliquer ce que je fais.</p>
            <div class="oui">
                <input type="radio" name="question28" id="oui28" value="1" required checked>
                <label for="oui28">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question28" id="non28" value="0" required>
                <label for="non28">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 29</h6>
            <p>J'ai de la facilité en orthographe.</p>
            <div class="oui">
                <input type="radio" name="question29" id="oui29" value="1" required>
                <label for="oui29">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question29" id="non29" value="0" required checked>
                <label for="non29">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 30</h6>
            <p>J'aime taper des mains ou du pied en écoutant la musique.</p>
            <div class="oui">
                <input type="radio" name="question30" id="oui30" value="1" required checked>
                <label for="oui30">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question30" id="non30" value="0" required>
                <label for="non30">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 31</h6>
            <p>J'aime réaliser des cartes d'organisation d'idées.</p>
            <div class="oui">
                <input type="radio" name="question31" id="oui31" value="1" required checked>
                <label for="oui31">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question31" id="non31" value="0" required>
                <label for="non31">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 32</h6>
            <p>Je suis très habile à démonter et à remonter des objets (moteur, calculatrice...).</p>
            <div class="oui">
                <input type="radio" name="question32" id="oui32" value="1" required checked>
                <label for="oui32">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question32" id="non32" value="0" required>
                <label for="non32">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 33</h6>
            <p>J’aime faire du calcul mental (jogging mathématique).</p>
            <div class="oui">
                <input type="radio" name="question33" id="oui33" value="1" required>
                <label for="oui33">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question33" id="non33" value="0" required checked>
                <label for="non33">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 34</h6>
            <p>J’aime me perdre dans mes réflexions.</p>
            <div class="oui">
                <input type="radio" name="question34" id="oui34" value="1" required checked>
                <label for="oui34">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question34" id="non34" value="0" required>
                <label for="non34">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 35</h6>
            <p>Je m’oriente facilement dans un nouvel endroit.</p>
            <div class="oui">
                <input type="radio" name="question35" id="oui35" value="1" required checked>
                <label for="oui35">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question35" id="non35" value="0" required>
                <label for="non35">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 36</h6>
            <p>J’aime jouer d’un instrument de musique.</p>
            <div class="oui">
                <input type="radio" name="question36" id="oui36" value="1" required checked>
                <label for="oui36">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question36" id="non36" value="0" required>
                <label for="non36">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 37</h6>
            <p>J'aime les photographies de paysages illustrant la faune et la flore.</p>
            <div class="oui">
                <input type="radio" name="question37" id="oui37" value="1" required>
                <label for="oui37">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question37" id="non37" value="0" required checked>
                <label for="non37">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 38</h6>
            <p>J'aime les arts plastiques.</p>
            <div class="oui">
                <input type="radio" name="question38" id="oui38" value="1" required>
                <label for="oui38">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question38" id="non38" value="0" required checked>
                <label for="non38">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 39</h6>
            <p>J'aime les jeux impliquant des mots (scrabble, mots croisés, mots mystères...).</p>
            <div class="oui">
                <input type="radio" name="question39" id="oui39" value="1" required>
                <label for="oui39">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question39" id="non39" value="0" required checked>
                <label for="non39">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 40</h6>
            <p>Je suis ouvert aux opinions des autres.</p>
            <div class="oui">
                <input type="radio" name="question40" id="oui40" value="1" required>
                <label for="oui40">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question40" id="non40" value="0" required checked>
                <label for="non40">Non</label>
            </div>
        </div>

        <!-- ===================================================================================================== -->

        <div class="question">
            <h6>Question n° 41</h6>
            <p>J'aime écouter des émissions scientifiques.</p>
            <div class="oui">
                <input type="radio" name="question41" id="oui41" value="1" required checked>
                <label for="oui41">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question41" id="non41" value="0" required>
                <label for="non41">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 42</h6>
            <p>Je m'adapte facilement aux différentes personnes (âge, culture, valeurs...) et y trouve de l’intérêt.</p>
            <div class="oui">
                <input type="radio" name="question42" id="oui42" value="1" required>
                <label for="oui42">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question42" id="non42" value="0" required checked>
                <label for="non42">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 43</h6>
            <p>J'aime regarder des événements sportifs et en parler.</p>
            <div class="oui">
                <input type="radio" name="question43" id="oui43" value="1" required>
                <label for="oui43">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question43" id="non43" value="0" required checked>
                <label for="non43">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 44</h6>
            <p>Je peux facilement identifier divers styles de musique.</p>
            <div class="oui">
                <input type="radio" name="question44" id="oui44" value="1" required checked>
                <label for="oui44">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question44" id="non44" value="0" required>
                <label for="non44">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n°45 </h6>
            <p>Mes objectifs d'avenir sont bien définis.</p>
            <div class="oui">
                <input type="radio" name="question45" id="oui45" value="1" required checked>
                <label for="oui45">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question45" id="non45" value="0" required>
                <label for="non45">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 46</h6>
            <p>J'aime improviser et jouer au théâtre.</p>
            <div class="oui">
                <input type="radio" name="question46" id="oui46" value="1" required checked>
                <label for="oui46">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question46" id="non46" value="0" required>
                <label for="non46">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 47</h6>
            <p>Je collectionne des objets (animaux, insectes) se rapportant à la nature.</p>
            <div class="oui">
                <input type="radio" name="question47" id="oui47" value="1" required checked>
                <label for="oui47">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question47" id="non47" value="0" required>
                <label for="non47">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 48</h6>
            <p>J'aime connaître la signification des mots.</p>
            <div class="oui">
                <input type="radio" name="question48" id="oui48" value="1" required>
                <label for="oui48">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question48" id="non48" value="0" required checked>
                <label for="non48">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 49</h6>
            <p>J'aime expliquer aux autres ce que j'ai appris.</p>
            <div class="oui">
                <input type="radio" name="question49" id="oui49" value="1" required>
                <label for="oui49">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question49" id="non49" value="0" required checked>
                <label for="non49">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 50</h6>
            <p>J'ai de la facilité à identifier les émotions que je ressens.</p>
            <div class="oui">
                <input type="radio" name="question50" id="oui50" value="1" required checked>
                <label for="oui50">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question50" id="non50" value="0" required>
                <label for="non50">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 51</h6>
            <p>J'aime fredonner des mélodies.</p>
            <div class="oui">
                <input type="radio" name="question51" id="oui51" value="1" required checked>
                <label for="oui51">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question51" id="non51" value="0" required>
                <label for="non51">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 52</h6>
            <p>Quand j'ai les mains libres, j'aime jouer avec les objets qui sont à ma portée.</p>
            <div class="oui">
                <input type="radio" name="question52" id="oui52" value="1" required>
                <label for="oui52">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question52" id="non52" value="0" required checked>
                <label for="non52">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 53</h6>
            <p>J'ai de la facilité à organiser mentalement mes idées.</p>
            <div class="oui">
                <input type="radio" name="question53" id="oui53" value="1" required>
                <label for="oui53">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question53" id="non53" value="0" required checked>
                <label for="non53">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 54</h6>
            <p>J'ai toujours eu ou voulu avoir des animaux domestiques.</p>
            <div class="oui">
                <input type="radio" name="question54" id="oui54" value="1" required>
                <label for="oui54">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question54" id="non54" value="0" required checked>
                <label for="non54">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 55</h6>
            <p>Je saisis facilement les sentiments et les émotions des autres.</p>
            <div class="oui">
                <input type="radio" name="question55" id="oui55" value="1" required checked>
                <label for="oui55">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question55" id="non55" value="0" required>
                <label for="non55">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 56</h6>
            <p>J'adore dessiner.</p>
            <div class="oui">
                <input type="radio" name="question56" id="oui56" value="1" required>
                <label for="oui56">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question56" id="non56" value="0" required checked>
                <label for="non56">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 57</h6>
            <p>J'aime les casse-têtes.</p>
            <div class="oui">
                <input type="radio" name="question57" id="oui57" value="1" required>
                <label for="oui57">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question57" id="non57" value="0" required checked>
                <label for="non57">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 58</h6>
            <p>J'aime chanter sans musique (a capella).</p>
            <div class="oui">
                <input type="radio" name="question58" id="oui58" value="1" required checked>
                <label for="oui58">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question58" id="non58" value="0" required>
                <label for="non58">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 59</h6>
            <p>Je connais bien mes goûts et mes préférences.</p>
            <div class="oui">
                <input type="radio" name="question59" id="oui59" value="1" required checked>
                <label for="oui59">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question59" id="non59" value="0" required>
                <label for="non59">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 60</h6>
            <p>Je m’intéresse aux idées des autres.</p>
            <div class="oui">
                <input type="radio" name="question60" id="oui60" value="1" required checked>
                <label for="oui60">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question60" id="non60" value="0" required>
                <label for="non60">Non</label>
            </div>
        </div>

        <!-- ===================================================================================================== -->

        <div class="question">
            <h6>Question n° 61</h6>
            <p>J'aime installer des mangeoires pour les animaux sauvages ou les oiseaux.</p>
            <div class="oui">
                <input type="radio" name="question61" id="oui61" value="1" required checked>
                <label for="oui61">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question61" id="non61" value="0" required>
                <label for="non61">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 62</h6>
            <p>Je mémorise facilement ce que je lis.</p>
            <div class="oui">
                <input type="radio" name="question62" id="oui62" value="1" required checked>
                <label for="oui62">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question62" id="non62" value="0" required>
                <label for="non62">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 63</h6>
            <p>J'aime les énigmes, les jeux d'enquête et de stratégies.</p>
            <div class="oui">
                <input type="radio" name="question63" id="oui63" value="1" required>
                <label for="oui63">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question63" id="non63" value="0" required checked>
                <label for="non63">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 64</h6>
            <p>J'aime les arts parce que je peux travailler avec mes mains (dessin, couture...).</p>
            <div class="oui">
                <input type="radio" name="question64" id="oui64" value="1" required>
                <label for="oui64">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question64" id="non64" value="0" required checked>
                <label for="non64">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 65</h6>
            <p>J'aime écouter des histoires et des poèmes.</p>
            <div class="oui">
                <input type="radio" name="question65" id="oui65" value="1" required checked>
                <label for="oui65">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question65" id="non65" value="0" required>
                <label for="non65">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 66</h6>
            <p>Je suis sensible aux bruits de mon environnement (la pluie, la photocopieuse, l’horloge...).</p>
            <div class="oui">
                <input type="radio" name="question66" id="oui66" value="1" required>
                <label for="oui66">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question66" id="non66" value="0" required checked>
                <label for="non66">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 67</h6>
            <p>J'aime aller à la ferme.</p>
            <div class="oui">
                <input type="radio" name="question67" id="oui67" value="1" required checked>
                <label for="oui67">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question67" id="non67" value="0" required>
                <label for="non67">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 68</h6>
            <p>J'aime les cours de mathématique.</p>
            <div class="oui">
                <input type="radio" name="question68" id="oui68" value="1" required checked>
                <label for="oui68">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question68" id="non68" value="0" required>
                <label for="non68">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 69</h6>
            <p>J'aime pratiquer des sports.</p>
            <div class="oui">
                <input type="radio" name="question69" id="oui69" value="1" required checked>
                <label for="oui69">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question69" id="non69" value="0" required>
                <label for="non69">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 70</h6>
            <p>Presque toutes les questions m’inspirent une opinion précise et assurée.</p>
            <div class="oui">
                <input type="radio" name="question70" id="oui70" value="1" required>
                <label for="oui70">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question70" id="non70" value="0" required checked>
                <label for="non70">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 71</h6>
            <p>J'aide les gens à résoudre leurs problèmes et leurs conflits.</p>
            <div class="oui">
                <input type="radio" name="question71" id="oui71" value="1" required>
                <label for="oui71">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question71" id="non71" value="0" required checked>
                <label for="non71">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 72</h6>
            <p>J'ai un bon sens de l'observation.</p>
            <div class="oui">
                <input type="radio" name="question72" id="oui72" value="1" required>
                <label for="oui72">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question72" id="non72" value="0" required checked>
                <label for="non72">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 73</h6>
            <p>Je n'ai pas besoin de récompenses pour être motivé.</p>
            <div class="oui">
                <input type="radio" name="question73" id="oui73" value="1" required checked>
                <label for="oui73">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question73" id="non73" value="0" required>
                <label for="non73">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 74</h6>
            <p>Je comprends rapidement, je fais facilement des liens entre les idées.</p>
            <div class="oui">
                <input type="radio" name="question74" id="oui74" value="1" required checked>
                <label for="oui74">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question74" id="non74" value="0" required>
                <label for="non74">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 75</h6>
            <p>Je me sens bien lorsque je suis dans la forêt.</p>
            <div class="oui">
                <input type="radio" name="question75" id="oui75" value="1" required>
                <label for="oui75">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question75" id="non75" value="0" required checked>
                <label for="non75">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 76</h6>
            <p>Je trouve facilement des ressemblances entre des mélodies.</p>
            <div class="oui">
                <input type="radio" name="question76" id="oui76" value="1" required>
                <label for="oui76">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question76" id="non76" value="0" required checked>
                <label for="non76">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 77</h6>
            <p>J'aime imiter les gestes des autres.</p>
            <div class="oui">
                <input type="radio" name="question77" id="oui77" value="1" required>
                <label for="oui77">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question77" id="non77" value="0" required checked>
                <label for="non77">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 78</h6>
            <p>J'aime les sports d'équipe et les activités de coopération.</p>
            <div class="oui">
                <input type="radio" name="question78" id="oui78" value="1" required checked>
                <label for="oui78">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question78" id="non78" value="0" required>
                <label for="non78">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 79</h6>
            <p>À partir d'un plan, je m’imagine facilement le produit final.</p>
            <div class="oui">
                <input type="radio" name="question79" id="oui79" value="1" required checked>
                <label for="oui79">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question79" id="non79" value="0" required>
                <label for="non79">Non</label>
            </div>
        </div>

        <div class="question">
            <h6>Question n° 80</h6>
            <p>J'ai un grand intérêt pour les langues étrangères.</p>
            <div class="oui">
                <input type="radio" name="question80" id="oui80" value="1" required>
                <label for="oui80">Oui</label>
            </div>
            <div class="non">
                <input type="radio" name="question80" id="non80" value="0" required checked>
                <label for="non80">Non</label>
            </div>
        </div>

        <div class="subQuest">
            <input type="submit" value="Terminer le questionnaire">
        </div>
    </form>
</div>

<?php
$content = ob_get_clean();
require_once __DIR__ . "/template.php";
?>