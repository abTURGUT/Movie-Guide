<!DOCTYPE html>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="siteStyle.css">
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale =1.">

</head>

<body id = 'body'>
    
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

        <div id = 'userLogin'> User Login </div>

        <input id = 'loginName' type = 'text' class = 'loginInput' 
        placeholder="User Name">
        <input id = 'loginPassword' type = 'password' class = 'loginInput'placeholder="Password">

        <div id = 'loginError'> wrong! </div>
        
        <input id = 'loginSubmit' type = 'submit' class = 'loginSubmit' value = 'Sign In'  onclick="signIn();">
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
    <input id = 'signIn' name="btn"; type = 'submit' class = 'signUpSubmit' value = 'Sign In' onclick="">
    </div>

<?php
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['signUpSubmit'])){
            	$servername = "localhost";
          		$username = "pma";
         		$password = "";
         		$dbname = "attb_db";
				try {
					$conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

					$name = $_POST['nN'];
					$email = $_POST['eM'];
					$pass = $_POST['pW'];


					$sql = "INSERT INTO users (nickname, email, userpassword) VALUES ('$name', '$email', '$pass')";
					$conn->exec($sql);
					$last_id = $conn->lastInsertId();
					
					session_start();
					header('Location: anaSayfa.php');
	            	exit;

				} 
				catch (PDOException $e) {
					echo $sql . "<br>" . $e->getMessage();
				}
				$conn = null;
          		$conn->exec($sql);

          		

            }

             
        
        
        ?>

</body>
</html>