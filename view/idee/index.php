<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Idées</title>
    <!-- Ajout de Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="container mt-5">
<?php 

include "../navbar.php";


?>

    <div class="card">
        <div class="card-header">
            <h1 class="mb-0">Liste des Idées</h1>
            <a href="ajouter.php" class="btn btn-primary btn-sm"> Ajouter</a>
        </div>
        
        <div class="card-body">
            <!-- Tableau Bootstrap pour afficher la liste des idées -->
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Utilisateur</th>
                        <th>Catégorie</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Boucle pour afficher chaque idée -->
                    <?php 
                    include("../../model/idee_db.php");
                    $idees = listeIdee()->fetchAll();
                    foreach ($idees as $idee){ ?>
                        <tr>
                            <td><?=$idee['id']?></td>
                            <td><?=$idee['titre']?></td>
                            <td><?=$idee['description']?></td>
                            <td><?=$idee['statut']?></td>
                            <td><?=$idee['username']?></td>
                            <td><?=$idee['categorie']?></td>
                            <td>
                                <!-- Boutons d'action (par exemple, Modifier et Supprimer) -->
                                <a href="modifier.php?id=<?php echo $idee['id']; ?>" class="btn btn-primary btn-sm">Modifier</a>
                                <a href="supprimer.php?id=<?php echo $idee['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette idée ?')">Supprimer</a>
                                <a href="modifStatut.php?id=<?php echo $idee['id']; ?>" class="btn back_btn btn-sm">Approuver</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Ajout de Bootstrap JS et Popper.js (nécessaires pour certaines fonctionnalités de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
