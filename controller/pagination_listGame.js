let i = 1;
showlistgame(i, 0, "", "", "");
function showlistgame(num, category, str, pfrom, pto) {
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
            document.getElementById('showlistgame').innerHTML = "<tr><td colspan='9'>No result</td></tr>"
            showPagination(myobj.pagenum)
        }
        else {
            document.getElementById('showlistgame').innerHTML = myobj.s
            showPagination(myobj.pagenum)
            document.querySelectorAll(".pageNum").forEach(page => {
                if (page.value == num) {
                    document.querySelector(".pageNum.active").classList.remove('active')
                    page.classList.add('active')
                }
            })
        }
    }
    xmlhttp.open("GET", "../../model/showlistgame.php?q=" + num + "&v=" + category + "&search=" + str + "&pfrom=" + pfrom + "&pto=" + pto)
    xmlhttp.send()
}
function showPagination(dataRes) {
    let s = "<input type='button' value='1' class='pageNum active' onclick='showlistgame(this.value,document.getElementById(`gcategory`).value,document.getElementById(`searchgames`).value,document.getElementById(`pfrom`).value,document.getElementById(`pto`).value);returnPageValue(this)'>"
    if (dataRes == 0) {
        document.getElementById('showpagination').innerHTML = ""
        return;
    }
    else if (dataRes == 1) {
        document.getElementById('showpagination').innerHTML = s
        return
    } else
        for (let i = 2; i <= dataRes; i++) {
            s += `<input type='button' value='${i}' class='pageNum' onclick='showlistgame(this.value,document.getElementById("gcategory").value,document.getElementById("searchgames").value,document.getElementById("pfrom").value,document.getElementById("pto").value);returnPageValue(this)'>`
        }
    document.getElementById('showpagination').innerHTML = s
    scrollToPosition(document.getElementById('showpagination'), document.querySelectorAll('#showpagination input').length);

}
function setTrending(gid, status) {
    const xmlhttp = new XMLHttpRequest()
    xmlhttp.onload = function () {
        alert(this.responseText)
    }
    xmlhttp.open("GET", "../../model/setTrending.php?gid=" + gid + "&status=" + status)
    xmlhttp.send()
}

let tmpInputValuePage;
function returnPageValue(input) {
    tmpInputValuePage = Number(input.value);//input value pagination active
}

let tmpCount = 0;
function scrollToPosition(element, length) {
    if (tmpInputValuePage == 1 || tmpInputValuePage == 2) {
        document.querySelector('#showpagination').scrollTo(0, 0);
        return;
    } else if (tmpInputValuePage == length || tmpInputValuePage == length - 1) {
        document.querySelector('#showpagination').scrollTo(length * 50, 0);
        return;
    } else if (tmpInputValuePage == length - 2) {
        document.querySelector('#showpagination').scrollTo(tmpInputValuePage * 45, 0);
        return;
    }
    else {
        if (tmpInputValuePage > length / 2) {
            document.querySelector('#showpagination').scrollTo(tmpInputValuePage * 40, 0);
        } else {
            document.querySelector('#showpagination').scrollTo((tmpInputValuePage - 1) * 40, 0);
        }

    }

}
