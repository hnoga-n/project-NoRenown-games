function showcategory(str) {
    if (str.length == 0) {
      document.getElementById("showcategory").innerHTML = "";
      return;
    } else {
      const xmlhttp = new XMLHttpRequest();
      xmlhttp.onload = function() {
        document.getElementById("showcategory").innerHTML = this.responseText;
      }
    xmlhttp.open("GET", "getcategory.php?q=" + str);
    xmlhttp.send();
    }
}