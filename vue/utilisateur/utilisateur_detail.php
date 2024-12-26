<?php
require_once "../composant/header.php"; 
require_once "../composant/nav.php"; 
require_once "../../functions/db.php";

$pdo = getConnection();

    $id = $_GET['id'];
    $query = $pdo->prepare('SELECT * FROM utilisateur WHERE id = :id');
    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->execute();
    $utilisateur = $query->fetch(PDO::FETCH_ASSOC);
    
    if (!$utilisateur) {
        echo "Utilisateur non trouvé.";
        exit();
    }
?>

<div class="container my-5">
    <h1>Détails de l'utilisateur</h1>
    <p><strong>Nom :</strong> <?= $utilisateur['nom']; ?></p>
    <p><strong>Prénom :</strong> <?= $utilisateur['prenom']; ?></p>
    <p><strong>Email :</strong> <?= $utilisateur['email']; ?></p>
    <p><strong>Date de naissance :</strong> <?= date('d/m/Y', strtotime($utilisateur['date_de_naissance'])); ?></p>
    <a href="utilisateur_list.php" class="btn btn-secondary">Retour à la liste</a>
</div>

</body>
</html>