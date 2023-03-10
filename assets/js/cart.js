function loadDoc(url, cFunction) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {cFunction(this);}
    xhttp.open("GET", url);
    xhttp.send();
  }

loadDoc("../../model/getCartItems.php", loaded);

function loaded(xhttp){
    document.getElementById("itemsList").innerHTML += xhttp.responseText;
}

/* function delete_item(Item_id){
    console.log(Item_id);
} */
