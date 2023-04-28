
showListCustomer(0,"","")

document.querySelector("#btn-return").addEventListener("click",()=> {
    // console.log("hello");
    document.querySelector('#number-best-seller').value = "0";
    document.querySelector('#date-start').value = "";
    document.querySelector('#date-end').value = "";
    document.querySelector('#category').value = "all";
    showListCustomer("0","","");
})

document.querySelector('#number-best-seller').addEventListener("change",showListCustomer)
document.querySelector('#date-start').addEventListener("change",showListCustomer)
document.querySelector('#date-end').addEventListener("change",showListCustomer)

function showListCustomer(topSell,dateStart,dateEnd) {
    topSell = document.querySelector('#number-best-seller').value;
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
    const xhr = new XMLHttpRequest()
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
    xhr.open("GET","../../model/showListCustomer.php?dateStart=" + dateStart + "&dateEnd=" + dateEnd + "&topSell=" + topSell)
    xhr.send()
}