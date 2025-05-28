function filterArticle() {
    let filtre = document.getElementById('filtre').value
    let articles = document.querySelectorAll('.card')
    articles.forEach(article => {
        let theme = article.getAttribute("data-theme");
        if (filtre==="all" || filtre===theme){
            article.style.display= "block";
        }else{
            article.style.display="none"
        }
    })
}