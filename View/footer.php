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
        <button id="quit" class="close-btn" type="button" aria-label="Fermer">×</button>
        
        <div class="newsletter-icon">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                <polyline points="22,6 12,13 2,6"/>
            </svg>
        </div>

        <h3>Restez informé !</h3>
        <p>Recevez nos meilleurs conseils et actualités directement dans votre boîte mail.</p>

        <form>
            <div class="form-group">
                <input type="text" id="nom" name="nom" placeholder="Votre nom" required />
            </div>

            <div class="form-group">
                <input type="email" id="email" name="email" placeholder="votre@email.com" required />
            </div>

            <button id="btnEnvoyerMail" type="button">Rejoindre la newsletter</button>

            <div class="terms">
                En vous inscrivant, vous acceptez de recevoir nos newsletters. 
                <a href="#">Voir notre politique de confidentialité</a>
            </div>
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