function deleteaccount(userid) {
    if(confirm("Confirm delete this account ?")) {
        if(userid.length == 0) {
            return
        } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                alert(this.responseText) 
            }
            xmlhttp.open("GET","../../model/deleteaccount.php?userid=" + userid)
            xmlhttp.send()
        }
    }
    else {
        return true
    }
}