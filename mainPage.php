<!DOCTYPE html>

<html>
    <head>
    	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="siteStyle.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale =1.">

</head>

<body id = 'body'>
	<?php
		ob_start();
			if (isset($_COOKIE['signedIn']) && $_COOKIE['signedIn'] == 1) {
				session_start();
				$cookie_name = "signedIn";
        		$cookie_value = 1;
        		setcookie($cookie_name, $cookie_value, time() + (86400 * 0.5), "/");
        		$cookie_name = "username";
        		$cookie_value = $_COOKIE['username'];
        		setcookie($cookie_name, $cookie_value, time() + (86400 * 0.5), "/");
    		}
		
	?>
    <style>
    body {
        overflow: visible;
        background-image: linear-gradient(to bottom right, #AEA1B3, #6E5271);
    }
	</style>
	
	<?php include 'header.php';?>

    <div class="mainCanvas">
    	<?php include 'mainPageFilmShow.php';?>
    </div>
    <div id="blocked" class = 'blocked'  onclick="loginExit();"></div> 

    <div class="detailPanel" id="detailPanel">
    	<p id = "dpName"></p> 
    	<div class = "dpRatePanel">
	    	<p id= "dpRate"></p>
			<span id="star1" class="fa fa-star checked" onmouseover="rateOver(1);" onclick="rateClicked(1);"></span>
			<span id="star2" class="fa fa-star" onmouseover="rateOver(2);" onclick="rateClicked(2);"></span>
			<span id="star3" class="fa fa-star" onmouseover="rateOver(3);" onclick="rateClicked(3);"></span>
			<span id="star4" class="fa fa-star" onmouseover="rateOver(4);" onclick="rateClicked(4);"></span>
			<span id="star5" class="fa fa-star" onmouseover="rateOver(5);" onclick="rateClicked(5);"></span>
		</div>
    	<p id = "dpDescription"> </p>
    	<iframe id= "dpTrailer" src=""frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    	

    	<p id = "dpFilmId" class = "invisible"></p>
    </div>
    <div id="loginPanel" class = 'loginPanel' onclick="">
    	
		<form name="signInForm" id="signInForm" method="post" onsubmit = "return signIn();" action="<?php $_SERVER['PHP_SELF'];?>" >
	        <div id = 'userLogin'> User Login </div>

	        <input id = 'loginName' name="loginName" type = 'text' class = 'loginInput'
	        placeholder="User Name" 
	        <?php //if(isset($_SESSION['errorUserName'])) {echo " value='" . $_SESSION['errorUserName'] . "' "; $_SESSION['errorUserName']="";}?>>

	        <input id = 'loginPassword' name="loginPassword" type = 'password' class = 'loginInput' 
			placeholder="Password" 
			<?php //if(isset($_SESSION['errorPassword'])) {echo " value='" . $_SESSION['errorPassword'] . "' "; $_SESSION['errorPassword']="";}?>>

	        <div id = 'loginError'>
	        <?php if(isset($_SESSION['loginError']) && $_SESSION['loginError'] != "") { echo $_SESSION['loginError']; } else echo 'placeholder'; ?> 
	        </div>

	        <input id = 'loginSubmit' name="loginSubmit" type = 'submit' class = 'loginSubmit' value = 'Sign In' onclick="signIn();">
       
		</form>
        <input id = 'signUp' type = 'submit' class = 'signUpSubmit' value = 'Sign Up' onclick="signUpButton('clearInput');">
		
    </div>
    <div id="signUpPanel" class = 'signUpPanel' onclick="">

		<form name="signUpForm" id="signUpForm" method="post" onsubmit = "return signUp();" action="<?php $_SERVER['PHP_SELF'];?>" >
			<div id = 'userLogin'> User Sign Up </div>

	        <input id = 'nickName' name = 'nN' type = 'text' class = 'loginInput' placeholder="User Name"
	        <?php //if(isset($_SESSION['errorSUserName'])) {echo " value='" . $_SESSION['errorSUserName'] . "' "; $_SESSION['errorSUserName']="";}?>>

	        <input id = 'email' name = 'eM' type = 'text' class = 'loginInput'placeholder="E-mail" 
	        <?php //if(isset($_SESSION['errorSEmail'])) {echo " value='" . $_SESSION['errorSEmail'] . "' "; $_SESSION['errorSEmail']="";}?>>

	        <input id = 'password' name = 'pW' type = 'password' class = 'loginInput'placeholder="Password" 
	        <?php //if(isset($_SESSION['errorSPassword'])) {echo " value='" . $_SESSION['errorSPassword'] . "' "; $_SESSION['errorSPassword']="";}?>>


	        <div id = 'signUpError'>
	        	<?php if(isset($_SESSION['signUpError']) && $_SESSION['signUpError'] != "") { echo $_SESSION['signUpError']; } else echo 'placeholder'; ?> 
	        </div>

	        <input id = 'signUpSubmit' name = 'signUpSubmit' type = 'submit' class = 'loginSubmit' value = 'Sign Up' onclick="signUp();">
    </form>
    <input id = 'signIn' name="btn"; type = 'submit' class = 'signUpSubmit' value = 'Sign In' onclick="loginButton('clearInput')">
    </div>

    <div id = "accountName" class = "invisible"><?php if(isset($_COOKIE['signedIn']) && $_COOKIE['signedIn'] == 1) { echo $_COOKIE['username']; }else echo '' ?></div>
                  

	<?php 
	/*WE DONT NEED THIS AFTER THE AJAX IMPLEMENTATION
	if(isset($_SESSION['loginError']) && $_SESSION['loginError'] != null) { 
		//If 'loginError' is defined and not empty then open the login panel and show the error
		echo "<script>loginButton();</script>";
		echo "<script>document.getElementById('loginError').style.visibility = 'visible';</script>"; 
		
		//After writing the error clear it so it won't show when the user reloads
		echo $_SESSION['loginError'] = "";
		echo $_SESSION['errorUserName'] = "";
		echo $_SESSION['errorPassword'] = "";
	} 
	if(isset($_SESSION['signUpError']) && $_SESSION['signUpError'] != null) { 
		//If 'loginError' is defined and not empty then open the login panel and show the error
		echo "<script>signUpButton();</script>";
		echo "<script>document.getElementById('signUpError').style.visibility = 'visible';</script>"; 
		
		//After writing the error clear it so it won't show when the user reloads
		echo $_SESSION['signUpError'] = "";
		echo $_SESSION['errorSUserName'] = "";
		echo $_SESSION['errorSEmail'] = "";
		echo $_SESSION['errorSPassword'] = "";
		}*/
	?> 

<?php

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginName']) && isset($_POST['loginPassword'])){
            	$name = $_POST['loginName'];
				startSession($name);

/* WE DONT NEED THIS AFTER THE AJAX IMPLEMENTATION
            	$servername = "localhost";
          		$username = "pma";
         		$password = "";
         		$dbname = "attb_db";

         		$connection = mysqli_connect('localhost',$username,$password,$dbname);

         		
				$pass = $_POST['loginPassword'];

				
				//if there is not the user name
				$myQuery = "SELECT * FROM users WHERE nickname = '$name'";
				$result = mysqli_query($connection,$myQuery);
				
				if(mysqli_num_rows($result) <= 0){
					$_SESSION['loginError'] = 'Wrong User Name!';
					$_SESSION['errorUserName'] = $name;
					$_SESSION['errorPassword'] = $pass;
					header('Location: anaSayfa.php');
	            	exit;
				}
				else {
					$row = mysqli_fetch_assoc($result);
					$dbpassword = $row['userpassword']; 
					if($pass==$dbpassword){
						//If the user logs in
						startSession($name);
	            	exit;
					}
					else{
						$_SESSION['loginError'] = 'Wrong Password!';
						$_SESSION['errorUserName'] = $name;
						$_SESSION['errorPassword'] = $pass;
						header('Location: anaSayfa.php');
					}
				}*/
				
				
			}
			

			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nN']) && isset($_POST['eM']) && isset($_POST['pW'])){


            	$servername = "localhost";
          		$username = "pma";
         		$password = "";
         		$dbname = "attb_db";

         		$connection = mysqli_connect('localhost',$username,$password,$dbname);

         		$name = $_POST['nN'];
				$email = $_POST['eM'];
				$pass = $_POST['pW'];


				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
	
					$sql = "INSERT INTO users (nickname, email, userpassword) VALUES ('$name', '$email', '$pass')";
					$conn->exec($sql);						
					startSession($name);
					header('Location: mainPage.php');
	            	exit;

				} 
				catch (PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}

/* WE DONT NEED THIS AFTER THE AJAX IMPLEMENTATION
				//Check for duplicate username or email.
				$myQuery = "SELECT * FROM users WHERE nickname = '$name'";
				$result = mysqli_query($connection,$myQuery);
				$myQuery2 = "SELECT * FROM users WHERE email = '$email'";
				$result2 = mysqli_query($connection,$myQuery2);
				if(mysqli_num_rows($result) > 0){
					$_SESSION['signUpError'] = 'Username already exists!';
					$_SESSION['errorSUserName'] = $name;
					$_SESSION['errorSEmail'] = $email;
					$_SESSION['errorSPassword'] = $pass;
					header('Location: anaSayfa.php');
	            	exit;
				}
				else if(mysqli_num_rows($result2) > 0){
					$_SESSION['signUpError'] = 'Email already exists!';
					$_SESSION['errorSUserName'] = $name;
					$_SESSION['errorSEmail'] = $email;
					$_SESSION['errorSPassword'] = $pass;
					header('Location: anaSayfa.php');
					exit;

				}
				else{
					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
		
						$sql = "INSERT INTO users (nickname, email, userpassword) VALUES ('$name', '$email', '$pass')";
						$conn->exec($sql);						
						startSession($name);
						header('Location: anaSayfa.php');
		            	exit;

					} 
					catch (PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}
					$conn = null;
	          		$conn->exec($sql);

          		}*/

            }
            //LOG IN HANDLER
            function startSession($name){
            	session_start();
            	$_SESSION["signedIn"] = true;
                $_SESSION["username"] = $name;

                //COOKIE
                $cookie_name = "signedIn";
        		$cookie_value = 1;
        		setcookie($cookie_name, $cookie_value, time() + (86400 * 0.5), "/");
        		$cookie_name = "username";
        		$cookie_value = $name;
        		setcookie($cookie_name, $cookie_value, time() + (86400 * 0.5), "/");

                header('Location: mainPage.php');
            }

            

            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logOutButton']) && 
            	isset($_COOKIE['signedIn']) && $_COOKIE['signedIn'] == 1) {
         		$_SESSION['signedIn'] = false;
         		$cookie_name = "signedIn";
        		$cookie_value = 0;
        		setcookie($cookie_name, $cookie_value, time()  -(86400 * 0.5), "/");
        		$cookie_name = "username";
        		$cookie_value = "";
        		setcookie($cookie_name, $cookie_value, time()  -(86400 * 0.5), "/");
         		session_destroy();
         		header('Location: mainPage.php');
      		}
       
			ob_end_flush();
        ?>

</body>
</html>