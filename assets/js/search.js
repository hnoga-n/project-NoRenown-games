const container = document.querySelector('.products-list-filter');
//console.log(container);
function search(str) {
  if (str.length == 0) {
    container.innerHTML = "<p> can not found product you need ! </p>";
  }
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onload = function() {
    if (this.responseText == "") {
      container.innerHTML = "<div>NO GAME MATCH !</div>";
    }
    let data = JSON.parse(this.responseText)
    console.log(data);
    }   

    xmlhttp.open("GET", "searchHandle.php?q=" + str, true);
    xmlhttp.send();
}