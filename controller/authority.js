
$(document).ready(function() {
  if (window.location.href.indexOf("?page=authorization") > -1 && window.location.href.indexOf("?page=authorization&grid") <= -1) {
    const body = document.querySelector(".auth_table_body")
    console.log(body);
    
    const xml = new XMLHttpRequest
    xml.onreadystatechange = function(){
      console.log(this.responseText);
      body.innerHTML = this.responseText;
    }
    
    xml.open("GET","../../model/auth_handle.php");
    xml.send();
    }
});

$(document).ready(function() {
  if (window.location.href.indexOf("?page=authorization&grid") > -1) {
    
  }
});


