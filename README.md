# 📚 Educ'easy

Educ'easy is a blog designed for parents, offering tips and articles about parenting, health, food, activities, and children’s songs. Users can also write and publish their own posts through a dedicated form.

## 🎯 Project Goal

Build a simple, responsive, and user-friendly blog platform that encourages parents to share their experiences and educational advice.

## 🛠️ Main Features

- 🏠 **Homepage**: Displays the 4 most recent articles  
- 📄 **Articles Page**: Browse all articles with category filtering and search  
- ✍️ **Create Article Page**: Submit new posts with title, author, theme, image, and content  
- 🔐 **Authentication System**:  
  - Registration and login with session management  
  - Only logged-in users can publish articles  
- 📬 **Newsletter Popup**: Users can subscribe to the newsletter  
- 📸 **Image Handling**: Uploaded images are stored as BLOBs in the database  
- 🌐 **Responsive Design**: Fully mobile-friendly using Bootstrap  

## 👤 Authentication & Security

- ✅ Registration form with validation  
- ✅ Passwords securely hashed using `password_hash`  
- ✅ Login with `password_verify` and session support  
- ✅ Authenticated access required to publish content  
- ✅ User inputs protected via `htmlspecialchars`, `nl2br`, and server-side validation  

## 🧰 Architecture & Tech Stack

| Frontend              | Backend                      | Database            |
|-----------------------|------------------------------|---------------------|
| HTML5, CSS3, Bootstrap 5 | PHP Object-Oriented (OOP) with MVC architecture | MySQL (Relational)  |

- 🇫🇷 Dates are formatted using `IntlDateFormatter` for French display

## ✅ What I've Built

- Full frontend + backend development  
- Implemented MVC structure and Object-Oriented Programming (OOP)  
- Partial CRUD system:  
  - ✅ Create: Submit articles  
  - ✅ Read: Display articles on homepage and article list  
- ✅ Login/registration system with session handling  
- ✅ Responsive layout using Bootstrap  
- ✅ Basic input security and validation  

## 🔧 Future Improvements

- 🔄 Implement comment storage using MongoDB (NoSQL)  
- 🔄 Continue CRUD implementation using Symfony framework  
- 🔐 Add role-based access control system (roles & permissions)  
- 🔄 Enable editing and deleting of articles  
- 🛠️ Build an admin dashboard  
- ✉️ Add real email functionality for newsletter signups  

---

This project was created as a personal learning experience to practice PHP, MVC, and OOP, and to explore full-stack development with database integration.





