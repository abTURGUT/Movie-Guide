

function loginButton(status){
	if(document.getElementById('loginButtonText').innerHTML.trim() != document.getElementById('accountName').innerHTML.trim()){

		document.getElementById('blocked').style.display = 'block';
		document.getElementById('loginPanel').style.display = 'block';
		document.getElementById("signUpPanel").style.display="none"; 
		document.getElementById('body').style.overflow = 'hidden';
		document.getElementById("loginError").style.visibility="hidden"; 

		if(status=="clearInput"){
			document.getElementById('loginName').value = "";
			document.getElementById('loginPassword').value = "";
		}
	}
	

	

}

function logOut(){
	document.getElementById('loginButton').style.display = 'block';
}

function signUpButton(status){
	document.getElementById("loginPanel").style.display="none";
	document.getElementById("signUpPanel").style.display="block";
	document.getElementById("signUpError").style.visibility="hidden"; 
	document.getElementById('blocked').style.display = 'block';

	if(status=="clearInput"){
			document.getElementById('nickName').value = "";
			document.getElementById('email').value = "";
			document.getElementById('password').value = "";
	}
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
		return false;
	}
	if(name.length<=0){
		document.getElementById("loginError").innerHTML = 'name can not be empty!'; 
		document.getElementById("loginError").style.visibility="visible";
		return false;
	}
	if(password.length<=0){
		document.getElementById("loginError").innerHTML = 'password can not be empty!'; 
		document.getElementById("loginError").style.visibility="visible"; 
		return false;
	}

	
	document.getElementById("loginError").style.visibility="hidden"; 
	return true;

}

function signUp(){
	var nickname = document.getElementById('nickName').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;


	if(/^[a-zA-Z0-9- ,_]*$/.test(nickname) == false){
		document.getElementById("signUpError").innerHTML = 'you can not use special characters!'; 
		document.getElementById("signUpError").style.visibility="visible";
		return false;
	}

	if(nickname.length<=0){
		document.getElementById("signUpError").innerHTML = 'nickname can not be empty!'; 
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
