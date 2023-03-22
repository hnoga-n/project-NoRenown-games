function checkaddaccount(bool) {
    let mess = ""
    if(bool) 
        mess = "Confirm edit this account?"
    else 
        mess = "Confirm add this account?"
    
    var flagname = true;
    var flagphone = true;
    var flagmail = true;
    var flagpasswd = true;
    var flagaddress = true;
    let fullname = document.getElementsByName('fullname')[0]
    let phone = document.getElementsByName('phone')[0]
    let mail = document.getElementsByName('mail')[0]
    let passwd = document.getElementsByName('passwd')[0]
    let address = document.getElementsByName('address')[0]
    
    if(passwd.value == "") {
        alert("Password is required !!!")
        passwd.focus();
        flagpasswd = false
    } else if(passwd.value.length < 8) {
        alert("Password must be more than 8 characters!!!")
        passwd.focus();
        flagpasswd = false
    } else flagpasswd = true;

    if(mail.value == "") {
        alert("Mail is required !!!")
        mail.focus();
        flagmail = false
        console.log("here1");
    } else if(mail.value.match(/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g) == null) {
        alert("Mail is not valid !!! Exp: norenown@gmail.com")
        mail.focus();
        flagmail = false
        console.log("here2");
    } else if(mail.value != "" && bool==0) {
        let xml = new XMLHttpRequest();
        xml.open("GET","../../model/checkExistUsername.php?mail=" + mail.value,false);
        xml.onreadystatechange = function(){
            if(this.responseText == "mailExist"){
                alert("This email has already been used");
                mail.focus()
                flagmail = false;
            }
        };
        xml.send();
    } 
    if(address.value == "") {
        alert("Address is required !!!")
        address.focus();
        flagaddress = false
    }
    else flagaddress = true

    if(phone.value == "") {
        alert("Phone is required !!!")
        phone.focus();
        flagphone = false
    } else if(phone.value.match(/(09)+(\d{8})\b/) == null) {
        alert("Phone is not valid !!! Exp: 0968644022")
        phone.focus();
        flagphone = false
    } else if(isNaN(phone.value)) {
        alert("Phone must be digit !!! Exp: 0968644022")
        phone.focus();
        flagphone = false
    }
    else flagphone = true

    if(fullname.value == "") {
        alert("Name is required !!!")
        fullname.focus();
        flagname = false
    } else flagname = true
    
    if(flagname == false || flagaddress == false || flagmail == false || flagpasswd == false || flagphone == false) 
        return false
    else {
        if(confirm(mess)) {
            return true
        }
        else return false
    }
}