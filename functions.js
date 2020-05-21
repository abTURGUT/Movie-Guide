function loginButton(status){
	if(document.getElementById('loginButtonText').innerHTML.trim() != document.getElementById('accountName').innerHTML.trim()){

		document.getElementById('blocked').style.display = 'block';
		document.getElementById('loginPanel').style.display = 'block';
		document.getElementById("signUpPanel").style.display="none"; 
		document.getElementById('body').style.overflow = 'hidden';
		document.getElementById("loginError").style.visibility="hidden"; 

		if(status=="clearInput"){
			document.getElementById("signUpForm").reset();
			document.getElementById("signInForm").reset();
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
			document.getElementById("signUpForm").reset();
			document.getElementById("signInForm").reset();
	}
}
function loginExit(){
	document.getElementById('blocked').style.display = 'none';
	document.getElementById('loginPanel').style.display = 'none';
	document.getElementById("signUpPanel").style.display="none"; 
	document.getElementById('body').style.overflow = 'visible';

	document.getElementById('detailPanel').style.display = 'none';
	document.getElementById('dpTrailer').src = "";
}
function signIn(){
	var name = document.getElementById('loginName').value;
	var password = document.getElementById('loginPassword').value;
	document.getElementById("loginError").style.visibility="hidden"; 

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

	//DATABASE CHECK
	var dbError = "";
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
    		dbError = this.responseText; 
    		if(dbError != ""){
				document.getElementById("loginError").innerHTML = dbError;
				document.getElementById("loginError").style.visibility="visible";
				return false;
   			}
   			else if(dbError == ""){
   				document.getElementById("signInForm").submit();
   				return false;
   			}
        }
    };
    xhttp.open("POST", "signCheck.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("type=" + "signIn" + "&name=" + name + "&password=" + password);
   

	return false;

}
function signUp(){
	var nickname = document.getElementById('nickName').value;
	var email = document.getElementById('email').value;
	var password = document.getElementById('password').value;
	document.getElementById("signUpError").style.visibility="hidden"; 

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



	//DATABASE CHECK
	var dbError = "";
	var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
    if (this.readyState == 4 && this.status == 200) {
    		dbError = this.responseText; 
    		if(dbError != ""){
				document.getElementById("signUpError").innerHTML = dbError;
				document.getElementById("signUpError").style.visibility="visible";
				return false;
   			}
   			else if(dbError == ""){
   				document.getElementById("signUpForm").submit();
   				return false;
   			}
        }
    };
    xhttp.open("POST", "signCheck.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("type=" + "signUp" + "&name=" + nickname + "&email=" + email + "&password=" + password);

	
	return false;
}
function detailPanelIn(film){
	document.getElementById('blocked').style.display = 'block';
	document.getElementById('body').style.overflow = 'hidden';

	document.getElementById('detailPanel').style.display = 'block';
	document.getElementById('dpName').innerHTML = film.querySelector("p[id='featureInfoName']").innerHTML + 
												" (" + film.querySelector("p[id='featureInfoYear']").innerHTML    +") ";

	document.getElementById('dpRate').innerHTML = film.querySelector("p[id='featureInfoRate']").innerHTML;

	document.getElementById('dpDescription').innerHTML = 
	"Director: <br> &emsp;" + film.querySelector("p[id='hiddenDirector']").innerHTML + "<br>" +
	"Type: <br> &emsp;" + film.querySelector("p[id='featureInfoType']").innerHTML + "<br>" + 
	"Description: <br> &emsp;" + film.querySelector("p[id='hiddenDescription']").innerHTML;

	document.getElementById('dpTrailer').src = film.querySelector("p[id='hiddenTrailer']").innerHTML;

	document.getElementById('dpFilmId').innerHTML = film.querySelector("p[id='hiddenId']").innerHTML;

	var limit = Math.floor(parseFloat(document.getElementById('dpRate').innerHTML));
	
	for(let i = 1; i <= 5; i++){
		var starId = "star" + i;
		document.getElementById(starId).className = "fa fa-star";
	}
	for(let i = 1; i <= limit; i++){
		var starId = "star" + i;
		document.getElementById(starId).className = "fa fa-star checked";
	}


}
function rateOver(star){
	for(let i = 1; i <= 5; i++){
		var starId = "star" + i;
		document.getElementById(starId).className = "fa fa-star";
	}
	for(let i = 1; i <= star; i++){
		var starId = "star" + i;
		document.getElementById(starId).className = "fa fa-star checked";
	}
}
function rateClicked(star){
	var userId = document.getElementById("accountName").innerHTML;
	var filmId = document.getElementById("dpFilmId").innerHTML;
	if( userId != ""){
		//DATABASE CHECK
		var dbError = "";
		var xhttp = new XMLHttpRequest();
	    xhttp.onreadystatechange = function () {
	    if (this.readyState == 4 && this.status == 200 ) {
	    	if(this.responseText != 404){
	    		var dbRate = parseFloat(this.responseText).toFixed(2).replace(/[.,]00$/, "");    		
				document.getElementById("dpRate").innerHTML = dbRate;
				var x = document.querySelectorAll("div.homeFilmCanvas");
				let i = -1;
				let run = true;
				while(run){
					i++;
					if(filmId == x[i].querySelector("p[id='hiddenId']").innerHTML){
						run = false;
					}
					if( x[i].querySelector("p[id='hiddenId']").innerHTML == null) run = false;
				}
				x[i].querySelector("p[id='featureInfoRate']").innerHTML = dbRate;
			}
			else{
				alert("ALREADY SUBMITTED");
			}
        }
	    };
	    xhttp.open("POST", "rateCommit.php", true);
	    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	    xhttp.send("filmId=" + filmId + "&userId=" + userId + "&rate=" + star);
	}
	else{
		alert("ONLY USERS CAN VOTE");
	}
}

function timer(){
	var today = new Date();
    var hour = today.getHours();
    var minute = today.getMinutes();
    var second = today.getSeconds();
    document.getElementById("timeText").innerHTML =  hour + ":" + minute + ":" + second;
    var timeRenew = setTimeout(timer, 500);
}
