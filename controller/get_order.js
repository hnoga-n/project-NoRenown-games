var listOrders = document.querySelector(".list-orders");
var startIndex = 0;
var tmpData = '';
let checkOrderExist = 0;
let hideMore = '';
let checkInfoExist = true;//delivery address hide

/* window.onscroll = function(ev) {
    if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
        // you're at the bottom of the page
        if(checkOrderExist == 0) {
            console.log(startIndex);
            // get_order();
            setTimeout(get_order, 1000);
    
        } else {
            console.log("no");
        }
    }
}; */

function scrollToEndPage() {
    window.scrollTo(0, listOrders.scrollHeight - 500)
}

document.querySelector("#more").addEventListener('click',()=> {
    if(checkOrderExist == 0) {
        // console.log(startIndex);
        get_order();
        setTimeout(get_order,300);
        setTimeout(get_order,500);
        setTimeout(get_order,700);
        setTimeout(scrollToEndPage,800);
    } else {
        console.log("no");
    }
})

function changeStatus(element) { 
    if(confirm("Are you want to cancel it") == false) {
        return;
    }
    const status = 2;
    const orderID = element.parentElement.parentElement.querySelector('input').value;
    const xhr = new XMLHttpRequest();
    xhr.open("GET","../../model/change_order_status.php?status=" + status + "&orderID=" + orderID,true); 
    xhr.onload = function() {
        if(xhr.status == 200 && xhr.readyState == 4) {
            let data = xhr.responseText;
            alert(data);
            window.location.href = "../user/order.php";
        }
    }
    xhr.send();
}


function get_order() {
    let xhr = new XMLHttpRequest();
    // console.log(startIndex);
    xhr.open("GET","../../model/get_order.php?startIndex=" + startIndex,true);
    xhr.onload = function () {
        if(xhr.status == 200 & xhr.readyState == 4) {
            let data = this.responseText.split('#?+#?+')[0];
            hideMore = this.responseText.split('#?+#?+')[1];
            console.log(data);
            if (data == "NoOrder") {
                document.querySelector("#more").style.display = "none";
                listOrders.innerHTML = `<div class="notification">
                    <header>You have not paid for any products yet</header>
                    <a href="search.php" title="Move to search page">Go around and buy some stuff (Touch this)</a>
                    </div>`;
                checkOrderExist = 1;
                return;
            }
            if(data == "Stop") {
                document.querySelector("#more").style.display = "none";
                checkOrderExist = 1;
                return;
            }
            tmpData += '<div style="opacity: 0">?</div>' + data ;
            listOrders.innerHTML = tmpData;
            startIndex += 1;
            document.querySelector("#more").style.display = "block";
        } else {
            alert("Something went wrong");
        }
    }
    xhr.send();
}

get_order();

setInterval(function () {
    if(hideMore == 'Stop') {
        document.querySelector("#more").style.display = "none";
        clearInterval(this);
    }
},500)


function showAddressDetail(element) {
    // if( element.querySelector(".consigneeDetail").style.display == 'block') {
    //     element.querySelector(".consigneeDetail").style.display = 'none';
    //     return;
    // } 
    // document.querySelectorAll(".consigneeDetail").forEach(index => {
    //     index.style.display = 'none';
    // });
    element.querySelector(".consigneeDetail").style.display = 'block';
}

function hideAddressDetail(element) {
    element.querySelector(".consigneeDetail").style.display = 'none';
}


