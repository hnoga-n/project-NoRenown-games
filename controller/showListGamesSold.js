var listGameSold = document.querySelector("#showListGamesSold");
let sumQuantity;
let sumRevenue;
let duration; 

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
        sumQuantity = 0;
        document.querySelectorAll(".sold_quantity").forEach(element => {
            // console.log(element.innerText);
            sumQuantity += Number(element.innerText);
        });
        document.querySelector("#sum_sold_quantity").innerHTML = sumQuantity;
        numberAnimated(document.querySelector("#sum_sold_quantity"));

        setTimeout(() => {
            document.querySelector("#sum_sold_quantity").innerHTML = sumQuantity;
            
        }, duration + 1000);
    }

}



function calRevenue() {
    if(!document.querySelectorAll(".price").length) {
        document.querySelector("#revenue").innerHTML = "$0";
    } else {
        sumRevenue = 0;
        let arrPrice = document.querySelectorAll(".price");
        let arrQuantity = document.querySelectorAll(".sold_quantity");
        for (let i = 0; i < arrPrice.length; i++) {
            sumRevenue += Number(arrPrice[i].innerText.replace("$","")) * Number(arrQuantity[i].innerText);
        }
        // console.log(sumRevenue);
        document.querySelector("#revenue").innerHTML = Math.round(sumRevenue * 100)/100;
        numberAnimated(document.querySelector("#revenue"));
        setTimeout(() => {
            document.querySelector("#revenue").innerHTML = "$" + Math.round(sumRevenue * 100)/100;
        }, duration + 1000);
    }
}

function numberAnimated(element) {
    let interval = 500;
    // console.log(valueDisplay);
    let startValue = 0;
    let endValue = parseInt(element.innerHTML);
    console.log(endValue);
    duration = Math.floor(interval / endValue);
    let counter = setInterval(function () {
        startValue += 1;
        element.textContent = startValue;
        if(startValue == endValue) {
            clearInterval(counter);
        }
    },duration);

}