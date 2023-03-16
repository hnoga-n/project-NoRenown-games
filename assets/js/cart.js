function loadDoc(url, cFunction) {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function() {cFunction(this);}
    xhttp.open("GET", url);
    xhttp.send();
  }

loadDoc("../../model/getCartItems.php", loaded);

function loaded(xhttp){
    document.getElementById("itemsList").innerHTML += xhttp.responseText;
    calmoney();
}

/* function delete_item(Item_id){
    console.log(Item_id);
} */

function calmoney(){
    if(document.getElementsByClassName("cartpage-empty")!= null){
        const items = document.getElementsByClassName("price");
        var s = 0;
        for(var i=0;i<items.length;i++){
            s += parseInt(items[i].getAttribute('value'));
        }
        document.getElementById("offcprice").innerText = s.toLocaleString('vn-VN') + " ₫";
        const itemDiscounts = document.getElementsByClassName("discounted");
        var sDiscounted = 0;
        for(var i=0;i<itemDiscounts.length;i++){
            sDiscounted += parseInt(itemDiscounts[i].getAttribute('value'));
        }
        document.getElementById("discount").innerText = (-(s - sDiscounted)).toLocaleString('vn-VN') + " ₫";
        document.getElementById("subtotal").innerText = sDiscounted.toLocaleString('vn-VN') + " ₫";

    }

}

console.log((1000000).toLocaleString('vn-VN') + "đ");