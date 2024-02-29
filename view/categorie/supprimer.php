<?php
require_once '../../model/db.php';
$conn = connect(); // Assurez-vous de définir la connexion avant de l'utiliser

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    if (isset($_POST['deleteIdee'])) {
        // Suppression avec une requête préparée
        $query = "DELETE FROM Categorie WHERE id = ?";
        $stmt = $conn->prepare($query);

        // Exécution de la requête avec gestion des erreurs
        if ($stmt->execute([$id])) {
            // Redirection en cas de succès
            header('Location: index.php');
            exit();
        } else {
            // Gestion de l'erreur en cas d'échec
            echo "Erreur lors de la suppression de l'categorie.";
        }
    }

    // Récupérez les détails de l'categorie à supprimer depuis la base de données
    $query = "SELECT * FROM Categorie WHERE id = ?";
    $stmt = $conn->prepare($query);
    $stmt->execute([$id]);
    $idee = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($idee) {
        // Affichez les détails de l'categorie et le formulaire de confirmation de suppression
        ?>
       <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Supprimer une categorie</title>
    <!-- Ajout de Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body class="container mt-5">

    <div class="card">
        <div class="card-header">
            <h1 class="mb-0">Supprimer l'categorie</h1>
        </div>
        <div class="card-body">
            <p class="lead">Êtes-vous sûr de vouloir supprimer cette categorie ?</p>
            <p><strong>Titre:</strong> <?php echo htmlspecialchars($idee['titre']); ?></p>
            <p><strong>Description:</strong> <?php echo htmlspecialchars($idee['description']); ?></p>

            <form action="supprimer.php?id=<?php echo $id; ?>" method="post">
                <button class="btn btn-danger" type="submit" name="deleteIdee">Confirmer la suppression</button>
            </form>
        </div>
    </div>

    <!-- Ajout de Bootstrap JS et Popper.js (nécessaires pour certaines fonctionnalités de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>

        <?php
    } else {
        // L'categorie n'a pas été trouvée
        echo "L'categorie avec l'ID spécifié n'a pas été trouvée.";
    }
} else {
    // L'ID n'est pas spécifié dans l'URL
    echo "L'ID de l'categorie n'est pas spécifié.";
}
?>
