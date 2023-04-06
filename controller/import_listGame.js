let i = 1;
loadGeneralInfo();
setTimeout(() => {
    loadCart();
}, 1000);

showlistgameImp(i,"all","","","");

function showlistgameImp(num,category,str,pfrom,pto) {
    let pattern = /[^a-zA-Z0-9]/g;
    str = str.replace(pattern,"linkinpark");
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
            document.getElementById('showlistgameImp').innerHTML = "<tr><td colspan='8'>No result</td></tr>"
            showPagination(myobj.pagenum)
        }
        else {
            document.getElementById('showlistgameImp').innerHTML = myobj.s
            showPagination(myobj.pagenum)
            document.querySelectorAll(".pageNum").forEach(page => {
                if(page.value == num) {
                    document.querySelector(".pageNum.active").classList.remove('active')
                    page.classList.add('active')
                }
            }) 
        }  
    }
    xmlhttp.open("GET","../../model/importHandle.php?query=listgame&q=" + num + "&v=" + category + "&search=" + str + "&pfrom=" + pfrom + "&pto=" + pto)
    xmlhttp.send()
}
function showPagination(dataRes) {
    let s = "<input type='button' value='1' class='pageNum active' onclick='showlistgameImp(this.value,document.getElementById(`gcategory`).value,document.getElementById(`searchgames`).value,document.getElementById(`pfrom`).value,document.getElementById(`pto`).value)'>"   
    if(dataRes == 0) {
        document.getElementById('showpagination').innerHTML = ""
        return;
    }
    else if(dataRes == 1) {
        document.getElementById('showpagination').innerHTML = s
        return
    } else
    for(let i = 2  ; i <= dataRes ; i++) {
      s+= `<input type='button' value='${i}' class='pageNum' onclick='showlistgameImp(this.value,document.getElementById("gcategory").value,document.getElementById("searchgames").value,document.getElementById("pfrom").value,document.getElementById("pto").value)'>`
    }    
    document.getElementById('showpagination').innerHTML = s
} 


function addToImportCard(gameid){
    //console.log(gameid);
    const mess = document.getElementById("message");
    const xml = new XMLHttpRequest;
    xml.onreadystatechange = function(){
        if(this.responseText == "exist"){
            mess.innerHTML = "You have already added this game"
        }else{
            mess.innerHTML = ''
            loadCart();
        }
    }
    xml.open("GET","../../model/importHandle.php?query=addgame&gid=" +gameid)
    xml.send();
}

function deleteFromCart(gid){
    const xml = new XMLHttpRequest;
    const mess = document.getElementById("message");
    xml.onreadystatechange = function(){
        if(this.responseText == "success"){
            loadCart();
        }
        else{
            mess.innerHTML = this.responseText;
        }
    }

    xml.open("GET","../../model/importHandle.php?query=deletegame&gid="+gid)
    xml.send();
    
}

function loadGeneralInfo(){
    const xml = new XMLHttpRequest;
    const geneInfo = document.querySelector(".general-info");

    xml.onreadystatechange = function (){
        geneInfo.innerHTML = this.responseText;
    }
    xml.open("GET","../../model/importHandle.php?query=loadgen")
    xml.send();
}


function loadCart(){
    const showlistgameImp = document.getElementById("showListCardImp");
    const xml = new XMLHttpRequest;
    xml.onreadystatechange = function(){
        //console.log(this.responseText);
        showlistgameImp.innerHTML = this.responseText;
        updateCurrPrice();
    }
    xml.open("GET","../../model/importHandle.php?query=loadcart")
    xml.send();
}

function updateCurrPrice(){
    let quantity = document.querySelectorAll(".quantity_inp");
    let total_p = document.querySelector("#import-total-price");

    let total_price = 0;
    // get quantity
    quantity.forEach((imp_quantity,index) => {    
        if(imp_quantity.value == '' || imp_quantity.value == undefined|| imp_quantity.value == null || imp_quantity.value == "0"){
            imp_quantity.value = 1;
        }
        // get price
        let price_of_imp = imp_quantity.parentElement.parentElement.querySelector(".price").innerHTML;
        total_price += parseFloat(price_of_imp)*parseFloat(imp_quantity.value);
        
    });
    total_p.value =  Math.floor(total_price*100)/100;   

} 

$(document).ready(function() {
    $(window).keydown(function(event){
      if(event.keyCode == 13) {
        event.preventDefault();
        return false;
      }
    });
  });