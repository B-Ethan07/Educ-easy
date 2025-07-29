<header>
    <section>
        <?php if (isset($_SESSION['user'])): ?>
            <h3 class="me-2">Bonjour, <?= htmlspecialchars($_SESSION['user']['username']) ?> !</h3>
        <?php endif; ?>
        <h1>Blog de conseil pour les parents</h1>
        <button class="cta" id="btnPartagee" onclick="document.querySelector('.popupBackground').classList.add('active')">
            Inscrivez vous à notre newsletter
        </button>
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
        </div>
    </nav>


    <section class="article-grid mb-5">
        <h2 class="mb-4 text-center"><strong>Découvrez nos articles</strong></h2>
        <article>
            <div class="row row-cols-1 row-cols-md-2 g-4">
                <?php foreach ($articles as $article): ?>
                    <?php
                    $image = !empty($article['image']) ? htmlspecialchars($article['image']) : 'public/images/default.jpg';
                    $title = htmlspecialchars($article['title'] ?? 'Sans titre');
                    $author = htmlspecialchars($article['username'] ?? 'Anonyme');
                    $dateStr = $article['created_at'] ?? null;
                    $formattedDate = $dateStr ? (new DateTime($dateStr))->format('d/m/Y') : 'Date inconnue';
                    $contentRaw = strip_tags($article['content'] ?? '');
                    $excerpt = strlen($contentRaw) > 150 ? substr($contentRaw, 0, 150) . '...' : $contentRaw;
                    $articleId = (string)($article['id'] ?? '');
                    $theme = htmlspecialchars($article['theme'] ?? '');
                    
                    // Traduire le thème en français
                    $themeLabels = [
                        'activity' => 'Activité',
                        'song' => 'Chanson',
                        'health' => 'Santé',
                        'food' => 'Alimentation'
                    ];
                    ?>
                    <div class="col">
                        <div class="card article-card h-100 shadow-sm <?= $theme ?>">
                            <div class="position-relative">
                                <img src="<?= $image ?>" class="card-img-top" alt="Image de l'article" 
                                     style="height: 220px; object-fit: cover;">
                                <?php if($theme && isset($themeLabels[$theme])): ?>
                                    <span class="theme-badge"><?= $themeLabels[$theme] ?></span>
                                <?php endif; ?>
                            </div>
                            <div class="card-body d-flex flex-column p-4">
                                <h3 class="article-title"><?= $title ?></h3>
                                <div class="article-meta">
                                    <div class="article-author">
                                        <div class="author-avatar">
                                            <?= strtoupper(substr($author, 0, 1)) ?>
                                        </div>
                                        <span class="text-muted"><?= $author ?></span>
                                    </div>
                                    <span class="text-muted">•</span>
                                    <span class="text-muted"><?= $formattedDate ?></span>
                                </div>
                                <p class="article-excerpt"><?= nl2br(htmlspecialchars($excerpt)) ?></p>
                                <div class="mt-auto">
                                    <a href="?action=unArticle&id=<?= $articleId ?>" class="read-more">
                                        Lire la suite
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </article>


    </section>
</main>
