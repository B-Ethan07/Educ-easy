<?php

session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

$errors = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = trim($_POST['titreArticle'] ?? '');
    $auteur = trim($_POST['auteur'] ?? '');
    $content = trim($_POST['content'] ?? '');
    $date = date('Y-m-d');
    $theme = trim($_POST['theme'] ?? '');

    // Validate
    if (empty($titre) || strlen($titre) > 255) {
        $errors[] = "Le titre est obligatoire et doit être < 255 caractères.";
    }
    if (empty($auteur) || strlen($auteur) > 100) {
        $errors[] = "L'auteur est obligatoire et doit être < 100 caractères.";
    }
    if (empty($content)) {
        $errors[] = "Le contenu est obligatoire.";
    }
    if (empty($date)) {
        $errors[] = "La date est obligatoire.";
    }
    if (empty($theme)) {
        $errors[] = "Le thème est obligatoire.";
    }

    if (empty($errors)) {
        require 'config.php';
        $pdo = new PDO(DSN, USER, PASS);

        $imageData = null;
        if (!empty($_FILES['image']['tmp_name'])) {
            $imageData = file_get_contents($_FILES['image']['tmp_name']);
        }

        $stmt = $pdo->prepare("INSERT INTO Story (title, theme, author, date, content, image)
            VALUES (:title, :theme, :author, :date, :content, :image)");

        $stmt->bindValue(':title', $titre, PDO::PARAM_STR);
        $stmt->bindValue(':theme', $theme, PDO::PARAM_STR);
        $stmt->bindValue(':author', $auteur, PDO::PARAM_STR);
        $stmt->bindValue(':date', $date, PDO::PARAM_STR);
        $stmt->bindValue(':content', $content, PDO::PARAM_STR);
        $stmt->bindValue(':image', $imageData, PDO::PARAM_LOB);

        if ($stmt->execute()) {
            header('Location: article.php');
            exit;
        } else {
            $errors[] = "Erreur lors de l'insertion en base.";
        }
    }

    // Display errors
    foreach ($errors as $e) {
        echo "<p style='color:red'>" . htmlentities($e) . "</p>";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Salsa&display=swap" rel="stylesheet">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="assets/css/style.css" />
</head>
<body>
  <nav
      class="navbar sticky-top navbar-expand-sm shadow"
      style="background-color: #ffffff"
    >
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarTogglerDemo03"
          aria-controls="navbarTogglerDemo03"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="index.php"
          ><img
            src="assets\css\images\logo.PNG"
            alt="Logo"
            width="40"
            height="40"
            class="d-inline-block align-text-top"
        /></a>

        <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
          <ul class="navbar-nav me-auto sm-2 mb-lg-0">
            <li class="titre"><strong>EDUC'EASY</strong></li>
            <li class="nav-item">
              <button type="button" class="ctaNav">
                <a class="nav-link active" aria-current="page" href="index.php"
                  >Home</a
                >
              </button>
            </li>
            <li class="nav-item">
              <button type="button" class="ctaNav">
                <a class="nav-link" href="article.php">Article</a>
              </button>
            </li>
            <li class="nav-item">
              <button type="button" class="ctaNav">
                <a class="nav-link" href="create.php">Ecrire</a>
              </button>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <main class="container mt-5 mb-5" style="max-width: 450px;">
  <h1 style= "text-align: center" class="text-center mb-4">Créer un article</h1>
        <form method="POST" action="create.php" class="shadow p-4 rounded" enctype="multipart/form-data" class="mx-auto w-100" style="background-color: 
#fee9c6;">

      <!-- Titre input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="titreArticle">Titre:</label>
        <input
          type="text"
          id="titreArticle"
          name="titreArticle"
          placeholder="Titre de l'Article.."
          class="form-control"
          maxlenght="255"
          required
        />
      </div>      
      <!-- Auteur input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="auteur">Auteur:</label>
        <input
          type="auteur"
          id="auteur"
          name="auteur"
          placeholder="Auteur.."
          class="form-control"
          required
        />
      </div>
      <!-- Content input -->
      <div class="mb-3">
        <label for="contenuArticle" class="form-label" >Article: </label>
        <textarea class="form-control" name="content" id="contenuArticle" placeholder="Ecrire ici.." rows="5" required></textarea>
      </div>


    <!-- TODO Theme, Date, img input -->
      <!-- Date input -->
<!--    <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="date">Date:</label>
        <input
          type="date"
          name="date"
          required
          pattern="\d{4}-\d{2}-\d{2}"
          class="form-control"
        />
      </div> -->
            <!-- Theme input -->
      <div data-mdb-input-init class="form-outline mb-4">
        <label class="form-label" for="date">Theme:</label>
          <select name="theme" id="filtre"
            class="form-select form-select-sm"
            style="width: 100%"
            aria-label="Small select example"
          >
            <label for="filtre">Thèmes</label>
            <option value="all" selected>Tous</option>
            <option value="activity">Activité</option>
            <option value="song">Chanson</option>
            <option value="health">Santé</option>
            <option value="food">Alimentation</option>
          </select>
      </div>

      <!-- Image -->
      <div class="form-outline mb-4">
        <label class="form-check-label" for="imagefile">
          Votre image:
        </label>
        <input
          type="file"
          id="imagefile"
          accept="jpg, png, svg"
          class="form-control"
          name="image"
        />
      </div>
      <!-- Submit button -->
      <button
        data-mdb-ripple-init
        type="submit"
        class="btn cta btn-block mb-4"
        id="publierBtn"
      >
        Publier
      </button>
    </form>
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
</body>
</html>