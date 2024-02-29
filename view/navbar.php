<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Votre Application</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="../categorie">Liste Catégories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../idee">Liste Idées</a>
                </li>
				<li class="nav-item">
                    <a class="nav-link" href="../idee/listMasque.php">Liste Idées Maque</a>
                </li>
                <li class="nav-item">
                    <!-- <a class="nav-link" href="../view/idees_validees.php">Idées Validées</a> -->
                </li>
            </ul>
        </div>
       
      <div>
	  <span class="navbar-text">
        <?php echo $_SESSION['username']; ?>
        </span>
	  </div>
	  <div>
        <span class="navbar-text">
        <a href="./../../logout.php">Se Déconnecter</a>
        </span>
    </div> </div>
</nav>