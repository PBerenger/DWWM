<?php
session_start();
require 'auth.php';


try {
    // permettre d'acceder à la base de donnée
    $pdo = getPDOConnection();
    // prépare une requette SQL pour la base de donnée
    $stmt = $pdo->prepare('SELECT * from users');
    // execute la requette
    $stmt->execute();
    //fetch_assoc vérifie s'il y a des doublons
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

}catch(PDOException $e) {
    die('erreur de la BDD : ' . $e->getMessage());
}

?>

<table>
    <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prenom</th>
        <th>Email</th>
        <th>Télephone</th>
        <th>Action</th>
    </tr>
    <?php foreach($users as $user): ?>
        <tr>
            <td><?= $user['id'] ?></td>
            <td><?= $user['nom'] ?></td>
            <td><?= $user['prenom'] ?></td>
            <td><?= $user['email'] ?></td>
            <td><?= $user['telephone'] ?></td>
            <td><a href="update.php?id=<?php echo $user['id'];?>">Modifier</a></td>
            </tr>
    <?php endforeach; ?>
</table>

<?php
$content = ob_get_clean();
$titre = 'Liste des utilisateurs';
require 'template.php';
?>