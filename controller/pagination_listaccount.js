showlistaccount("",0,1)
function showlistaccount(search,groupid,pagenum) {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onload = function () {
        const myobj = JSON.parse(this.responseText)
        if(myobj.html == "" && myobj.pagenum == 0) {
            document.getElementById('showlistaccount').innerHTML = "<tr><td colspan='8'>No result</td></tr>"
            showPagination(myobj.pagenum)
        }
        else {
            document.getElementById('showlistaccount').innerHTML = myobj.html
            showPagination(myobj.pagenum)
            document.querySelectorAll(".pageNum").forEach(page => {
                if(page.value == pagenum) {
                    document.querySelector(".pageNum.active").classList.remove('active')
                    page.classList.add('active')
                }
            }) 
        }
    }
    xmlhttp.open("GET","../../model/showlistaccount.php?search=" + search + "&groupID=" + groupid + "&pagenum=" + pagenum)
    xmlhttp.send()
}
function showPagination(pagenum) {
    let s = "<input type='button' value='1' class='pageNum active' onclick='showlistaccount(document.getElementById(`searchaccount`).value,document.getElementById(`groupcategory`).value,this.value)'>"   
    if(pagenum == 0) {
        document.getElementById('showpagination-listaccount').innerHTML = ""
        return
    }
    else if(pagenum == 1) {
        document.getElementById('showpagination-listaccount').innerHTML = s
        return
    } else
    for(let i = 2  ; i <= pagenum ; i++) {
      s+= `<input type='button' value='${i}' class='pageNum' onclick='showlistaccount(document.getElementById("searchaccount").value,document.getElementById("groupcategory").value,this.value)'>`
    }    
    document.getElementById('showpagination-listaccount').innerHTML = s
} 
