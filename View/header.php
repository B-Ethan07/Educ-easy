<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:ital,wght@0,200..1000;1,200..1000&display=swap" rel="stylesheet">
    <link
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
            rel="stylesheet"
            integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
            crossorigin="anonymous"
    />

    <link rel="stylesheet" href="css/style.css" />
    <link rel="stylesheet" href="css/popup.css">
    <title>Educ'easy</title>
</head>
<body>
<nav class="navbar sticky-top navbar-expand-sm shadow" style="background-color: #ffffff">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03"
                aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="?action=home">
            <img src="images/logo.PNG" alt="Logo" width="40" height="40"
                 class="d-inline-block align-text-top" />
        </a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
            <ul class="navbar-nav me-auto sm-2 mb-lg-0">
                <li class="titre"><strong>Educ'easy</strong></li>
                <li class="nav-item">
                    <a class="nav-link active btn btn-link ctaNav" aria-current="page" href="?action=home">Home</a>
                </li>

                <?php if (isset($_SESSION['user'])): ?>
                    <li class="nav-item">
                        <a class="nav-link btn ctaNav" href="?action=createArticle">Écrire</a>
                    </li>
                <?php endif; ?>
            </ul>

            <div class="nav-item d-flex gap-2">
                <?php if (!isset($_SESSION['user'])): ?>
                    <a class="nav-link ctaNav" href="?action=register">Register</a>
                    <a class="nav-link ctaNav" href="?action=login">Login</a>
                <?php else: ?>
                    <!-- Ici on peut afficher un lien vers profil ou déconnexion -->
                    <a class="nav-link ctaNav" href="?action=logout">Logout</a>
                <?php endif; ?>
            </div>

            <div class="d-flex align-items-center text-dark">
                <?php if (isset($_SESSION['user'])): ?>
                    <span class="me-3">Bonjour, <?= htmlspecialchars($_SESSION['user']['username']) ?></span>
                <?php endif; ?>
            </div>
        </div>
    </div>
</nav>


