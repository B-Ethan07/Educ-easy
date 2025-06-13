// fonctionnalité de filtre d'article 

document.getElementById('filtre').addEventListener('change', function () {
  const selected = this.value; // valeur sélectionnée
  const articles = document.querySelectorAll('.card');

  articles.forEach(article => {
    if (selected === 'all' || article.classList.contains(selected)) {
      article.parentElement.style.display = ''; // afficher le .col
    } else {
      article.parentElement.style.display = 'none'; // cacher le .col
    }
  });
});