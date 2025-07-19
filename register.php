<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Inscription - Educ'easy</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Salsa&display=swap" rel="stylesheet" />

    <!-- Style principal du site -->
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar sticky-top navbar-expand-sm shadow" style="background-color: #ffffff">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php">
            <img src="assets/css/images/logo.PNG" alt="Logo" width="40" height="40" class="d-inline-block align-text-top" />
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto sm-2 mb-lg-0">
                <li class="titre"><strong>Educ'easy</strong></li>
                <li class="nav-item">
                    <button type="button" class="ctaNav">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </button>
                </li>
                <li class="nav-item">
                    <button type="button" class="ctaNav">
                        <a class="nav-link" href="article.php">Article</a>
                    </button>
                </li>

                <?php if (isset($_SESSION['username'])): ?>
                    <li class="nav-item">
                        <button type="button" class="ctaNav">
                            <a class="nav-link" href="create.php">Ecrire</a>
                        </button>
                    </li>
                <?php endif; ?>
            </ul>

            <!-- Zone de droite : connexion / déconnexion -->
            <div class="nav-item d-flex gap-2">
                <?php if (isset($_SESSION['username'])): ?>
                    <span class="navbar-text me-2">Bonjour, <?= htmlspecialchars($_SESSION['username']) ?> !</span>
                    <button type="button" class="ctaNav">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </button>
                <?php else: ?>
                    <button type="button" class="ctaNav auth">
                        <a class="nav-link" href="login.php">Login</a>
                    </button>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>

<!-- FORMULAIRE D’INSCRIPTION -->
<main class="container mt-5 mb-5" style="max-width: 450px;">
    <h2 class="text-center mb-4">Créer un compte</h2>

    <form method="POST" action="register_handler.php" class="shadow p-4 rounded" style="background-color: 
#fee9c6">
        <div class="mb-3">
            <label for="username" class="form-label">Nom d'utilisateur</label>
            <input type="text" class="form-control" name="username" id="username" required />
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" name="password" id="password" required />
        </div>

        <button type="submit" class="cta w-100">S'inscrire</button>
    </form>

    <div class="text-center mt-3">
        <small>Déjà un compte ? <a class="simple" href="login.php">Se connecter</a></small>
    </div>
</main>

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

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

