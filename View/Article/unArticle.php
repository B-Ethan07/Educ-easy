<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']) ?></div>
    <?php unset($_SESSION['error']); ?>
<?php endif; ?>
<article class="mt-5 mb-4 px-5 py-4 border rounded shadow-sm bg-white" style="width: 70%; margin: 0 auto;">
    <h2 class="mb-4 fw-bold text-center"><?= htmlspecialchars($article['title']) ?></h2>

    <?php if ($article['image']): ?>
        <div class="mb-4 text-center">
            <img src="<?= htmlspecialchars($article['image']) ?>" alt="Image article"
                 class="img-fluid rounded"
                 style="max-height: 400px; object-fit: cover;">
        </div>
    <?php endif; ?>

    <div class="ms-3">
        <p class="text-muted mb-3">
            <small>
                <strong>Auteur :</strong> <?= htmlspecialchars($article['username']) ?> |
                <strong>Date :</strong> <?= (new DateTime($article['created_at']))->format('d/m/Y H:i') ?>
            </small>
        </p>

        <div style="line-height: 1.7; font-size: 1.125rem; color: #333;">
            <?= nl2br(htmlspecialchars($article['content'])) ?>
        </div>
    </div>
</article>



<section class="mb-5">
    <h3 class="mb-4 border-bottom pb-2">Commentaires</h3>

    <?php if (count($comments) === 0): ?>
        <p class="text-muted fst-italic">Aucun commentaire pour le moment.</p>
    <?php else: ?>
        <?php foreach ($comments as $comment): ?>
            <div class="comment mb-4 p-3 border rounded shadow-sm bg-light">
                <p class="mb-1">
                    <strong><?= htmlspecialchars($comment['author_name']) ?></strong>
                    <small class="text-muted">(<?= (new DateTime($comment['created_at']))->format('d/m/Y H:i') ?>)</small>
                </p>
                <p class="mb-0" style="white-space: pre-wrap;"><?= nl2br(htmlspecialchars($comment['content'])) ?></p>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <?php if (isset($_SESSION['user'])): ?>
        <!-- Formulaire -->
        <form method="POST" action="" class="mt-4">
            <div class="mb-3" style="max-width: 700px; margin: 0 auto;">
                <label for="comment_content" class="form-label fw-semibold">Ajouter un commentaire :</label>
                <textarea
                        name="comment_content"
                        id="comment_content"
                        class="form-control"
                        placeholder="Votre commentaire ici..."
                        rows="4"
                        style="min-height: 120px; resize: vertical;"
                        required
                ></textarea>
            </div>
            <div class="text-center">
                <button type="submit" name="comment" class="btn btn-primary">Envoyer</button>
            </div>
        </form>

    <?php else: ?>
        <p class="mt-4"><a href="?action=login" class="text-decoration-none">Connectez-vous</a> pour laisser un commentaire.</p>
    <?php endif; ?>
</section>


