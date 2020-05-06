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
        <input id = 'loginSubmit' type = 'submit' class = 'loginSubmit' value = 'Sign In'>
        <input id = 'signUp' type = 'submit' class = 'signUpSubmit' value = 'Sign Up'>
    </div>
    
</body>
</html>
