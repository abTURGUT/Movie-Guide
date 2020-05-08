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

        <div id = 'userLogin'> User Sign Up </div>

        <input id = 'nickName' type = 'text' class = 'loginInput' 
        placeholder="User Name">
        <input id = 'email' type = 'text' class = 'loginInput'placeholder="E-mail">
        <input id = 'password' type = 'password' class = 'loginInput'placeholder="Password">

        <div id = 'signUpError'> wrong! </div>
        
        <form name="testForm" id="testForm"  method="POST" >
        <input id = 'signUpSubmit' type = 'submit' class = 'loginSubmit' value = 'Sign Up'  onclick=" return signUpPhp();">
        </form>
        <input id = 'signIn' name="btn"; type = 'submit' class = 'signUpSubmit' value = 'Sign In' onclick="">
    </div>

  
        <?php
        
            if($_POST['btn']){
                echo "
                <script type=\"text/javascript\">
                document.getElementById('loginPanel').style.display = 'hidden';
                </script>
            ";
            }
               
             
        
        
        ?>
    
 

</body>
</html>
