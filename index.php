<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Boîte à Idées - Accueil</title>
    <!-- Ajout du lien Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8UEBsh3vdAeBbqql2r2HjZnMlHLgdaDgeG9YFqqhAvGNpNeJiycPW9zJTmOS0U" crossorigin="anonymous">
    <style>
        body {
            padding-top: 60px; /* Ajustement pour la navbar fixe en haut */
        }

        .jumbotron {
            background-color: #f8f9fa; /* Couleur de fond */
            padding: 2rem 1rem; /* Espace intérieur */
        }

        .card {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>

<!-- Navbar Bootstrap -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Boîte à Idées</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <!-- <li class="nav-item">
                    <a class="nav-link" href="#">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/liste_categories.php">Liste Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/liste_idees.php">Liste Idées</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../view/idees_validees.php">Idées Validées</a>
                </li> -->
            </ul>
        </div>
        <a href="login.php" class="navbar-text">
            connexion
            </a>
    </div>
</nav>

<!-- Contenu principal -->
<div class="container">
    <div class="jumbotron">
        <h1 class="display-4">Bienvenue dans la Boîte à Idées</h1>
        <p class="lead">Partagez, collaborez et faites grandir vos idées ensemble.</p>
    </div>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Partagez vos Idées</h5>
                    <p class="card-text">Ajoutez vos idées créatives et partagez-les avec la communauté.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Collaboration</h5>
                    <p class="card-text">Collaborez avec d'autres utilisateurs en commentant et en contribuant à leurs idées.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Validation</h5>
                    <p class="card-text">Validez les idées les plus prometteuses pour les mettre en avant.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Ajout des scripts Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-xmMPbMAdLEi8VPPnGUdBC2rYjdbj5fjjxZlDeYVr87VAqWTbSMl6IlZ+nUbEG6zF" crossorigin="anonymous"></script>

</body>
</html>
