function changestatus(orderid,status) {
    if(confirm("Confirm changing status ?")) {
        if(orderid.length == 0) {
            return
        } else {
            const xmlhttp = new XMLHttpRequest();
            xmlhttp.onload = function() {
                alert(this.responseText) 
                location.reload();
            }
            xmlhttp.open("GET","../../model/orderstatus.php?orderid=" + orderid + "&orderstatus=" + status)
            xmlhttp.send()
        }
    }
    else {
        return true
    }
}
checkstatus();

function checkstatus(){
    let lists = document.querySelectorAll('.acp');
    lists.forEach(function (list){
            list.disabled = true;
            list.disabled = true;
        
    })
    lists = document.querySelectorAll('.cnl');
    lists.forEach(function (list){
        list.disabled = true;
        list.disabled = true;
    
    })
}