<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="siteStyle.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale =1.">

</head>

<body id = 'body'>
	<?php session_start(); ?>
    
    <style>
    body {
        overflow: visible;
        background-image: linear-gradient(to bottom right, #12567A, #5e87c1);
    }
    </style>
    <?php include 'header.php';?>
    <div class="mainCanvas">
    </div>

    <div id="blocked" class = 'blocked'  onclick="loginExit();"></div>
    <div id="loginPanel" class = 'loginPanel' onclick="">
    	
		<form name="signInForm" id="signInForm" method="post" onsubmit = "return signIn();" action="<?php $_SERVER['PHP_SELF'];?>" >
        <div id = 'userLogin'> User Login </div>
        <input id = 'loginName' name="loginName" type = 'text' class = 'loginInput' 
        placeholder="User Name" <?php if (isset($_SESSION['errorUserName'])) {echo " value='" . $_SESSION['errorUserName'] . "' "; $_SESSION['errorUserName']="";}?>>
        <input id = 'loginPassword' name="loginPassword" type = 'password' class = 'loginInput' 
		placeholder="Password" <?php if (isset($_SESSION['errorPassword'])) {echo " value='" . $_SESSION['errorPassword'] . "' "; $_SESSION['errorPassword']="";}?>>
        <div id = 'loginError'> 
        	<?php if(isset($_SESSION['error']) && $_SESSION['error'] != "") { echo $_SESSION['error']; } ?> 
        </div>
        <input id = 'loginSubmit' name="loginSubmit" type = 'submit' class = 'loginSubmit' value = 'Sign In'  onclick="signIn();">
       
		</form>
        <input id = 'signUp' type = 'submit' class = 'signUpSubmit' value = 'Sign Up' onclick="signUpButton();">
		
    </div>
    <div id="signUpPanel" class = 'signUpPanel' onclick="">
		<form name="signUpForm" id="signUpForm" method="post" onsubmit = "return signUp();" action="<?php $_SERVER['PHP_SELF'];?>" >
		<div id = 'userLogin'> User Sign Up </div>
        <input id = 'nickName' name = 'nN' type = 'text' class = 'loginInput' placeholder="User Name">
        <input id = 'email' name = 'eM' type = 'text' class = 'loginInput'placeholder="E-mail">
        <input id = 'password' name = 'pW' type = 'password' class = 'loginInput'placeholder="Password">

        <div id = 'signUpError'> wrong! </div>
        <input id = 'signUpSubmit' name = 'signUpSubmit' type = 'submit' class = 'loginSubmit' value = 'Sign Up'>
    </form>
    <input id = 'signIn' name="btn"; type = 'submit' class = 'signUpSubmit' value = 'Sign In' onclick="loginButton('clearInput')">
    </div>

    <div id = "accountName" class = "invisible"><?php if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']) { echo $_SESSION['username']; }else echo '' ?></div>
                  
	<?php if(isset($_SESSION['error']) && $_SESSION['error'] != null) { 
		//If 'error' is defined and not empty then open the login panel and show the error
		echo "<script>loginButton();</script>";
		echo "<script>document.getElementById('loginError').style.visibility = 'visible';</script>"; 
		
		//After writing the error clear it so it won't show when the user reloads
		echo $_SESSION['error'] = "";
		echo $_SESSION['errorUserName'] = "";
		echo $_SESSION['errorPassword'] = "";
	}?> 

<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['loginSubmit'])){

            	$servername = "localhost";
          		$username = "pma";
         		$password = "";
         		$dbname = "attb_db";

         		$connection = mysqli_connect('localhost',$username,$password,$dbname);

         		$name = $_POST['loginName'];
				$pass = $_POST['loginPassword'];

				//if there is not the user name
				$myQuery = "SELECT * FROM users WHERE nickname = '$name'";
				$result = mysqli_query($connection,$myQuery);
				
				if(mysqli_num_rows($result) <= 0){
					$_SESSION['error'] = 'Wrong User Name!';
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
						$_SESSION['error'] = 'Wrong Password!';
						$_SESSION['errorUserName'] = $name;
						$_SESSION['errorPassword'] = $pass;
						header('Location: anaSayfa.php');
					}
				}
				
				
			}
			

			if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signUpSubmit'])){

            	$servername = "localhost";
          		$username = "pma";
         		$password = "";
         		$dbname = "attb_db";

         		$connection = mysqli_connect('localhost',$username,$password,$dbname);

         		$name = $_POST['nN'];
				$email = $_POST['eM'];
				$pass = $_POST['pW'];

				//Check for duplicate username or email.
				$myQuery = "SELECT * FROM users WHERE nickname = '$name'";
				$result = mysqli_query($connection,$myQuery);
				$myQuery2 = "SELECT * FROM users WHERE email = '$email'";
				$result2 = mysqli_query($connection,$myQuery2);
				if(mysqli_num_rows($result) > 0 || mysqli_num_rows($result2) > 0){
					echo '<script>alert("DUPLICATE");</script>';
	            	exit;
				}
				else{
					try {
						$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
						$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);		
		
						$sql = "INSERT INTO users (nickname, email, userpassword) VALUES ('$name', '$email', '$pass')";
						$conn->exec($sql);
						$last_id = $conn->lastInsertId();
						
						startSession($name);
						header('Location: anaSayfa.php');
		            	exit;

					} 
					catch (PDOException $e) {
						echo $sql . "<br>" . $e->getMessage();
					}
					$conn = null;
	          		$conn->exec($sql);

          		}

            }
            //LOG IN HANDLER
            function startSession($name){
            	session_start();
            	$_SESSION["signedIn"] = true;
                $_SESSION["username"] = $name;

                //COOKIE



                header('Location: anaSayfa.php');
                /*echo "<script type='text/javascript'>
                                document.getElementById('logOutButton').style.display = 'block';
                                document.getElementById('loginButton').style.display = 'none';
                                </script>";*/

            }

            

            if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['logOutButton']) && 
            	isset($_SESSION['signedIn']) && $_SESSION['signedIn']) {
         		$_SESSION['signedIn'] = false;
         		session_destroy();
         		header('Location: anaSayfa.php');
      		}

   //          if(isset($_SESSION["signedIn"]) && $_SESSION["signedIn"]) {
			//     echo '<script>alert("HELLO");</script>';
			// }
			// else
			// 	echo '<script>alert("NELLO");</script>';
       
        
        ?>

</body>
</html>