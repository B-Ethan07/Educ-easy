
document.addEventListener("DOMContentLoaded", function () {
  const btnEnvoyer = document.getElementById("btnEnvoyerMail");
  const btnQuitter = document.getElementById("quit");
  const inputNom = document.getElementById("nom");
  const inputEmail = document.getElementById("email");

  function isValidEmail(email) {
    // Regex simple de validation email
    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regex.test(email);
  }

  btnEnvoyer.addEventListener("click", function () {
    const nom = inputNom.value.trim();
    const email = inputEmail.value.trim();

    // Vérification
    if (nom === "") {
      alert("Veuillez entrer votre nom.");
      return;
    }

    if (!isValidEmail(email)) {
      alert("Veuillez entrer un email valide.");
      return;
    }

    // Simulation d'envoi de mail
    alert(`Un email de confirmation a été envoyé à : ${email}\nMerci ${nom} pour votre inscription !`);

    // Réinitialise le formulaire
    inputNom.value = "";
    inputEmail.value = "";
  });

  btnQuitter.addEventListener("click", function () {
    // Fermer le popup (ex : cacher la div)
    const popup = document.querySelector(".popupBackground");
    popup.style.display = "none";
  });
});