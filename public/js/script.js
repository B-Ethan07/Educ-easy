// fonctionnalité de filtre d'article 


document.addEventListener('DOMContentLoaded', function () {
  const filtreSelect = document.getElementById('filtre');
  if (!filtreSelect) return;

  filtreSelect.addEventListener('change', function () {
    const selected = this.value;
    const articles = document.querySelectorAll('.card');

    articles.forEach(article => {
      if (selected === 'all' || article.classList.contains(selected)) {
        article.parentElement.style.display = '';
      } else {
        article.parentElement.style.display = 'none';
      }
    });
  });
});
