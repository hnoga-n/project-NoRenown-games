function checkaddsupp(bool) {
    let mess = ""
    if(bool) 
        mess = "Confirm edit this supplier?"
    else 
        mess = "Confirm add this supplier?"
    

    var flagname = true;
    var flagmail = true;
    var flagtel = true;


    let name = document.getElementsByName('suppName')[0]
    let mail = document.getElementsByName('suppMail')[0]
    let tel = document.getElementsByName('suppTel')[0]

    


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
        xml.open("GET","../../model/existsupply.php?mail=" + mail.value,false);
        xml.onreadystatechange = function(){
            if(this.responseText == "mailExist"){
                alert("This email has already been used");
                mail.focus()
                flagmail = false;
            }
        };
        xml.send();
    } 
    if(tel.value == "") {
        alert("Telephone is required !!!")
        tel.focus();
        flagtel = false
    }
    else flagtel = true

    
    if(name.value == "") {
        alert("Name is required !!!")
        name.focus();
        flagname = false
    } else flagname = true
    
    if(flagname == false || flagmail == false || flagtel == false) 
        return false
    else {
        if(confirm(mess)) {
            return true
        }
        else return false
    }
}