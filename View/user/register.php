<section class="vh-100">
    <div class="h-100 d-flex align-items-center">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-12 col-md-9 col-lg-7 col-xl-6">
                    <div class="card auth-card">
                        <div class="card-body p-5">
                            <h2 class="text-uppercase text-center mb-5">Créer un compte</h2>

                            <?php if (!empty($_SESSION['error'])): ?>
                                <div class="alert alert-danger"><?= htmlspecialchars($_SESSION['error']); ?></div>
                                <?php unset($_SESSION['error']); ?>
                            <?php endif; ?>

                            <?php if (!empty($_SESSION['success'])): ?>
                                <div class="alert alert-success"><?= htmlspecialchars($_SESSION['success']); ?></div>
                                <?php unset($_SESSION['success']); ?>
                            <?php endif; ?>

                            <form method="post" action="">
                                <div class="mb-3">
                                    <label for="username">Nom d'utilisateur</label>
                                    <input
                                            type="text"
                                            class="form-control"
                                            name="username"
                                            id="username"
                                            placeholder="Entrez votre nom d'utilisateur"
                                            maxlength="50"
                                            required
                                    >
                                </div>
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
                                <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="terms" required>
                                    <label class="form-check-label" for="terms">J'accepte les conditions générales</label>
                                </div>
                                <button type="submit" class="btn btn-primary" name="submit">S'inscrire</button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--// Ctrl + D pour sélectionner les mots occurents,
// Raccourcis utile : Clicker sur un mot puis Ctrl + Shift + L pour modifier tous les mots occurents d'un coup.
CREATE TABLE `recette`.`users` (`id` INT NOT NULL AUTO_INCREMENT , `firstname` VARCHAR(20) NOT NULL , `lastname` VARCHAR(50) NOT NULL , `email` VARCHAR(50) NOT NULL , `pwd` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;



-->