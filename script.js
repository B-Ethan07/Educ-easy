/*function filterArticle() {

    articles.forEach(article => {
        let theme = article.getAttribute("data-theme");
        if (filtre==="all" || filtre===theme){
            article.style.display= "block";
        }else{
            article.style.display="none"
        }
    })
}
filterArticle()
let newArray="";
for(const article of articles) {
    if(filtre==='Tous'){
        article.style.display= "block";
    } else {
        newArray += article
    }
}*/    
let articles = document.querySelector('article')
let filtre = document.getElementById('filtre')

filtre.addEventListener('change', () => {
    let article = articles.value
    let items = document.querySelectorAll('.card')

    items.forEach(item => {
        const themeName= item.dataset.name
        if(article==='all' || themeName===article){
            item.style.display='';
        } else {
            item.style.display='none';
        }
    })
})