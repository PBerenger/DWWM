<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Questionnaire de Personnalité</title>
</head>
<body>
    <h1>Questionnaire de Personnalité</h1>
    <form action="result.php" method="post">
        <p>1. Vous aimez travailler en équipe :</p>
        <input type="radio" name="q1" value="5"> Toujours<br>
        <input type="radio" name="q1" value="3"> Parfois<br>
        <input type="radio" name="q1" value="1"> Jamais<br>

        <p>2. Vous préférez planifier à l'avance :</p>
        <input type="radio" name="q2" value="5"> Toujours<br>
        <input type="radio" name="q2" value="3"> Parfois<br>
        <input type="radio" name="q2" value="1"> Jamais<br>

        <p>3. Vous êtes à l'aise pour parler en public :</p>
        <input type="radio" name="q3" value="5"> Toujours<br>
        <input type="radio" name="q3" value="3"> Parfois<br>
        <input type="radio" name="q3" value="1"> Jamais<br>

        <input type="submit" value="Soumettre">
    </form>
</body>
</html>
