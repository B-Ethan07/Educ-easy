<?php
require 'config.php';
$pdo = new PDO(DSN, USER, PASS);
$stmt = $pdo->query("SELECT * FROM Story ORDER BY date DESC");
$articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans:ital,wght@0,100..900;1,100..900&family=Salsa&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/style.css" />
  <title>Educ'easy</title>
</head>
<body>
  <!-- NAVBAR -->
  <nav class="navbar sticky-top navbar-expand-sm shadow" style="background-color: #ffffff">
    <div class="container-fluid">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo03">
        <span class="navbar-toggler-icon"></span>
      </button>
      <a class="navbar-brand" href="#">
        <img src="assets/images/logo.PNG" alt="Logo" width="40" height="40" class="d-inline-block align-text-top" />
      </a>
      <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="titre"><strong>Educ'easy</strong></li>
          <li class="nav-item">
            <button class="ctaNav">
              <a class="nav-link active" href="index.html">Home</a>
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

  <!-- HEADER -->
  <header>
    <section>
      <h1>Articles</h1>
    </section>
  </header>

  <main>
    <!-- Filter + Search -->
    <nav class="navbar shadow-sm" style="background-color: #ffffff">
      <div class="container-fluid">
        <select id="filtre" class="form-select form-select-sm" style="width: 30%">
          <option value="all" selected>Tous</option>
          <option value="activity">Activité</option>
          <option value="song">Chanson</option>
          <option value="health">Santé</option>
          <option value="food">Alimentation</option>
        </select>
        <form class="d-flex" role="search">
          <input id="searchbar" class="form-control me-2" type="search" placeholder="Search" aria-label="Search" />
          <button class="btn btn-outline-warning" type="submit">Search</button>
        </form>
      </div>
    </nav>

    <!-- ARTICLES -->
    <article>
      <div id="myUL" class="row row-cols-1 row-cols-md-1 g-5 m-2">
<?php foreach ($articles as $article): ?>
  <?php
    $image = $article['image']
      ? 'data:image/jpeg;base64,' . base64_encode($article['image'])
      : 'assets/images/default.jpg';
    $theme = htmlspecialchars($article['theme']);
    $title = htmlspecialchars($article['title']);
    $author = htmlspecialchars($article['author']);

    // Créer un objet DateTime à partir de la date de l'article
    $dateObj = new DateTime($article['date']);

    // Formater la date en français avec IntlDateFormatter
    $formatter = new IntlDateFormatter(
      'fr_FR',
      IntlDateFormatter::LONG,
      IntlDateFormatter::NONE
    );
    $date = $formatter->format($dateObj);

    $content = nl2br(htmlspecialchars($article['content']));
  ?>
  <div class="col">
    <div class="card filterDiv all <?= $theme ?>">
      <img src="<?= $image ?>" class="card-img-top" alt="image">
      <div class="card-body shadow">
        <h5 class="card-title"><?= $title ?></h5>
        <p class="card-text">
          <strong>Auteur : </strong><?= $author ?><br>
          <strong>Date :</strong> <?= htmlentities($date) ?><br><br>
          <?= $content ?>
        </p>
      </div>
    </div>
  </div>
<?php endforeach; ?>
      </div>
    </article>
  </main>

  <!-- FOOTER -->
  <footer>
    <img src="assets/images/logo.PNG" alt="logo" width="40" height="40" />
    <h6>Mentions légales - CGU</h6>
    <ul>
      <li><button class="cta"><img src="assets/images/facebook.svg" alt="facebook" /></button></li>
      <li><button class="cta"><img src="assets/images/twitter.svg" alt="twitter" /></button></li>
      <li><button class="cta"><img src="assets/images/linkedin.svg" alt="linkedin" /></button></li>
    </ul>
  </footer>

  <!-- SCRIPTS -->
  <script src="script.js"></script>
  <script src="addArticle.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

