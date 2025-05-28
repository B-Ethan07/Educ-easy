/*function myFunction() {
  
  // Declare variables
  var input, filter, ul, li, a, i, txtValue;
  input = document.getElementById('searchbar');
  filter = input.value.toUpperCase();
  ul = document.getElementById("myUL");
  article = ul.querySelectorAll('.card');

  // Loop through all list items, and hide those who don't match the search query
  for (i = 0; i < article.length; i++) {
    a = article[i].getElementByAttribute("data-theme")[0];
    txtValue = a.textContent || a.innerText;
    if (txtValue.toUpperCase().indexOf(filter) > -1) {
      article[i].style.display = "";
    } else {
      article[i].style.display = "none";
    }
  }
}myFunction()*/

//????????????????????