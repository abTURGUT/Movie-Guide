function loginButton(){
	document.getElementById('blocked').style.display = 'block';
	document.getElementById('loginPanel').style.display = 'block';
	document.getElementById('body').style.overflow = 'hidden';
}

function loginExit(){
	document.getElementById('blocked').style.display = 'none';
	document.getElementById('loginPanel').style.display = 'none';
	document.getElementById('body').style.overflow = 'visible';
}