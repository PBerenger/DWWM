<?php ob_start(); ?>

<h2>HELLO</h2>

<p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Recusandae in fugiat ratione quis, deserunt neque mollitia numquam sed! Alias incidunt esse voluptatum eveniet doloribus laborum, accusamus autem reprehenderit quibusdam odio?</p>

<h2>bonjour</h2>

<div class="form1">
    <form action="action.php" method="post">
       <label>Votre nom :</label>
       <input name="nom" id="nom" type="text" />
    
       <label>Votre âge :</label>
       <input name="age" id="age" type="number" /></p>
    
       <button type="submit">Valider</button>
    </form>
</div>



<?php
    $content = ob_get_clean();
    $titre = "Mon Titre d'accueil";
    require "template.php";
?>