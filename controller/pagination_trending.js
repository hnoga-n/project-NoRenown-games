showlistgame();
function showlistgame() {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onload = function () {
        document.getElementById('showtrending').innerHTML = this.responseText  
    }
    xmlhttp.open("GET","model/showtrending.php")
    xmlhttp.send()
}