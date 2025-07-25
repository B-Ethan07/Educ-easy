<footer>
    <img src="images/logo.PNG" alt="logo" width="40" height="40" />
    <h6>Mentions légales - CGU</h6>
    <ul style="list-style: none; padding-left: 0; display: flex; gap: 10px;">
        <li>
            <a href="https://www.facebook.com" target="_blank" rel="noopener noreferrer">
                <img src="images/facebook.svg" alt="facebook" width="20" height="20" />
            </a>
        </li>
        <li>
            <a href="https://www.twitter.com" target="_blank" rel="noopener noreferrer">
                <img src="images/twitter.svg" alt="twitter" width="20" height="20" />
            </a>
        </li>
        <li>
            <a href="https://www.linkedin.com" target="_blank" rel="noopener noreferrer">
                <img src="images/linkedin.svg" alt="linkedin" width="20" height="20" />
            </a>
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
<script src="js/popup_news.js"></script>
<script src="js/script.js"></script>
<script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO"
    crossorigin="anonymous"
></script>
</body>
</html>