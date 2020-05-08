function loginButton(){
	document.getElementById('blocked').style.display = 'block';
	document.getElementById('loginPanel').style.display = 'block';
	document.getElementById("signUpPanel").style.display="none"; 
	document.getElementById('body').style.overflow = 'hidden';
	document.getElementById("loginError").style.visibility="hidden"; 
	

	document.getElementById('loginName').value = "";
	document.getElementById('loginPassword').value = "";

	

}

function signUpButton(){
	document.getElementById("loginPanel").style.display="none";
	document.getElementById("signUpPanel").style.display="block";
	document.getElementById("signUpError").style.visibility="hidden"; 
}

function loginExit(){
	document.getElementById('blocked').style.display = 'none';
	document.getElementById('loginPanel').style.display = 'none';
	document.getElementById("signUpPanel").style.display="none"; 
	document.getElementById('body').style.overflow = 'visible';
}

function signIn(){
	var name = document.getElementById('loginName').value;
	var password = document.getElementById('loginPassword').value;

	if(/^[a-zA-Z0-9- ,_]*$/.test(name) == false){
		document.getElementById("loginError").innerHTML = 'you can not use special characters!'; 
		document.getElementById("loginError").style.visibility="visible";
		return; 
	}
	if(name.length<=0){
		document.getElementById("loginError").innerHTML = 'name can not be empty!'; 
		document.getElementById("loginError").style.visibility="visible";
		return;
	}
	if(password.length<=0){
		document.getElementById("loginError").innerHTML = 'password can not be empty!'; 
		document.getElementById("loginError").style.visibility="visible"; 
		return;
	}

	document.getElementById("loginError").style.visibility="hidden"; 


}

function signUp(){
	var nickanme = document.getElementById('nickName').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;


	if(/^[a-zA-Z0-9- ,_]*$/.test(nickanme) == false){
		document.getElementById("signUpError").innerHTML = 'you can not use special characters!'; 
		document.getElementById("signUpError").style.visibility="visible";
		return false;
	}

	if(nickanme.length<=0){
		document.getElementById("signUpError").innerHTML = 'nickanme can not be empty!'; 
		document.getElementById("signUpError").style.visibility="visible";
		return false;
	}
	if(email.length<=0){
		document.getElementById("signUpError").innerHTML = 'email can not be empty!'; 
		document.getElementById("signUpError").style.visibility="visible"; 
		return false;
	}

	if (/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email) == false)
	{
		document.getElementById("signUpError").innerHTML = 'your e-mail address is not valid'; 
		document.getElementById("signUpError").style.visibility="visible"; 
		return false;
	}

	if(password.length<=0){
		document.getElementById("signUpError").innerHTML = 'password can not be empty!'; 
		document.getElementById("signUpError").style.visibility="visible"; 
		return false;
	}

	document.getElementById("signUpError").style.visibility="hidden"; 
	return true;
}
