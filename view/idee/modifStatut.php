<?php
require_once '../../model/db.php';
$conn = connect(); // Assurez-vous de définir la connexion avant de l'utiliser

if (isset($_GET['id'])) {
    // Récupérez l'ID de l'idée à modifier depuis l'URL
    $idIdee = intval($_GET['id']);

    // Mise à jour du statut avec une requête préparée
    $query = "UPDATE Idee SET statut = 'masque' WHERE id = ?";
    $stmt = $conn->prepare($query);

    // Exécution de la requête avec gestion des erreurs
    if ($stmt->execute([$idIdee])) {
        // Redirection vers la page d'où provient l'utilisateur
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit();
    } else {
        // Gestion de l'erreur en cas d'échec
        echo "Erreur lors de la mise à jour du statut de l'idée.";
    }
}
?>
