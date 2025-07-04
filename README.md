# 📚 Educ'easy

**Educ'easy** est un blog de conseils pour les parents, leur proposant des articles autour de l’éducation, la santé, l’alimentation, les activités ou les chansons pour enfants. Le site permet aussi aux utilisateurs d’écrire et publier leurs propres contenus.

## 🎯 Objectif du projet

Créer une plateforme simple et ergonomique de type blog, centrée sur l’échange d’expériences et de recommandations parentales.

## 🛠️ Fonctionnalités principales

- 🏠 **Page d'accueil** : affichage des 4 derniers articles publiés
- 📄 **Page Articles** : consultation de tous les articles avec filtres par thème et barre de recherche
- ✍️ **Page de création d'article** : formulaire de soumission d’un article (titre, auteur, thème, image, contenu)
- 📬 **Popup Newsletter** : système d’inscription à une newsletter
- 📸 **Gestion d’images** : image uploadée et stockée dans la base de données (format binaire)

## 🧰 Stack technique

- **Frontend** : HTML5, CSS3, Bootstrap, JavaScript
- **Backend** : PHP (avec PDO pour la base de données)
- **Base de données** : MySQL
- **Langue** : 🇫🇷 Formatage des dates avec `IntlDateFormatter`

## 📂 Architecture simplifiée

├── index.php        → Accueil avec aperçu des derniers articles
├── article.php      → Liste complète avec filtres/thèmes
├── create.php       → Formulaire de soumission d’article
├── assets/          → CSS, JS, images
├── config.php       → Connexion PDO à la base de données
└── addArticle.js    → Logique JS pour le filtrage/recherche

## ✅ Ce que j’ai réalisé

- Développement **full-stack** du site (frontend + backend)
- Création d’un système **CRUD** sans framework
- Intégration responsive avec **Bootstrap**
- Sécurisation des entrées utilisateur (`htmlspecialchars`, `nl2br`, validation côté serveur)

## 🔧 Prochaines évolutions prévues

- Ajout des fonctionnalités **Update** (modifier un article) et **Delete** (supprimer un article)
- Mise en place d’un **espace administrateur**
- Envoi réel des mails pour la newsletter

---

> Projet personnel réalisé dans un objectif d’apprentissage PHP et de mise en pratique concrète de mes compétences web.

