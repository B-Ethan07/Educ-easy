<main class="container mt-5 mb-5" style="max-width: 450px;">
    <h1 class="text-center mb-4">Créer un article</h1>
    <form method="POST"
          action=""
          enctype="multipart/form-data"
          class="shadow p-4 rounded"
          style="background-color: #fee9c6;">

        <!-- Titre -->
        <div class="form-outline mb-4">
            <label class="form-label" for="title">Titre :</label>
            <input
                    type="text"
                    id="title"
                    name="title"
                    placeholder="Titre de l'article"
                    class="form-control"
                    maxlength="255"
                    required
            />
        </div>

        <!-- Contenu -->
        <div class="mb-3">
            <label for="content" class="form-label">Contenu :</label>
            <textarea
                    class="form-control"
                    name="content"
                    id="content"
                    placeholder="Écrire ici..."
                    rows="5"
                    required
            ></textarea>
        </div>

        <!-- Thème -->
        <div class="form-outline mb-4">
            <label class="form-label" for="theme">Thème :</label>
            <select
                    name="theme"
                    id="theme"
                    class="form-select"
                    required
            >
                <option value="" disabled selected>Choisissez un thème</option>
                <option value="activity">Activité</option>
                <option value="song">Chanson</option>
                <option value="health">Santé</option>
                <option value="food">Alimentation</option>
                <option value="travel">Voyage</option> <!-- 5 thèmes comme prévu -->
            </select>
        </div>

        <!-- Image -->
        <div class="form-outline mb-4">
            <label for="image" class="form-label">Image :</label>
            <input
                    type="file"
                    id="image"
                    name="image"
                    accept=".jpg, .jpeg, .png, .svg"
                    class="form-control"
            />
        </div>

        <!-- Bouton submit -->
        <button
                type="submit"
                name="submit"
                class="btn cta btn-block mb-4"
        >
            Publier
        </button>
    </form>
</main>
