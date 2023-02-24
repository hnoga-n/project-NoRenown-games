//Phan trang san pham
let dataRes;
let i = 1;
show(i);
const xmlhttp = new XMLHttpRequest();
xmlhttp.onload = function() {
    dataRes = this.responseText
    showPagination(dataRes)
}
xmlhttp.open("GET","getProductquality.php")
xmlhttp.send()
function show(str) {
    i = str
    if(str.length == 0) {
        document.getElementById('showproduct').innerHTML = ""
        return
    } else {
        const xmlhttp = new XMLHttpRequest();
        xmlhttp.onload = function() {
            document.getElementById('showproduct').innerHTML = this.responseText
        }
        xmlhttp.open("GET","panigation.php?query=" + str )
        xmlhttp.send()
    }
}
function next() {
    if(i < dataRes) {
      i++;
      show(i)
    }
}
function previous() {
  if(i>1){
    i--;
    show(i);
  }
}

//Tao paginationSSS
function showPagination(dataRes) {
  let s = "<input type='button' value='&laquo;' onclick='previous()'>" 
  s+= "<input type='button' value='1' class='active' onclick='show(this.value)'>"    
  for(let i = 2  ; i <= dataRes ; i++) {
    s+= `<input type='button' value='${i}' onclick='show(this.value)'>`
  }
  s+= "<input type='button' value='&raquo;' onclick='next()'>"
  
  document.getElementById('showPagination').innerHTML = s
} 