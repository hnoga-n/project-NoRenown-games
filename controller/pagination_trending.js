showlistgame(1);
function showlistgame(num) {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onload = function () {
        const myobj = JSON.parse(this.responseText)
        document.getElementById('showtrending').innerHTML = myobj.html
        showPagination(myobj.pagenum)
        document.querySelectorAll(".pageNum").forEach(page => {
            if(page.value == num) {
                document.querySelector(".pageNum.active").classList.remove('active')
                page.classList.add('active')
            }
        })  
    }
    xmlhttp.open("GET","model/showtrending.php?num="+ num)
    xmlhttp.send()
}
function showPagination(dataRes) {
    let s = "<input type='button' value='1' class='pageNum active' onclick='showlistgame(this.value)'>"   
    for(let i = 2  ; i <= dataRes ; i++) {
      s+= `<input type='button' value='${i}' class='pageNum' onclick='showlistgame(this.value)'>`
    }    
    document.getElementById('showPagination').innerHTML = s
} 