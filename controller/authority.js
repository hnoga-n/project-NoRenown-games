
$(document).ready(function () {
  if (window.location.href.indexOf("/employee.php") > -1 && window.location.href.indexOf("?page=authorization&grid") <= -1) {
    const body = document.querySelector(".auth_table_body")
    console.log(body);

    const xml = new XMLHttpRequest
    xml.onreadystatechange = function () {
      body.innerHTML = this.responseText;
    }

    xml.open("GET", "../../model/auth_handle.php?query=listgroup");
    xml.send();
  }
});

$(document).ready(function () {
  if (window.location.href.indexOf("authorize.php?page=authorization") > -1 && window.location.href.indexOf("&grid") <= -1) {
    const auth_list_table = document.querySelector(".authorize-content");
    const group_general_info = document.querySelector(".form-general");

    const xml = new XMLHttpRequest;
    xml.onreadystatechange = function(){
      let data = this.responseText.split("###");
      group_general_info.innerHTML = data[0];
      auth_list_table.innerHTML = data[1];
    }

    xml.open("GET","../../model/auth_handle.php?query=addgroup");
    xml.send();
  }
});

$(document).ready(function(){
  if (window.location.href.indexOf("authorize.php?page=authorization&grid") > -1) {
    const group_general_info = document.querySelector(".form-general");
    const auth_list_table = document.querySelector(".authorize-content");
    url = window.location.href;
    groupID = url.split("grid=");
    console.log(groupID[1]);
    const xml = new XMLHttpRequest;
    xml.onreadystatechange = function(){
      //console.log(this.responseText);
      let data = this.responseText.split("###");
      group_general_info.innerHTML = data[0];
      auth_list_table.innerHTML = data[1]
    }
  
    xml.open("GET","../../model/auth_handle.php?query=editgroup&grid="+ groupID[1])
    xml.send();
  }
  

})

function deleteGroup(groupID){
  if(confirm("Delete this authority group ?") == true){
    const xml = new XMLHttpRequest;
    xml.onreadystatechange = function(){
      if(this.responseText.match("delete successed")){
        //alert("Delete succesed! "); 

      }
      console.log(this.responseText);
    }
    xml.open("GET","../../model/auth_handle.php?query=deletegroup&grid="+ groupID)
    xml.send();
  }
}
