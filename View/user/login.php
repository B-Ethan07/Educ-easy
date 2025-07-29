<section class="vh-100">
    <div class="h-100 d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card auth-card">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Se connecter</h2>

                            <?php if (!empty($_SESSION['error'])): ?>
                                <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']); ?></div>
                                <?php unset($_SESSION['error']); ?>
                            <?php endif; ?>

                            <form method="post" action="">
                                <div class="mb-3">
                                    <label for="email">Adresse Email</label>
                                    <input
                                            type="email"
                                            class="form-control"
                                            name="email"
                                            id="email"
                                            placeholder="Entrez votre email"
                                            maxlength="100"
                                            required
                                    >
                                </div>
                                <div class="mb-3">
                                    <label for="password">Mot de passe</label>
                                    <input
                                            type="password"
                                            name="password"
                                            class="form-control"
                                            id="password"
                                            placeholder="Mot de passe"
                                            required
                                    >
                                </div>
                                <button type="submit" class="btn btn-primary w-100" name="login">Se connecter</button>
                                <div class="text-center mt-4">
                                    <p>Pas encore de compte ? <a href="?action=register" class="link-primary">Créer un compte</a></p>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

