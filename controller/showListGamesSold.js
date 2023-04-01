var listGameSold = document.querySelector("#showListGamesSold");

showListGameSold("","","all")

document.querySelector("#btn-return").addEventListener("click",()=> {
    // console.log("hello");
    document.querySelector('#date-start').value = "";
    document.querySelector('#date-end').value = "";
    document.querySelector('#category').value = "all";
    showListGameSold("","","all");
})
document.querySelector("#category").addEventListener("change",showListGameSold)
document.querySelector("#btn-filter").addEventListener("click",showListGameSold)

// let dateStart,dateEnd,category;  

function showListGameSold(dateStart,dateEnd,category) {
    dateStart = document.querySelector('#date-start').value;
    dateEnd = document.querySelector('#date-end').value;
    if(dateStart == "") {
        dateStart = `1-1-2000`;
    }
    if(dateEnd == "") {
        const date = new Date();
        dateEnd = `${date.getFullYear()}-${date.getMonth() + 1}-${date.getDate()}`;
    } 
    category = document.querySelector('#category').value;
    // datedocument.querySelector('#category').value);
    // console.log(dateStart + "," + dateEnd + "," +category);

    const xhr = new XMLHttpRequest()
    xhr.onload = function () {
        if(this.status == 200 && this.readyState == 4) {
            const data = this.responseText;
            // console.log(data);
            listGameSold.innerHTML = data;
            calSoldQuanity();
            calRevenue();
        }
    }
    xhr.open("GET","../../model/showListGamesSold.php?dateStart=" + dateStart + "&dateEnd=" + dateEnd + "&category=" + category,true)
    xhr.send()
}

function calSoldQuanity() {
    if(!document.querySelectorAll(".sold_quantity").length) {
        document.querySelector("#sum_sold_quantity").innerHTML = "0";
    } else {
        let sumQuantity = 0;
        document.querySelectorAll(".sold_quantity").forEach(element => {
            // console.log(element.innerText);
            sumQuantity += Number(element.innerText);
        });
        document.querySelector("#sum_sold_quantity").innerHTML = sumQuantity;

    }

}

function calRevenue() {
    if(!document.querySelectorAll(".price").length) {
        document.querySelector("#revenue").innerHTML = "$0";
    } else {
        let sumRevenue = 0;
        let arrPrice = document.querySelectorAll(".price");
        let arrQuantity = document.querySelectorAll(".sold_quantity");
        for (let i = 0; i < arrPrice.length; i++) {
            // console.log(arrPrice[i]);
            // console.log(arrQuantity[i]);
            sumRevenue += Number(arrPrice[i].innerText.replace("$","")) * Number(arrQuantity[i].innerText);
        }
        document.querySelector("#revenue").innerHTML = "$" + Math.round(sumRevenue * 100)/100;
    }
}
