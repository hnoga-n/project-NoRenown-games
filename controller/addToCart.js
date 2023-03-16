// add to cart table 
let addToCartBtn = document.querySelector('#addToCartBtn');

addToCartBtn.addEventListener('click',()=> {
    let xhr = new XMLHttpRequest();

    var arrUrl = document.URL.split("=");
    var idUrlProduct = arrUrl[arrUrl.length-1];
    var nameProduct = document.querySelector('.panel .name h2').innerHTML;  
    var priceProductAfterDiscount = document.querySelector('.price .price-number').innerHTML;
    var priceProductBeforeDiscount = document.querySelector('.price small s').innerHTML;
    var arrImgSrc = document.querySelector('.parallax img').src.split("/");
    var imgSrc = arrImgSrc[arrImgSrc.length-1];
    
    xhr.onload = function () {
        if(xhr.readyState == XMLHttpRequest.DONE) {
            if(xhr.status == 200) {
                let data = xhr.responseText;
                if(data == "NotSignIn") {
                    alert("You have not sign in yet");
                    window.location.href = "../../view/user/login.php";
                } else {
                    alert(data);
                }
            }
        }
    }
    xhr.open("GET","../../model/insertProductToCart.php?userId="+idUrlProduct+"&nameProduct="+nameProduct+"&priceProductAfterDiscount="+priceProductAfterDiscount+"&priceProductBeforeDiscount="+priceProductBeforeDiscount+"&imgSrc="+imgSrc,true);
    xhr.send();
})

//get data from cart table and inner to cart
