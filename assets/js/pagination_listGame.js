let i = 1;
showlistgame(i,"all","","","");
function showlistgame(num,category,str,pfrom,pto) {
    if(str == "") {
        str = ''
    }
    /* if((pfrom == "" && pto == "") || (pfrom == undefined && pto == undefined)) {
        pfrom = 0 
        pto = 100
    } */
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
            document.getElementById('showlistgame').innerHTML = "<tr><td colspan='9'>No result</td></tr>"
            showPagination(myobj.pagenum)
        }
        else {
            document.getElementById('showlistgame').innerHTML = myobj.s
            showPagination(myobj.pagenum)
        }  
    }
    console.log(num + ' ' + category + ' ' + str + ' ' + pfrom + ' ' + pto)
    xmlhttp.open("GET","showlistgame.php?q=" + num + "&v=" + category + "&search=" + str + "&pfrom=" + pfrom + "&pto=" + pto)
    xmlhttp.send()
}
function showPagination(dataRes) {
    let s = "<input type='button' value='1' class='pageNum' onclick='showlistgame(this.value,document.getElementById(`gcategory`).value,document.getElementById(`searchgames`).value,document.getElementById(`pfrom`).value,document.getElementById(`pto`).value)'>"   
    if(dataRes == 0) {
        document.getElementById('showpagination').innerHTML = ""
        return;
    }
    else if(dataRes == 1) {
        document.getElementById('showpagination').innerHTML = s
        return
    } else
    for(let i = 2  ; i <= dataRes ; i++) {
      s+= `<input type='button' value='${i}' class='pageNum' onclick='showlistgame(this.value,document.getElementById("gcategory").value,document.getElementById("searchgames").value,document.getElementById("pfrom").value,document.getElementById("pto").value)'>`
    }    
    document.getElementById('showpagination').innerHTML = s
} 