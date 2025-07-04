# 📚 Educ'easy

**Educ'easy** is a blog designed for parents, offering advice and articles related to parenting, health, food, activities, and songs for children. Users can also write and publish their own content through a simple form.

## 🎯 Project Goal

To create a simple and user-friendly blog platform focused on sharing parenting experiences and recommendations.

## 🛠️ Main Features

- 🏠 **Homepage**: Displays the 4 most recent articles
- 📄 **Articles Page**: Browse all articles with category filtering and search functionality
- ✍️ **Create Page**: Submit a new article with title, author, theme, image, and content
- 📬 **Newsletter Popup**: Allows users to subscribe to the newsletter
- 📸 **Image Handling**: Uploaded images are stored in the database as binary data

## 🧰 Tech Stack

- **Frontend**: HTML5, CSS3, Bootstrap, JavaScript
- **Backend**: PHP (with PDO for database interaction)
- **Database**: MySQL
- **Language**: 🇫🇷 Dates are formatted using `IntlDateFormatter` in French

## 📂 Project Structure

├── index.php →   Accueil avec aperçu des derniers articles
├── article.php →   Liste complète avec filtres/thèmes
├── create.php →   Formulaire de soumission d’article
├── assets/ →   CSS, JS, images
├── config.php →   Connexion PDO à la base de données
└── addArticle.js →   Logique JS pour le filtrage/recherche

## ✅ What I've Built

- Full-stack development of the site (frontend + backend)
- A partial **CRUD** system:  
  - ✅ **Create**: article submission  
  - ✅ **Read**: article display on homepage and list page  
- Responsive integration with **Bootstrap**
- Basic security for user inputs using `htmlspecialchars`, `nl2br`, and server-side validation

## 🔧 Upcoming Improvements

- Add full **CRUD** by implementing:
  - 🔄 **Update**: Edit an existing article
  - ❌ **Delete**: Remove an article
- Create an **admin dashboard**
- Implement real **email sending** for newsletter subscriptions

---

> This project was built as a personal learning exercise to practice PHP and apply full-stack development concepts.


