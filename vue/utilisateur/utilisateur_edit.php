<?php 
require_once "../composant/header.php"; 
require_once "../composant/nav.php"; 
require_once "../../functions/db.php";

$pdo = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {

    $id = $_GET['id'];
    $query = $pdo->prepare('SELECT * FROM utilisateur WHERE id = :id');
    $query->bindValue('id', $id, PDO::PARAM_INT);
    $query->execute();
    $utilisateur = $query->fetch(PDO::FETCH_ASSOC);
    if (!$utilisateur) {
        echo "Utilisateur non trouvé.";
        exit();
    }
} else {
echo "ID utilisateur non fourni.";
exit();
}
?>


<div class="container">
    <h1 class="my-4">Modifier un utilisateur</h1>

    <form action="../../traitement/traitement_user.php" method="POST">
    <input type="hidden" name="action" value="edit">
    <input type="hidden" name="id" value="<?= $utilisateur['id'] ?>">


        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" value="<?= $utilisateur['nom'] ?>" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="prenom" value="<?= $utilisateur['prenom'] ?>" class="form-control">
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" value="<?= $utilisateur['email'] ?>" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="date_de_naissance" class="form-label">Date de naissance</label>
                    <input type="date" name="date_de_naissance" id="date_de_naissance" value="<?= $utilisateur['date_de_naissance'] ?>" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
</div>


</body>
</html>