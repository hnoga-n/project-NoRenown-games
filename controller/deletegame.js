function deletegame(gid) {
    if(confirm("Confirm delete this game ?")) {
        if(gid.length == 0) {
            return
        } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                alert(this.responseText) 
            }
            xmlhttp.open("GET","../../model/deletegame.php?gid=" + gid)
            xmlhttp.send()
        }
    }
    else {
        return true
    }
}