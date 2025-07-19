<?php
session_start();

// Redirige si déjà connecté
if (isset($_SESSION['username'])) {
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Connexion - Educ'easy</title>

    <!-- Fonts & Styles -->
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar sticky-top navbar-expand-sm shadow" style="background-color: #ffffff">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <a class="navbar-brand" href="index.php">
            <img src="assets/css/images/logo.PNG" alt="Logo" width="40" height="40" class="d-inline-block align-text-top" />
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="titre"><strong>Educ'easy</strong></li>
            </ul>
            <div class="d-flex">
                <button type="button" class="ctaNav auth me-2">
                    <a class="nav-link" href="register.php">Inscription</a>
                </button>
            </div>
        </div>
    </div>
</nav>

<!-- FORMULAIRE DE CONNEXION -->
<main class="container mt-5 mb-5" style="max-width: 450px;">
    <h2 class="text-center mb-4">Connexion</h2>

    <form method="POST" action="login_handler.php" class="shadow p-4 rounded" style="background-color: 
#fee9c6">
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" name="username" id="username" required />
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" required />
        </div>

        <button type="submit" class="cta w-100">Se connecter</button>
    </form>

    <div class="text-center mt-3">
        <small>Pas encore de compte ? <a class="simple" href="register.php">S'inscrire</a></small>
    </div>
</main>

  <!-- FOOTER -->
<footer>
  <img src="assets/css/images/logo.PNG" alt="logo" width="40" height="40" />
  <h6>Mentions légales - CGU</h6>
  <ul style="list-style: none; padding-left: 0; display: flex; gap: 10px;">
    <li>
      <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">
        <img src="assets/css/images/facebook.svg" alt="facebook" width="20" height="20" />
      </a>
    </li>
    <li>
      <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer">
        <img src="assets/css/images/twitter.svg" alt="twitter" width="20" height="20" />
      </a>
    </li>
    <li>
      <a href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer">
        <img src="assets/css/images/linkedin.svg" alt="linkedin" width="20" height="20" />
      </a>
    </li>
  </ul>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
