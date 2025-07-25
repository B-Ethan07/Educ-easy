<section class="vh-100 bg-image"
         style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card" style="border-radius: 15px;">
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
                                <button type="submit" class="btn btn-primary" name="login">Se connecter</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

