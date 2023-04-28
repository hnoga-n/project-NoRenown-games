function deletesupplier(suppid) {
    if(confirm("Confirm delete this supplier ?")) {
        if(suppid.length == 0) {
            return
        } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                alert(this.responseText) 
            }
            xmlhttp.open("GET","../../model/deletesupplier.php?suppID=" + suppid)
            xmlhttp.send()
        }
    }
    else {
        return true
    }
}