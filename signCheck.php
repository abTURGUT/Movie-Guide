<?php

$type = $_REQUEST['type'];
$servername = "localhost";
$username = "pma";
$password = "";
$dbname = "attb_db";

$connection = mysqli_connect('localhost',$username,$password,$dbname);

$error = "";

if ($type == "signIn"){

 	$name = $_REQUEST['name'];
	$pass = $_REQUEST['password'];

	//if there is not the user name
	$myQuery = "SELECT * FROM users WHERE nickname = '$name'";
	$result = mysqli_query($connection,$myQuery);
		
	if(mysqli_num_rows($result) <= 0){
		$error = 'Wrong User Name!!';
	}
	else{
		$row = mysqli_fetch_assoc($result);
		$dbpassword = $row['userpassword']; 
		if($pass!=$dbpassword){
			$error = 'Wrong Password!!';
		}
	}
}
else{

	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$pass = $_REQUEST['password'];

	//Check for duplicate username or email.
	$myQuery = "SELECT * FROM users WHERE nickname = '$name'";
	$result = mysqli_query($connection,$myQuery);
	$myQuery2 = "SELECT * FROM users WHERE email = '$email'";
	$result2 = mysqli_query($connection,$myQuery2);

	if(mysqli_num_rows($result) > 0){
		$error = 'Username already exists!!';
	}
	else if(mysqli_num_rows($result2) > 0){
		$error = 'Email already exists!!';
	}
}
mysqli_close($connection); 
echo $error === "" ? "" : $error;
?>