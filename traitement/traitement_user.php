<?php
session_start();
require_once "../functions/db.php";

// Tentative de connexion à la base de données
$pdo = getConnection();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {
    $action = $_POST['action'];

    // -------------------------
    // SUPPRESSION D'UN UTILISATEUR
    // -------------------------
    if ($action === 'delete') {
        $id = $_POST['id'];
        $query = $pdo->prepare('DELETE FROM utilisateur WHERE id = :id');
        $query->bindValue('id', $id);
        $query->execute();

        // Ajout d'un message
        $_SESSION['message'] = "L'utilisateur a été supprimé avec succès";

        // Redirection après suppression
        header('Location: ../vue/utilisateur/utilisateur_list.php');
        exit();
    }



    // -------------------------
    // MODIFICATION D'UN UTILISATEUR
    // -------------------------
    if ($action === 'edit') {
        $id = $_POST['id'];
        $nom = $_POST['nom'];
        $prenom = $_POST['prenom'];
        $email = $_POST['email'];
        $date_de_naissance = $_POST['date_de_naissance'];

        try {
            $query = $pdo->prepare(
                'UPDATE utilisateur 
                SET nom = :nom, prenom = :prenom, email = :email, date_de_naissance = :date_de_naissance
                WHERE id = :id'
            );
            $query->bindValue('id', $id, PDO::PARAM_INT);
            $query->bindValue('nom', $nom);
            $query->bindValue('prenom', $prenom);
            $query->bindValue('email', $email);
            $query->bindValue('date_de_naissance', $date_de_naissance);
            $query->execute();

            // Ajout d'un message
            $_SESSION['message'] = "L'utilisateur a été modifié avec succès";

            // Redirection après modification
            header('Location: ../vue/utilisateur/utilisateur_list.php');
            exit();
        } catch (PDOException $e) {
            die('Erreur lors de la mise à jour : ' . $e->getMessage());
        }
    }
}



// -------------------------
// CREATION D'UN UTILISATEUR
// -------------------------
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$email = $_POST['email'];
$date_de_naissance = $_POST['date_de_naissance'];
$mot_de_passe = $_POST['mot_de_passe'];

// Vérifie que tous les champs sont remplis
if (empty($nom) || empty($prenom) || empty($email) || empty($mot_de_passe) || empty($date_de_naissance)) {
    die('Tous les champs sont requis.');
}

try {
    // Préparation et exécution de la requête SQL
    $query = $pdo->prepare(
        'INSERT INTO utilisateur (nom, prenom, email, mot_de_passe, date_de_naissance)
    VALUES (:nom, :prenom, :email, :mot_de_passe, :date_de_naissance)'
    );
    $query->bindValue('nom', $nom);
    $query->bindValue('prenom', $prenom);
    $query->bindValue('email', $email);
    $query->bindValue('mot_de_passe', $mot_de_passe);
    $query->bindValue('date_de_naissance', $date_de_naissance);
    $query->execute();

    // Ajout d'un message
    $_SESSION['message'] = "L'utilisateur a été créé avec succès";

    // Redirection si tout est ok
    header('Location: ../vue/utilisateur/utilisateur_list.php');
    exit();
} catch (PDOException $e) {
    // Affiche un message en cas d'erreur SQL
    die("Erreur lors de l'insertion : " . $e->getMessage());
}

