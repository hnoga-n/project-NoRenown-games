const lis = document.querySelectorAll(".header_menu_bar ul li");
const lbs = document.querySelectorAll(".lb");
const ul = document.querySelector("ul");
const lineDash = document.querySelector(".line-dash");


lis[0].classList.add("header_menu_barLiColor");


lis.forEach((li)=> {
  li.addEventListener("click",()=> {
    document.querySelector(".header_menu_bar ul li.header_menu_barLiColor").classList.remove("header_menu_barLiColor");
    li.classList.add("header_menu_barLiColor");

    const xhr = new XMLHttpRequest();
    xhr.open("GET","../../model/navigate_statistic.php?case=" + li.innerHTML);
    xhr.onload = function() {
      if(xhr.status == 200 && xhr.readyState == 4) {
        let data = xhr.responseText;
        // alert(data);
        document.querySelector("#container").innerHTML = data;
        // console.log(document.querySelector("#showListGamesSold"));
        // console.log(document.querySelector("#category"));
        
        if (li.innerHTML == "Sold out") {
          
          const script = document.createElement('script');
          script.src = '../../controller/showListGamesSold.js';
          document.querySelector("#container").appendChild(script);
        } else if (li.innerHTML == "Import") {
          
          const script = document.createElement('script');
          script.src = '../../controller/showListGamesImport.js';
          document.querySelector("#container").appendChild(script);
        }  else if (li.innerHTML == "Customer") {
          
          const script = document.createElement('script');
          script.src = '../../controller/showListCustomer.js';
          document.querySelector("#container").appendChild(script);
        }
      }
    }
    xhr.send();

    
  })
})
