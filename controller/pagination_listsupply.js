showlistsupplier("",1)
function showlistsupplier(search,pagenum) {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onload = function () {
        const myobj = JSON.parse(this.responseText)
        if(myobj.html == "" && myobj.pagenum == 0) {
            document.getElementById('showlistsupplier').innerHTML = "<tr><td colspan='5'>No result</td></tr>"
            showPagination(myobj.pagenum)
        }
        else {
            document.getElementById('showlistsupplier').innerHTML = myobj.html
            showPagination(myobj.pagenum)
            document.querySelectorAll(".pageNum").forEach(page => {
                if(page.value == pagenum) {
                    document.querySelector(".pageNum.active").classList.remove('active')
                    page.classList.add('active')
                }
            }) 
        }
    }
    xmlhttp.open("GET","../../model/showlistsupplier.php?search=" + search + "&pagenum=" + pagenum)
    xmlhttp.send()
}
function showPagination(pagenum) {
    let s = `<input type='button' value='1' class='pageNum active' onclick='showlistsupplier(document.getElementById("searchsupplier").value,this.value)'>`   
    if(pagenum == 0) {
        document.getElementById('showpagination-listsupplier').innerHTML = ""
        return
    }
    else if(pagenum == 1) {
        document.getElementById('showpagination-listsupplier').innerHTML = s
        return
    } else
    for(let i = 2  ; i <= pagenum ; i++) {
      s+= `<input type='button' value='${i}' class='pageNum' onclick='showlistsupplier(document.getElementById("searchsupplier").value,this.value)'>`
    }    
    document.getElementById('showpagination-listsupplier').innerHTML = s
} 
