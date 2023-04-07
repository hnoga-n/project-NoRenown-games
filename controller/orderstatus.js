function changestatus(orderid,status) {
    if(confirm("Confirm changing status ?")) {
        if(orderid.length == 0) {
            return
        } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                alert(this.responseText) 
            }
            xmlhttp.open("GET","../../model/orderstatus.php?orderid=" + orderid + "&orderstatus=" + status)
            xmlhttp.send()
        }
    }
    else {
        return true
    }
}