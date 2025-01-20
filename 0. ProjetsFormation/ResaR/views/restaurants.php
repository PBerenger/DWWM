<?php
require_once './mydbConnection/Database.php';

$pdo = MyDbConnection::getInstance();
$stmt = $pdo->query('SELECT * FROM restaurants');
$restaurants = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<h2>Restaurants</h2>
<ul>
    <?php foreach ($restaurants as $restaurant): ?>
        <li>
            <strong><?= htmlspecialchars($restaurant['name']); ?></strong><br>
            Adresse : <?= htmlspecialchars($restaurant['address']); ?><br>
            Téléphone : <?= htmlspecialchars($restaurant['phone']); ?><br>
            <a href="details.php?id=<?= $restaurant['id']; ?>">Voir les détails</a>
        </li>
    <?php endforeach; ?>
</ul>

<?php
$content = ob_get_clean();
// require_once __DIR__ . "/template.php";
?>