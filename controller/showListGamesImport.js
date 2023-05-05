var listGameSold = document.querySelector("#showListGamesSold");

showListGameSold(0,"","","all")

document.querySelector("#btn-return").addEventListener("click",()=> {
    // console.log("hello");
    document.querySelector('#number-best-seller').value = "0";
    document.querySelector('#date-start').value = "";
    document.querySelector('#date-end').value = "";
    document.querySelector('#category').value = "all";
    showListGameSold("0","","","all");
})
document.querySelector("#category").addEventListener("change",showListGameSold)
document.querySelector('#number-best-seller').addEventListener("change",showListGameSold)
document.querySelector('#date-start').addEventListener("change",showListGameSold)
document.querySelector('#date-end').addEventListener("change",showListGameSold)
// let dateStart,dateEnd,category;  

function showListGameSold(topSell,dateStart,dateEnd,category) {
    topSell = document.querySelector('#number-best-seller').value;
    console.log(document.querySelector('#number-best-seller').value);
    dateStart = document.querySelector('#date-start').value;
    dateEnd = document.querySelector('#date-end').value;
    if(dateStart == "") {
        dateStart = `2000-01-01`;
        document.querySelector('#date-start').value = dateStart;
    }
    if(dateEnd == "") {
        const date = new Date();
        const yyyy = date.getFullYear();
        let mm = date.getMonth() + 1; // Months start at 0!
        let dd = date.getDate();

        if (dd < 10) dd = '0' + dd;
        if (mm < 10) mm = '0' + mm;

        dateEnd = `${yyyy}-${mm}-${dd}`;
        document.querySelector('#date-end').value = dateEnd;
    } 
    category = document.querySelector('#category').value;
    console.log(topSell+ "," +dateStart + "," + dateEnd + "," +category);

    const xhr = new XMLHttpRequest()
    xhr.onload = function () {
        if(this.status == 200 && this.readyState == 4) {
            const myObj = JSON.parse(this.responseText);
            console.log(myObj);
            let duration; 
            let sumQuantity = myObj.sold_quantity;
            let sumRevenue = myObj.revenue;
            console.log(sumQuantity);
            console.log(sumRevenue);
            document.querySelector("#showListGamesSold").innerHTML = myObj.data;
            calSoldQuanity(sumQuantity);
            calRevenue(sumRevenue);
        } else {
            console.log(err);
        }
    }
    xhr.open("GET","../../model/showListGamesImport.php?dateStart=" + dateStart + "&dateEnd=" + dateEnd + "&category=" + category + "&topSell=" + topSell)
    xhr.send()
}

function calSoldQuanity(sumQuantity) {
    if(!document.querySelectorAll(".sold_quantity").length) {
        document.querySelector("#sum_sold_quantity").innerHTML = "0";
    } else {
        document.querySelector("#sum_sold_quantity").innerHTML = sumQuantity;
        if(sumQuantity > 200) {
            sum = 200;
        } else {
            sum = sumQuantity;
        }
        numberAnimated(document.querySelector("#sum_sold_quantity"),sum);

        setTimeout(() => {
            document.querySelector("#sum_sold_quantity").innerHTML = new Intl.NumberFormat().format(sumQuantity);
            
        }, duration + 1000);
    }

}



function calRevenue(sumRevenue) {
    if(!document.querySelectorAll(".price").length) {
        document.querySelector("#revenue").innerHTML = "$0";
    } else {
        document.querySelector("#revenue").innerHTML = Math.round(sumRevenue * 100)/100;
        if(Math.round(sumRevenue * 100)/100 > 200) {
            sum = 200;
        } else {
            sum = Math.round(sumRevenue * 100)/100;
        }
        numberAnimated(document.querySelector("#revenue"),sum);
        setTimeout(() => {
            console.log("hello");
            document.querySelector("#revenue").innerHTML = "$" + new Intl.NumberFormat().format(Math.round(sumRevenue * 100)/100);
        }, duration + 1000);
    }
}

function numberAnimated(element,sum) {
    let interval = 500;
    let startValue = 0;
    let endValue = parseInt(sum);
    duration = Math.floor(interval / endValue);
    let counter = setInterval(function () {
        startValue += 1;
        element.textContent = startValue;
        if(startValue == endValue) {
            clearInterval(counter);
        }
    },duration);

}