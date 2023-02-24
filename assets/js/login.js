const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const logginMess = document.querySelector('.loggin-message ');
const confirmBtn = document.getElementById('confirm-button');
const body = document.querySelector(".body")
console.log(body);

// css sign in/up animation 
signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});

// confirm sign up sucessed box 
confirmBtn.addEventListener("click",()=>{
	console.log("hello");
	logginMess.style.display = 'none';
	body.style.display = 'flex';

})

// validated and sanitize from form

function sanitizeForm(){
	const name = document.forms['signup_form']['signup_name'].value;
	const phone = document.forms['signup_form']['signup_phone'].value;
	const mail = document.forms['signup_form']['signup_mail'].value;
	const passwd = document.forms['signup_form']['signup_passwd'].value;
	const cfm_passwd = document.forms['signup_form']['signup_passwd_cfm'].value;
	const nameMess = document.getElementById('name_validate_message');
	const phoneMess = document.getElementById('phone_validate_message');
	const mailMess = document.getElementById('mail_validate_message');
	const cfmMess = document.getElementById('passwd_cfm_message');

	let flag = true;
	if(name == ''){
		nameMess.innerHTML = "* Name is required";
		nameMess.style.display = 'block'
		flag = false;
	}
	if(phone == ""){
		phoneMess.innerHTML = "* Phone is required"
		phoneMess.style.display = "block"
		flag = false;
	}else if(phone != /\d/g){
					phoneMess.innerHTML = "* Phone must be number ! Exp: 0968644022"
					phoneMess.style.display = 'block'
					flag = false;
				}else {
					phoneMess.innerHTML = "* Phone is not valid ! Exp: 0968644022"
					phoneMess.style.display = 'block'
					flag = false;
				}
				

	if(mail == ""){
		mailMess.innerHTML = "* Mail is required !"
		mailMess.style.display = 'block'
		flag = false;
	}

	if(mail != /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/ ){
		mailMess.innerHTML = "* Mail is not valid ! Exp: norenown@gmail.com"
		phoneMess.style.display = 'block'
		flag = false;
	}
	if(passwd != cfm_passwd){
		cfmMess.innerHTML = "* Password and confirm password must match."
		cfmMess.style.display = 'block'
		flag = false;
	}
	return flag;
	
}
