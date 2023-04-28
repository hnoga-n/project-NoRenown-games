let i = 1;
showlistgame(i,0,"","","");
function showlistgame(num,category,str,pfrom,pto) {
    if(str == "") {
        str = ''
    }
    if(pfrom == "" || pfrom == undefined) {
        pfrom = 0 
    }
    if(pto == "" || pto == undefined) {
        pto = 100 
    }
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onload = function () {
        const myobj = JSON.parse(this.responseText)
        if(myobj.s == "" && myobj.pagenum == 0) {
            document.getElementById('showlistgame').innerHTML = "<tr><td colspan='8'>No result</td></tr>"
            showPagination(myobj.pagenum)
        }
        else {
            document.getElementById('showlistgame').innerHTML = myobj.s
            showPagination(myobj.pagenum)
            document.querySelectorAll(".pageNum").forEach(page => {
                if(page.value == num) {
                    document.querySelector(".pageNum.active").classList.remove('active')
                    page.classList.add('active')
                }
            }) 
        }  
    }
    xmlhttp.open("GET","../../model/showlisttrashgame.php?q=" + num + "&v=" + category + "&search=" + str + "&pfrom=" + pfrom + "&pto=" + pto)
    xmlhttp.send()
}
function showPagination(dataRes) {
    let s = "<input type='button' value='1' class='pageNum active' onclick='showlistgame(this.value,document.getElementById(`gcategory`).value,document.getElementById(`searchgames`).value,document.getElementById(`pfrom`).value,document.getElementById(`pto`).value)'>"   
    if(dataRes == 0) {
        document.getElementById('showpagination-trash').innerHTML = ""
        return;
    }
    else if(dataRes == 1) {
        document.getElementById('showpagination-trash').innerHTML = s
        return
    } else
    for(let i = 2  ; i <= dataRes ; i++) {
      s+= `<input type='button' value='${i}' class='pageNum' onclick='showlistgame(this.value,document.getElementById("gcategory").value,document.getElementById("searchgames").value,document.getElementById("pfrom").value,document.getElementById("pto").value)'>`
    }    
    document.getElementById('showpagination-trash').innerHTML = s
}
function restoregame(gid) {
    if(confirm("Confirm restore this game ?")) {
        if(gid.length == 0) {
            return
        } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                alert(this.responseText) 
            }
            xmlhttp.open("GET","../../model/restoregame.php?gid=" + gid)
            xmlhttp.send()
        }
    }
    else {
        return true
    }
} 