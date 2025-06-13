// Sélection des éléments du formulaire
const boutonPublier = document.getElementById("publierBtn");
const titreInput = document.getElementById("titreArticle");
const auteurInput = document.getElementById("auteur");
const dateInput = document.querySelector('input[name="date"]');
const imageInput = document.getElementById("imagefile");
const contenuTextarea = document.getElementById("contenuArticle");
const container = document.getElementById("myUL");

boutonPublier.addEventListener("click", function () {
  // Vérifie que les champs nécessaires sont remplis
  if (!titreInput.value || !contenuTextarea.value) {
    alert("Merci de remplir au moins le titre et le contenu.");
    return;
  }

  // Créer la structure d'un nouvel article

  const col = document.createElement("div");
  col.className = "col";

  const card = document.createElement("div");
  card.className = "card";
  card.setAttribute("data-theme", "filterDiv all activity");

  // Image
  const img = document.createElement("img");
  const file = imageInput.files[0];

  if (file) {
    const reader = new FileReader();
    reader.onload = function () {
      img.src = reader.result;
      appendCard(); // On ajoute la carte après avoir chargé l'image
    };
    reader.readAsDataURL(file);
  } else {
    img.src = "assets/images/peinture.jpg"; // Image par défaut
    appendCard(); // Direct si pas d'image
  }

  function appendCard() {
    img.className = "card-img-top";
    img.alt = "Nouvel article";

    const cardBody = document.createElement("div");
    cardBody.className = "card-body shadow";

    const title = document.createElement("h5");
    title.className = "card-title";
    title.textContent = titreInput.value;

    const text = document.createElement("p");
    text.className = "card-text";
    text.innerHTML =
      `<strong>Auteur :</strong> ${auteurInput.value || "Anonyme"}<br>` +
      `<strong>Date :</strong> ${dateInput.value || "Non précisée"}<br><br>` +
      contenuTextarea.value;

    // Assembler la carte
    cardBody.appendChild(title);
    cardBody.appendChild(text);
    card.appendChild(img);
    card.appendChild(cardBody);
    col.appendChild(card);
    container.appendChild(col);

    // Reset du formulaire
    titreInput.value = "";
    auteurInput.value = "";
    dateInput.value = "";
    imageInput.value = "";
    contenuTextarea.value = "";
  }
});
