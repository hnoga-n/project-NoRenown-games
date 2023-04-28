
showListCustomer()

function showListCustomer() {const xhr = new XMLHttpRequest()
    xhr.onload = function () {
        if(this.status == 200 && this.readyState == 4) {
            // const myObj = JSON.parse(this.responseText);
            const data = this.responseText;
            /* console.log(myObj);
            let duration; 
            let sumQuantity = myObj.sold_quantity;
            let sumRevenue = myObj.revenue;
            console.log(sumQuantity);
            console.log(sumRevenue); */
            document.querySelector("#showListGamesSold").innerHTML = data;
            /* calSoldQuanity(sumQuantity);
            calRevenue(sumRevenue); */
        } else {
            console.log(err);
        }
    }
    xhr.open("GET","../../model/showListCustomer.php")
    xhr.send()
}