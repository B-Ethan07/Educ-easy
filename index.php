<?php
require 'config.php';

$pdo = new PDO(DSN, USER, PASS);
$stmt = $pdo->query("SELECT * FROM Story ORDER BY date DESC LIMIT 4");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);

$formatter = new IntlDateFormatter('fr_FR', IntlDateFormatter::LONG, IntlDateFormatter::NONE);
?>




<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Salsa&display=swap" rel="stylesheet">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT"
      crossorigin="anonymous"
    />

    <link rel="stylesheet" href="assets/css/style.css" />
    <link rel="stylesheet" href="assets/css/popup.css">
    <title>Educ'easy</title>
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
            <li class="titre"><strong>Educ'easy</strong></li>
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
    <header>
      <section>
        <h1 >Blog de conseil pour les parents</h1>
        <button class="cta" id="btnPartagee" onclick="document.querySelector('.popupBackground').style.display = 'block'">Inscrivez vous à notre newsletter</button>
      </section>
    </header>
    <main>
<section>
  <h2><strong>Articles</strong></h2>
  <article>
    <div class="row row-cols-1 row-cols-md-2 g-5 m-2">
      <?php foreach ($articles as $article): ?>
        <?php
          $image = $article['image']
            ? 'data:image/jpeg;base64,' . base64_encode($article['image'])
            : 'assets/images/default.jpg';

          $title = htmlspecialchars($article['title']);
          $author = htmlspecialchars($article['author']);
          $dateObj = new DateTime($article['date']);
          $formattedDate = $formatter->format($dateObj);
          $content = nl2br(htmlspecialchars($article['content']));
        ?>
        <div class="col">
          <div class="card">
            <img src="<?= $image ?>" class="card-img-top" alt="image" />
            <div class="card-body shadow">
              <h5 class="card-title"><?= $title ?></h5>
              <p class="card-text">
                <strong>Auteur :</strong> <?= $author ?><br>
                <strong>Date :</strong> <?= $formattedDate ?><br><br>
                <?= $content ?>
              </p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </article>
        <button class="cta">
          <a class="nav-link" href="article.php"> More </a>
        </button>
      </section>
    </main>
    <footer>
      <img src="assets\css\images\logo.PNG" alt="logo" width="40" height="40" />
      <h6>Mentions légales - CGU</h6>
      <ul>
        <li>
          <button class="cta">
            <img src="assets\css\images\facebook.svg" alt="facebook" />
          </button>
        </li>
        <li>
          <button class="cta">
            <img src="assets\css\images\twitter.svg" alt="twitter" />
          </button>
        </li>
        <li>
          <button class="cta">
            <img src="assets\css\images\linkedin.svg" alt="linkedin" />
          </button>
        </li>
      </ul>
    </footer>
    <!-- Popup newsletter -->
<div class="popupBackground">
  <div class="popup_news">
    <h4 class="mb-4">S'inscrire à la newsletter</h4>
    <form>

    <div data-mdb-input-init class="form-outline mb-3">
      <label for="nom">Votre nom:</label>
      <input type="text" id="nom" name="nom" placeholder="Votre nom" />
    </div>

    <div data-mdb-input-init class="form-outline mb-3">
      <label for="email">Votre email:</label>
      <input
        type="email"
        id="email"
        name="email"
        placeholder="nom@domaine.com"
      />
    </div>
      <button id="btnEnvoyerMail" data-mdb-ripple-init
        type="button"
        class="btn btn-primary">S'inscrire</button>
      <button id="quit" data-mdb-ripple-init
        type="button"
        class="btn btn-danger">Fermer</button>
    </form>
  </div>
</div>
    <script src="assets/js/popup_news.js"></script>
    <script src="assets/js/script.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
      crossorigin="anonymous"
    ></script>
  </body>
</html>
