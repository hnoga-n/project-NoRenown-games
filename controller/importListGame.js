let i = 1;
loadGeneralInfo();
setTimeout(() => {
    loadCart();
}, 500);

showlistgameImp(i, "all", "", "", "");

function showlistgameImp(num, category, str, pfrom, pto) {
    let pattern = /[^a-zA-Z0-9]/g;
    str = str.replace(pattern, "linkinpark");
    if (str == "") {
        str = ''
    }
    if (pfrom == "" || pfrom == undefined) {
        pfrom = 0
    }
    if (pto == "" || pto == undefined) {
        pto = 100
    }
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onload = function () {
        const myobj = JSON.parse(this.responseText)
        if (myobj.s == "" && myobj.pagenum == 0) {
            document.getElementById('showlistgameImp').innerHTML = "<tr><td></td><td></td><td></td><td></td><td>No result</td><td></td><td></td><td></td></tr>"
            showPagination(myobj.pagenum)
        }
        else {
            document.getElementById('showlistgameImp').innerHTML = myobj.s
            showPagination(myobj.pagenum)
            document.querySelectorAll(".pageNum").forEach(page => {
                if (page.value == num) {
                    document.querySelector(".pageNum.active").classList.remove('active')
                    page.classList.add('active')
                }
            })
        }
    }
    xmlhttp.open("GET", "../../model/importHandle.php?query=listgame&q=" + num + "&v=" + category + "&search=" + str + "&pfrom=" + pfrom + "&pto=" + pto)
    xmlhttp.send()
}
function showPagination(dataRes) {
    let s = "<input type='button' value='1' class='pageNum active' onclick='showlistgameImp(this.value,document.getElementById(`gcategory`).value,document.getElementById(`searchgames`).value,document.getElementById(`pfrom`).value,document.getElementById(`pto`).value)'>"
    if (dataRes == 0) {
        document.getElementById('showpagination').innerHTML = ""
        return;
    }
    else if (dataRes == 1) {
        document.getElementById('showpagination').innerHTML = s
        return
    } else
        for (let i = 2; i <= dataRes; i++) {
            s += `<input type='button' value='${i}' class='pageNum' onclick='showlistgameImp(this.value,document.getElementById("gcategory").value,document.getElementById("searchgames").value,document.getElementById("pfrom").value,document.getElementById("pto").value)'>`
        }
    document.getElementById('showpagination').innerHTML = s
}


function addToImportCard(gameid) {
    //console.log(gameid);
    const mess = document.getElementById("message");
    const xml = new XMLHttpRequest;
    xml.onreadystatechange = function () {
        if (this.responseText == "exist") {
            mess.innerHTML = "You have already added this game"
        } else {
            mess.innerHTML = ''
            loadCart();
        }
    }
    xml.open("GET", "../../model/importHandle.php?query=addgame&gid=" + gameid)
    xml.send();
}

function deleteFromCart(gid) {
    const xml = new XMLHttpRequest;
    const mess = document.getElementById("message");
    xml.onreadystatechange = function () {
        if (this.responseText == "success") {
            loadCart();

        }
        else {
            mess.innerHTML = this.responseText;
        }
    }

    xml.open("GET", "../../model/importHandle.php?query=deletegame&gid=" + gid)
    xml.send();

}

function loadGeneralInfo() {
    const xml = new XMLHttpRequest;
    const geneInfo = document.querySelector(".general-info");

    xml.onreadystatechange = function () {
        geneInfo.innerHTML = this.responseText;
    }
    xml.open("GET", "../../model/importHandle.php?query=loadgen")
    xml.send();
}


function loadCart() {
    const showlistgameImp = document.getElementById("showListCardImp");
    const xml = new XMLHttpRequest;
    xml.onreadystatechange = function () {
        //console.log(this.responseText);
        updateCurrPrice('-1', '-1');
        showlistgameImp.innerHTML = this.responseText;
    }
    xml.open("GET", "../../model/importHandle.php?query=loadcart")
    xml.send();
}

function updateCurrPrice(gid, quantity_val) {

    let total_p = document.querySelector("#import-total-price");
    const mess = document.getElementById("message");
    if (quantity_val == '' || quantity_val == undefined || quantity_val == null || quantity_val == "0") {
        mess.innerHTML = "quantity must > 0";
        return;
    } else {
        mess.innerHTML = "";
    }

    const xml = new XMLHttpRequest;
    xml.onreadystatechange = function () {
        if (this.responseText == '') {
            total_p.value = 0;
        } else {
            total_p.value = this.responseText;
        }


    }
    xml.open("GET", "../../model/importHandle.php?query=cartquantity&gid=" + gid + "&quantity=" + quantity_val);
    xml.send();

}

$(document).ready(function () {
    $(window).keydown(function (event) {
        if (event.keyCode == 13) {
            event.preventDefault();
            return false;
        }
    });
});