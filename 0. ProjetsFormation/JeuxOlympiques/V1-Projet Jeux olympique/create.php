<?php
ob_start();
require_once("auth.php");
require_once ('functions.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifier si toutes les données nécessaires sont présentes
    if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp'], $_POST['mdp_confirm'], $_POST['dateNaissance'], $_POST['genre'], $_POST['phone'], $_POST['roleDescription'])) {
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $mdp = $_POST['mdp'];
        $mdp_confirm = $_POST['mdp_confirm'];
        $dateNaissance = $_POST['dateNaissance'];
        $genre = $_POST['genre'];
        $phone = $_POST['phone'];
        $roleDescription = $_POST['roleDescription'];

        // Vérifier que les mots de passe correspondent
        if ($mdp !== $mdp_confirm) {
            phpAlert("Les mots de passe ne correspondent pas.");
        } else {
            // Vérifier la complexité du mot de passe
            $passwordCheck = verifyPassword($mdp);
            if ($passwordCheck !== true) {
                phpAlert($passwordCheck);
            } else {
                try {
                    // Vérifier si l'email existe déjà dans la base de données
                    $pdo = getPDOConnection(); // Assurez-vous d'avoir une fonction getPDOConnection() qui retourne l'objet PDO avec la connexion établie
                    // Hasher le mot de passe (le crypter)
                    $mdp = password_hash($mdp, PASSWORD_DEFAULT);

                    $stmt = $pdo->prepare('SELECT userEmail FROM users WHERE userEmail = ?');
                    $stmt->execute([$email]);
                    $existingUser = $stmt->fetch();

                    // Vérifier si le mail existe déjà dans la BDD
                    if ($existingUser) {
                        phpAlert("Email déjà existant dans la base de données.");
                    } else {
                        // Vérifier si le rôle existe déjà dans la table 'userroles'
                        $stmt = $pdo->prepare('SELECT role_id FROM userroles WHERE roleDescription = ?');
                        $stmt->execute([$roleDescription]);
                        $role = $stmt->fetch();

                        if (!$role) {
                            // Insérer le nouveau rôle dans la table 'userroles'
                            $stmt = $pdo->prepare('INSERT INTO userroles(roleDescription) VALUES (?)');
                            $stmt->execute([$roleDescription]);

                            // Récupérer l'ID du rôle inséré
                            $role_id = $pdo->lastInsertId();
                        } else {
                            $role_id = $role['role_id'];
                        }

                        // Insérer un nouvel utilisateur dans la table 'users'
                        $stmt = $pdo->prepare('INSERT INTO users(userLastName, userFirstName, UserEmail, userPassword, userDateBirth, userGender, userPhone, role_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
                        $stmt->execute([$nom, $prenom, $email, $mdp, $dateNaissance, $genre, $phone, $role_id]);

                        phpAlert("Utilisateur ajouté avec succès.");
                    }
                } catch (PDOException $e) {
                    phpAlert("Erreur de base de données : " . $e->getMessage());
                }
            }
        }
    } else {
        phpAlert("Tous les champs ne sont pas remplis.");
    }
} else {
    echo '<div style="text-align: right; color: red; font-style: bold; margin-right: 19%;">Remplissez tous les champs.</div>';
}

?>
<div class="containerFormInsc">
    <h1 class="upElement">INSCRIPTION</h1>
    <div class="form-container">
        <form action="create.php" method="POST">
            <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom" required>
    
            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="prenom" required>
    
            <label for="email">Email : </label>
            <input type="email" name="email" id="email" required>

            <div class="pswButtons">
                <label for="mdp">Mot de passe :</label>
                <button type="button" id="showConditionsButton">?</button>
            </div>
            <input type="password" name="mdp" id="mdp" required>
            
            
            <div class="validator" id="passwordConditions">
                <p>Le mot de passe doit respecter ces conditions :</p>
                <ul>
                    <li id="long" class="invalid">- faire au moins <b>8 caractères de long</b></li>
                    <li id="minusc" class="invalid">- contenir au moins une <b>minuscule</b></li>
                    <li id="majusc" class="invalid">- contenir au moins une <b>majuscule</b></li>
                    <li id="spec" class="invalid">- contenir au moins un <b>caractère spécial ($@!%*#?&)</b></li>
                    <li id="chiffre" class="invalid">- contenir au moins <b>un chiffre</b></li>
                    <li id="corresp" class="invalid">- les mots de passe doivent <b>correspondre</b></li>
                </ul>
            </div>
    
            <label for="mdp_confirm">Confirmer le mot de passe :</label>
            <input type="password" name="mdp_confirm" id="mdp_confirm" required>
    
            <label for="dateNaissance">Votre date de naissance :</label>
            <input type="date" name="dateNaissance" id="datenaissance" required>
    
            <label for="genre">Votre genre</label>
            <select name="genre" id="genre" required>
                <option value="Homme">Homme</option>
                <option value="Femme">Femme</option>
            </select>
    
            <label for="phone">Téléphone: </label>
            <input type="text" name="phone" id="phone" required>
    
            <label for="roleDescription">Rôle: </label>
            <select name="roleDescription" id="roleDescription" required>
                <option value="admin">Admin</option>
                <option value="non-admin">Non-Admin</option>
            </select>
    
            <input class="add" type="submit" value="Ajouter">
        </form>
    </div>
</div>

<script>
    src = "js.js"
</script>

<?php
$content = ob_get_clean();
require "template.php";
?>