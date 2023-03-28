const formPayment = document.querySelector("#payment-app form");
const info = document.querySelector(".address-form");
const user_name = info.querySelector(".name");
const street = info.querySelector(".street");
const phone = info.querySelector(".phone");

function hideAlert() {
    document.querySelector(".alerts").style.display = "none";
}

user_name.addEventListener("input",hideAlert);
street.addEventListener("input",hideAlert);
phone.addEventListener("input",hideAlert);

document.querySelector("#formsubmit").addEventListener('click',(e)=> {
    if(user_name.value == "" || street.value == "" || phone.value == "") {
        document.querySelector(".alerts").textContent = "* Input is required";
        document.querySelector(".alerts").style.display = "block";
        e.preventDefault();
        return;
    } else {
        if(!phone.value.match(/(0[3|5|7|8|9])+([0-9]{8})\b/)) {
            document.querySelector(".alerts").textContent = "* Phone number is not valid";
            document.querySelector(".alerts").style.display = "block";
            e.preventDefault();
            return; 
        }
        if(confirm("Do you want to continue") == false) {
            e.preventDefault();
        }
    }
    
})