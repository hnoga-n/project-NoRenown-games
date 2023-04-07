showlistbill("",1)
function showlistbill(search,pagenum) {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onload = function () {
        const myobj = JSON.parse(this.responseText)
        if(myobj.html == "" && myobj.pagenum == 0) {
            document.getElementById('showlistbill').innerHTML = "<tr><td colspan='7'>No result</td></tr>"
            showPagination(myobj.pagenum)
        }
        else {
            document.getElementById('showlistbill').innerHTML = myobj.html
            showPagination(myobj.pagenum)
            document.querySelectorAll(".pageNum").forEach(page => {
                if(page.value == pagenum) {
                    document.querySelector(".pageNum.active").classList.remove('active')
                    page.classList.add('active')
                }
            }) 
        }
        checkstatus();

    }
    xmlhttp.open("GET","../../model/showlistorder.php?search=" + search + "&pagenum=" + pagenum)
    xmlhttp.send()
}
function showPagination(pagenum) {
    let s = "<input type='button' value='1' class='pageNum active' onclick='showlistbill(document.getElementById(`searchbill`).value,this.value)'>"   
    if(pagenum == 0) {
        document.getElementById('showpagination-listbill').innerHTML = ""
        return
    }
    else if(pagenum == 1) {
        document.getElementById('showpagination-listbill').innerHTML = s
        return
    } else
    for(let i = 2  ; i <= pagenum ; i++) {
      s+= `<input type='button' value='${i}' class='pageNum' onclick='showlistbill(document.getElementById("searchbill").value,this.value)'>`
    }    
    document.getElementById('showpagination-listbill').innerHTML = s
} 


function checkstatus(){
    let lists = document.querySelectorAll('#sts');
    lists.forEach(function (list){
        if (list.innerText == 'Processed' || list.innerText == 'Cancelled'){
            document.getElementById('acp').remove();
            document.getElementById('dcl').remove();
        }
    })
}