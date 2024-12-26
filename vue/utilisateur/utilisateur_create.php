<?php
require_once "../composant/header.php"; 
require_once "../composant/nav.php"; 
?>


<div class="container">
    <h1 class="my-4">Créer un nouvel utilisateur</h1>
    
    <form method="POST" action="../../traitement/traitement_user.php">
        <div class="row">

            <div class="col-6">
                <div class="mb-3">
                    <label for="nom" class="form-label">Nom</label>
                    <input type="text" name="nom" id="nom" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="prenom" class="form-label">Prénom</label>
                    <input type="text" name="prenom" id="prenom" class="form-control">
                </div>
            </div>

            <div class="col-12">
                <div class="mb-3">
                    <label for="date_de_naissance" class="form-label">Date de naissance</label>
                    <input type="date" name="date_de_naissance" id="date_de_naissance" class="form-control">
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
            </div>
            <div class="col-6">
                <div class="mb-3">
                    <label for="mot_de_passe" class="form-label">Mot de passe</label>
                    <input type="password" name="mot_de_passe" id="mot_de_passe" class="form-control">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Valider</button>
    </form>
    
</div>



</body>
</html>