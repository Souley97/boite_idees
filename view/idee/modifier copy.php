<?php
require_once '../../model/db.php';
$conn = connect(); // Assurez-vous de définir la connexion avant de l'utiliser

if (isset($_POST['updateIdee'])) {
    // Valider et nettoyer les données
    $id = intval($_POST['id']);
    $titre = htmlspecialchars($_POST['titre']);
    $description = htmlspecialchars($_POST['description']);
    // $id_utilisateur = intval($_POST['id_utilisateur']);
    // $id_categorie = intval($_POST['id_categorie']);

    // Mise à jour avec une requête préparée
    $query = "UPDATE Idee SET titre = ?, description = ? WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Exécution de la requête avec gestion des erreurs
    if ($stmt->execute([$titre, $description, $id])) {
        // Redirection en cas de succès
        header('Location: index.php');
        exit();
    } else {
        // Gestion de l'erreur en cas d'échec
        echo "Erreur lors de la mise à jour de l'idée.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier une Idée</title>
    <!-- Ajout du lien Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            padding: 20px;
        }

        h1 {
            color: #333;
        }
    </style>
</head>
<body>

<?php
// Récupérez l'identifiant de l'idée à mettre à jour depuis l'URL ou d'une autre manière appropriée
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

// Vous pouvez également récupérer les détails de l'idée à partir de la base de données pour remplir le formulaire
// Ceci est une approche simplifiée pour l'exemple
$idee = []; // Récupérez les détails de l'idée depuis la base de données en fonction de l'id
$sql = $conn->prepare("SELECT * FROM Idee WHERE id = :id");
$sql->execute(array(':id' => $id));
$idee = $sql->fetch(PDO::FETCH_ASSOC);
?>

<div class="container">
    <h1 class="mt-5 mb-4">Modifier une Idée</h1>

    <form action="modifier.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">

        <div class="mb-3">
            <label for="titre" class="form-label">Titre :</label>
            <input type="text" id="titre" name="titre" class="form-control" value="<?php echo isset($idee['titre']) ? htmlspecialchars($idee['titre']) : ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description :</label>
            <textarea id="description" name="description" class="form-control" required><?php echo isset($idee['description']) ? htmlspecialchars($idee['description']) : ''; ?></textarea>
        </div>

        <!-- Champs pour la modification de l'utilisateur et de la catégorie -->
        <!--
        <div class="mb-3">
            <label for="id_utilisateur" class="form-label">ID Utilisateur :</label>
            <input type="text" id="id_utilisateur" name="id_utilisateur" class="form-control" value="<?php echo isset($idee['id_utilisateur']) ? $idee['id_utilisateur'] : ''; ?>" required>
        </div>

        <div class="mb-3">
            <label for="id_categorie" class="form-label">ID Catégorie :</label>
            <input type="text" id="id_categorie" name="id_categorie" class="form-control" value="<?php echo isset($idee['id_categorie']) ? $idee['id_categorie'] : ''; ?>" required>
        </div>
        -->

        <button type="submit" name="updateIdee" class="btn btn-primary">Mettre à jour</button>
    </form>
</div>

<!-- Ajout des scripts Bootstrap -->


    <!-- Ajout de Bootstrap JS et Popper.js (nécessaires pour certaines fonctionnalités de Bootstrap) -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
