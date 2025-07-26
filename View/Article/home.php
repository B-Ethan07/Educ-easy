<header>
    <section>
        <?php if (isset($_SESSION['user'])): ?>
            <h3 class="me-2">Bonjour, <?= htmlspecialchars($_SESSION['user']['username']) ?> !</h3>
        <?php endif; ?>
        <h1>Blog de conseil pour les parents</h1>
        <button class="cta" id="btnPartagee" onclick="document.querySelector('.popupBackground').style.display = 'block'">
            Inscrivez vous à notre newsletter
        </button>
    </section>
</header>

<main>
    <section>
        <h2><strong>Articles</strong></h2>
        <article>
            <div class="row row-cols-1 row-cols-md-2 g-4 m-2">
                <?php foreach ($articles as $article): ?>
                    <?php
                    $image = !empty($article['image']) ? htmlspecialchars($article['image']) : 'public/images/default.jpg';

                    $title = htmlspecialchars($article['title'] ?? 'Sans titre');
                    $author = htmlspecialchars($article['username'] ?? 'Anonyme'); // 'username' car ta requête SQL récupère users.username
                    $dateStr = $article['created_at'] ?? null; // date correcte de création
                    $formattedDate = $dateStr ? (new DateTime($dateStr))->format('d/m/Y') : 'Date inconnue';

                    $contentRaw = strip_tags($article['content'] ?? '');
                    $excerpt = strlen($contentRaw) > 150 ? substr($contentRaw, 0, 150) . '...' : $contentRaw;

                    $articleId = (string)($article['id'] ?? '');
                    ?>
                    <div class="col">
                        <div class="card h-100 shadow-sm">
                            <img src="<?= $image ?>" class="card-img-top" alt="Image de l'article" style="height: 180px; object-fit: cover;">
                            <div class="card-body d-flex flex-column">
                                <h5 class="card-title"><?= $title ?></h5>
                                <p class="card-text text-muted mb-1 small">
                                    <strong>Auteur :</strong> <?= $author ?> | <strong>Date :</strong> <?= $formattedDate ?>
                                </p>
                                <p class="card-text flex-grow-1"><?= nl2br(htmlspecialchars($excerpt)) ?></p>
                                <a href="?action=unArticle&id=<?= $articleId ?>" class="ctaNav mt-auto align-self-start">Lire la suite</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>


    </section>
</main>
