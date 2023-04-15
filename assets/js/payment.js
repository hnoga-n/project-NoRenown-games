let subtotal = document.getElementsByClassName("subtotal");
savedtotal = subtotal[0].innerText;

document.getElementById("6").onclick = function(e) {
    
    if (!document.getElementById("6").classList.contains("selected")){
        document.getElementById("6").classList.add("selected");
        document.getElementById("7").classList.remove("selected");
        var fee = document.getElementsByClassName("platform_fees");
        subtotal[0].innerText = parseFloat(subtotal[0].innerText) - parseFloat(fee[0].innerText) - 9999999,99 + "$";
        if(parseFloat(subtotal[0].innerText) < 0){
            subtotal[0].innerText = 0 + "$";
        }
        
    }
    e.stopPropagation;
    e.preventDefault;
    console.log("true");
}

document.getElementById("7").onclick = function() {
    document.getElementById("7").classList.add("selected");
    document.getElementById("6").classList.remove("selected");
    subtotal[0].innerText = savedtotal;
}

/* document.getElementById("formsubmit").onclick = function() {
    if(document.getElementById("7").classList.contains("selected")){
        alert("This form of payment is not supported yet");
    }
} */

document.getElementById("7").click();
