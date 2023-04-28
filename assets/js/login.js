console.log("login.js join the fucking show ");


// validated and sanitize from form

function sanitizeForm(){
	const name = document.forms['signup_form']['signup_name'].value;
	const phone = document.forms['signup_form']['signup_phone'].value;
	const mail = document.forms['signup_form']['signup_mail'].value;
	const passwd =  document.forms['signup_form']['signup_passwd'].value;
	const cfm_passwd = document.forms['signup_form']['signup_passwd_cfm'].value;
	const nameMess = document.getElementById('name_validate_message');
	const phoneMess = document.getElementById('phone_validate_message');
	const mailMess = document.getElementById('mail_validate_message');
	const cfmMess = document.getElementById('passwd_cfm_message');

/* 	phone = phone.trim();
mail = mail.trim(); 
console.log(phone.trim());*/

let flagName 	= true;
let flagPhone = true;
let flagMail 	= true;
let flagPw 		= true;

	if(name == ''){
		nameMess.innerHTML = "* Name is required";
		nameMess.style.display = 'block'
		flagName = false;
	}else{
							flagName = true;
							nameMess.style.display = 'none'
							}
	if(phone == ''){
		phoneMess.innerHTML = "* Phone is required"
		phoneMess.style.display = "block"
		flagPhone = false;
	}else if(phone.match(/\D/g) != null){
		phoneMess.innerHTML = "* Phone must be digit!"
		phoneMess.style.display = 'block'
		flagPhone = false;
				}else if(phone.match(/(09)+(\d{8})\b/) == null) {
							console.log("hello");
							phoneMess.innerHTML = "* Phone is not valid ! Exp: 0968644022"
							phoneMess.style.display = 'block'
							flagPhone = false;
							}else{
									phoneMess.style.display = "none"
									flagPhone = true;
							}
				

	if(mail == ""){
		mailMess.innerHTML = "* Mail is required !"
		mailMess.style.display = 'block'
		flagMail = false;
	}else if(mail.match(/((\w|\W){5,})+@+(\w{1,})+.+(\w{1,})/i ) == null){
					mailMess.innerHTML = "* Mail is not valid ! Exp: norenown@gmail.com"
					mailMess.style.display = 'block'
					flagMail = false;
					}else if(mail != ''){
									let xml = new XMLHttpRequest();
									xml.open("GET","../../model/checkExistUsername.php?mail=" + mail,false);
									xml.onreadystatechange = function(){
										if(this.responseText == "mailExist"){
											mailMess.innerHTML = "* This email has already been used ";
											mailMess.style.display = 'block'
											flagMail = false;
											console.log(this.responseText);
										}
									};
									
									xml.send();
								}
								else{
									mailMess.style.display = 'none'
									flagMail = true;
								}
	

	if(passwd == "" || cfm_passwd == "" ){
		cfmMess.innerHTML = "* Password is required."
		cfmMess.style.display = 'block'
		flagPw = false;
	}else if(passwd != cfm_passwd){
		cfmMess.innerHTML = "* Password and confirm password must match."
		cfmMess.style.display = 'block'
		flagPw = false;
				}else{
					cfmMess.style.display = 'none'
					flagPw = true;
				}

	if(flagName==false || flagPhone ==false || flagMail ==false ||flagPw==false ){
		return false;
	}else{
		return true;
	}
	
	
}

function sanitizeSigninForm(){
	const mail = document.forms['signin_form']['signin_mail'].value;
	const passwd = document.forms['signin_form']['signin_pw'].value;
	const mailMess = document.getElementById('mail_validate_signin_message');
	const cfmMess = document.getElementById('passwd_signin_cfm_message');
	let flagMail = true;
	let flagPw = true;
	
	if(mail == ""){
		mailMess.innerHTML = "* Mail is required !"
		mailMess.style.display = 'block'
		flagMail = false;
	}else if(mail.match(/((\w|\W){5,})+@+(\w{1,})+.+(\w{1,})/i ) == null){
					mailMess.innerHTML = "* Mail is not valid ! Exp: norenown@gmail.com"
					mailMess.style.display = 'block'
					flagMail = false;
					}else{
									mailMess.style.display = 'none'
									flagMail = true;
								}

	if(passwd == "" ){
		cfmMess.innerHTML = "* Password is required."
		cfmMess.style.display = 'block'
		flagPw = false;
	}else{
					cfmMess.style.display = 'none'
					flagPw = true;
				}

	
	if(flagMail ==false ||flagPw==false ){
		return false;
	}else{
		return true;
	}	
}
function sanitizeUpdateProfileForm(){
	let name = document.forms['update_profile_form']['profile_fullname'].value;
	let phone = document.forms['update_profile_form']['profile_phone'].value;
	let passwd =  document.forms['update_profile_form']['profile_newPasswd'].value;
	//let address =  document.forms['update_profile_form']['profile_address'].value;
	const nameMess = document.getElementById('name_update_message');
	const phoneMess = document.getElementById('phone_update_message');
	const pwMess = document.getElementById('pw_update_message');

	let flagName = true;
	let flagPhone = true;
	let flagpasswd =  true;

	if(name == ''){
		nameMess.innerHTML = "* Name is required"
		nameMess.style.display = "block"
		flagName = false;
	}else{
		nameMess.style.display = "none"
		flagName = true;
	}

	if(passwd == ''){
		pwMess.innerHTML = "* Password is required"
		pwMess.style.display = "block"
		flagpasswd = false;
	}else if(passwd.length <8){
		pwMess.innerHTML = "* Password must be at least 8 characters!"
		pwMess.style.display = "block"
		flagpasswd = false;
	}else{
		pwMess.style.display = "none"
		flagpasswd = true;
	}
	if(phone == ''){
		flagPhone = false;
		phoneMess.innerHTML = "* Phone is required"
		phoneMess.style.display = "block"
	}else if(phone.match(/\D/g) != null){
					phoneMess.innerHTML = "* Phone must be digit!"
					phoneMess.style.display = 'block'
					flagPhone = false;
				}else if(phone.match(/(09)+(\d{8})\b/) == null) {
							phoneMess.innerHTML = "* Phone is not valid ! Exp: 0968644022"
							phoneMess.style.display = 'block'
							flagPhone = false;
							}else{
									phoneMess.style.display = "none"
									flagPhone = true;
							}
				
						
	if(flagPhone ==false || flagName ==false|| flagpasswd ==false ){
		return false;
	}else{
		return true;
	}
	
	
}

function sanitizeUpdateEmployeeProfileForm(){
	let name = document.forms['update_profile_employee']['user_name'].value;
	let phone = document.forms['update_profile_employee']['user_phone'].value;
	let passwd =  document.forms['update_profile_employee']['user_passwd'].value;
	const nameMess = document.getElementById('name_update_message');
	const phoneMess = document.getElementById('phone_update_message');
	const pwMess = document.getElementById('pw_update_message');

	let flagName = true;
	let flagPhone = true;
	let flagpasswd =  true;
	let flagAddress = true;

	if(name == ''){
		nameMess.innerHTML = "* Name is required"
		nameMess.style.display = "block"
		flagName = false;
		name.focus();
	}else{
		nameMess.style.display = "none"
		flagName = true;
	}

	if(passwd == ''){
		pwMess.innerHTML = "* Password is required!"
		pwMess.style.display = "block"
		flagpasswd = false;
	}else if(passwd.length <8){
		pwMess.innerHTML = "* Password must be at least 8 characters!"
		pwMess.style.display = "block"
		flagpasswd = false;
	}else{
		pwMess.style.display = "none"
		flagpasswd = true;
	}


	if(phone == ''){
		flagPhone = false;
		phoneMess.innerHTML = "* Phone is required"
		phoneMess.style.display = "block"
	}else if(phone.match(/\D/g) != null){
		phoneMess.innerHTML = "* Phone must be digit!"
		phoneMess.style.display = 'block'
		flagPhone = false;
				}else if(phone.match(/(09)+(\d{8})\b/) == null) {
							phoneMess.innerHTML = "* Phone is not valid ! Exp: 0968644022"
							phoneMess.style.display = 'block'
							flagPhone = false;
							}else{
									phoneMess.style.display = "none"
									flagPhone = true;
							}
				
						
	if(flagPhone ==false || flagName ==false || flagAddress ==false || flagpasswd ==false ){
		return false;
	}else{
		return true;
	}
}

function sanitizeContactForm(){
	let name = document.forms['contact_form']['contact_name'].value;
	let phone = document.forms['contact_form']['contact_phone'].value;
	let mail = document.forms['contact_form']['contact_mail'].value;
	let feedback= document.forms['contact_form']['contact_mail'].value;

	const nameMess = document.getElementById('name_contact_message');
	const phoneMess = document.getElementById('mail_contact_message');
	const mailMess = document.getElementById('phone_contact_message');
	const feedbackMess = document.getElementById('feedback_contact_message');


	let flagName = true;
	let flagPhone = true;
	let flagMail = true;
	let flagFeedback =  true;

	if(name == ''){
		nameMess.innerHTML = "* Name is required"
		nameMess.style.display = "block"
		flagName = false;
	}else{
		nameMess.style.display = "none"
		flagName = true;
	}

	if(phone == ''){
		flagPhone = false;
		phoneMess.innerHTML = "* Phone is required"
		phoneMess.style.display = "block"
	}else if(phone.match(/\D/g) != null){
		phoneMess.innerHTML = "* Phone must be digit!"
		phoneMess.style.display = 'block'
		flagPhone = false;
				}else if(phone.match(/(09)+(\d{8})\b/) == null) {
							phoneMess.innerHTML = "* Phone is not valid ! Exp: 0968644022"
							phoneMess.style.display = 'block'
							flagPhone = false;
							}else{
									phoneMess.style.display = "none"
									flagPhone = true;
							}
				
	if(mail == ""){
		mailMess.innerHTML = "* Mail is required !"
		mailMess.style.display = 'block'
		flagMail = false;
	}else if(mail.match(/((\w|\W){5,})+@+(\w{1,})+.+(\w{1,})/i ) == null){
					mailMess.innerHTML = "* Mail is not valid ! Exp: norenown@gmail.com"
					mailMess.style.display = 'block'
					flagMail = false;
					}else{
									mailMess.style.display = 'none'
									flagMail = true;
								}

  if(feedback=""){
		feedbackMess.innerHTML = "* Let us know what you think ^^"
		feedbackMess.style.display = 'block'
		flagFeedback = false;
	}else{
		feedbackMess.style.display = 'none'
		flagFeedback = true;
	}

	if(flagPhone ==false || flagName ==false || flagFeedback ==false || flagMail ==false ){
		return false;
	}else{
		return true;
	}
}


const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const body = document.querySelector(".body")


// css sign in/up animation 
signUpButton.addEventListener('click', () => {
	container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	container.classList.remove("right-panel-active");
});


