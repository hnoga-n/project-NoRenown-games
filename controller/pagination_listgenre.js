showlistgenre("")
function showlistgenre(search) {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onload = function () {
        document.getElementById('showlistgenre').innerHTML = this.responseText
    }
    xmlhttp.open("GET","../../model/showlistgenre.php?search="+search)
    xmlhttp.send()
}

var modal1 = document.getElementById('id01');
var modal2 = document.getElementById('id012');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
    if (event.target == modal1) {
        modal1.style.display = "none";
    }
    if (event.target == modal2) {
        modal2.style.display = "none";
    }
}

function editGenre(genid,genName) {
    document.getElementById('id012').style.display='block'
    document.getElementById('edit-genID').value = genid
    document.getElementById('edit-genName').value = genName
}

function setStatus(genid) {
    const xmlhttp = new XMLHttpRequest()
    if(confirm("Delete this Genre ?")) {
        xmlhttp.onload = function () {
            alert(this.responseText)
        }
        xmlhttp.open("GET","../../model/setGenreStatus.php?genid=" + genid)
        xmlhttp.send()
    } else {
        return true;
    }
    
}