<?php 
session_start();

require_once "../composant/header.php";
require_once "../composant/nav.php";

require_once "../../functions/db.php";

$pdo = getConnection();

$query = $pdo->query('SELECT * FROM utilisateur');
$utilisateurs = $query->fetchAll(PDO::FETCH_ASSOC);

?>

<div class="container my-5">
    <div class="my-4">
        <h1>Liste des utilisateurs</h1>
        <a href="utilisateur_create.php" class="btn btn-primary">Créer un nouvel utilisateur</a>    
    </div>

    <?php if (isset($_SESSION['message'])) : ?>
        <div class="alert alert-success" role="alert">
            <?= $_SESSION['message']; ?>
        </div>
    <?php endif ?>

    <table class="table">
        <thead>
            <tr>
                <th scope="col">Prénom Nom</th>
                <th scope="col">Email</th>
                <th scope="col">Date de naissance</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($utilisateurs as $utilisateur) { ?>
                <tr>
                    <th><a href="utilisateur_detail.php?id=<?= $utilisateur['id'] ?>"><?= $utilisateur['prenom'] . ' ' . $utilisateur['nom']; ?></a></th>
                    <td><?= $utilisateur['email']; ?></td>
                    <td><?= date('d/m/Y', strtotime($utilisateur['date_de_naissance'])); ?></td>
                    <td>

                        <a href="utilisateur_edit.php?action=edit&id=<?= $utilisateur['id'] ?>" class="btn btn-primary">Modifier</a>

                        <form action="../../traitement/traitement_user.php" method="POST" style="display:inline;">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= $utilisateur['id'] ?>">
                            <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>                    
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>