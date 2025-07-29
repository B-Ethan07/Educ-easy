<?php if (isset($_SESSION['error'])): ?>
    <div c            <div class="comment" style="background-color:            <div class="text-center mt-5">
            <p class="mb-3" style="color: #666;">Envie de participer à la discussion ?</p>
            <a href="?action=login" style="color: #ff6a3d; text-decoration: none; font-weight: 500;">Se connecter pour commenter</a>
        </div>te; padding: 1.25rem; border-radius: var(--btn-radius); box-shadow: 0 2px 4px rgba(0,0,0,0.05);">
            <div class="comment-header" style="display: flex; align-items: center; gap: 1rem; margin-bottom: 1rem;">
                <div class="comment-avatar" style="width: 40px; height: 40px; background: var(--primary-gradient); color: white; border-radius: 50%; display: flex; align-items: center; justify-content: center; font-weight: bold;">
                    <?php
                    $author = isset($comment->author) && $comment->author !== 'Anonyme'
                        ? $comment->author
                        : ($_SESSION['user']['username'] ?? 'Anonyme');
                    echo strtoupper(substr($author, 0, 1));
                    ?>
                </div>t alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
<article class="single-article p-4 mt-5">
    <?php if ($article['image']): ?>
        <div class="single-article-header">
            <img src="<?= htmlspecialchars($article['image']) ?>" 
                 alt="Image de l'article"
                 class="single-article-image">
            <?php if(isset($article['theme'])): ?>
                <span class="theme-badge">
                    <?= htmlspecialchars($article['theme']) ?>
                </span>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <div class="single-article-meta">
        <div class="article-author">
            <div class="author-avatar">
                <?= strtoupper(substr($article['username'], 0, 1)) ?>
            </div>
            <div class="ms-2">
                <strong class="d-block"><?= htmlspecialchars($article['username']) ?></strong>
                <small class="text-muted">
                    <?= (new DateTime($article['created_at']))->format('d/m/Y à H:i') ?>
                </small>
            </div>
        </div>
    </div>

    <h1 class="single-article-title text-center"><?= htmlspecialchars($article['title']) ?></h1>

    <div class="single-article-content">
        <?= nl2br(htmlspecialchars($article['content'])) ?>
    </div>
</article>



<div class="comments-container" style="width: 85%; max-width: 1200px; margin: 0 auto;">
    <section class="comments-section mb-5 p-4" style="background-color: #fffaf5; border-radius: var(--btn-radius);">
        <h3 class="comments-header" style="color: #333;">Discussion</h3>

        <?php if (count($comments) === 0): ?>
        <div class="text-center my-5">
            <p style="color: #666;" class="fst-italic">Soyez le premier à partager votre expérience !</p>
        </div>
    <?php else: ?>
    <div class="comments-list" style="display: flex; flex-direction: column; gap: 1.5rem;">
        <?php foreach ($comments as $comment): ?>
        <div class="comment">
            <div class="comment-header">
                <div class="comment-avatar">
                    <?php
                    $author = isset($comment->author) && $comment->author !== 'Anonyme'
                        ? $comment->author
                        : ($_SESSION['user']['username'] ?? 'Anonyme');
                    echo strtoupper(substr($author, 0, 1));
                    ?>
                </div>
                <div>
                    <strong class="d-block"><?= htmlspecialchars($author) ?></strong>
                    <small class="text-muted">
                        <?= $comment['created_at']->toDateTime()->format('d/m/Y à H:i') ?>
                    </small>
                </div>
            </div>
            <div class="comment-body">
                <p class="mb-0"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
            </div>
        </div>
        <?php endforeach; ?>
    <?php endif; ?>
    </div>

    <?php if (isset($_SESSION['user'])): ?>
    <form method="POST" action="" class="mt-5">
        <div class="comment-form">
            <label for="comment_content" class="d-block mb-3">
                <span class="h5 d-block mb-2" style="color: #333;">Partagez votre expérience</span>
                <span style="color: #666;">Votre avis est précieux pour la communauté</span>
            </label>
            <textarea
                name="comment_content"
                id="comment_content"
                class="form-control"
                placeholder="Que pensez-vous de cet article ?"
                rows="4"
                required
            ></textarea>
            <div class="text-end mt-3">
                <button type="submit" name="comment" class="read-more">
                    Publier mon commentaire
                </button>
            </div>
        </div>
    </form>
    <?php else: ?>
        <div class="text-center mt-5">
            <p class="mb-3">Envie de participer à la discussion ?</p>
            <a href="?action=login" class="link-primary">Se connecter pour commenter</a>
        </div>
    <?php endif; ?>
    </section>
</div>


