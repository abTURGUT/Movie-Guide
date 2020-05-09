<head>
   <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
   <script src="functions.js"></script>
</head>

<body>
   <div class = "header">
      <div class = "headerTitle">
         Movie Guide
      </div>
      <div class = "headerButton">
         <p id="center">Abdullah</p>
      </div>
      <div class = "headerButton">
         <p id="center">Tayyib</p>
      </div>
      <div class = "headerButton">
         <p id="center">Yusuf</p>
      </div>
      <div class = "headerButton">
         <p id="center">Erdem</p>
      </div>
      <div class = "headerButton">
         <p id="center">Nafiz</p>
      </div>
      <div id = 'loginButton' class = "loginButton" onclick="loginButton('clearInput')">
         <p id="center"> 
            <?php if(isset($_SESSION['signedIn']) && $_SESSION['signedIn']) { 
                     echo $_SESSION['username'];
                  } 
                  else echo 'Sign In  / Up' ?></p>
      </div>
      <form name="logOutForm" id="logOutForm" method="post" onclick=" logOut()" action="<?php $_SERVER['PHP_SELF'];?>" >
      <input type = "submit" id= "logOutButton" name = "logOutButton" class = "headerLogOut" value="Log Out">
      </form>
      <?php if(!isset($_SESSION['signedIn']) || !$_SESSION['signedIn']) { 
                    echo "<script> document.getElementById('logOutButton').style.display = 'none';</script>";
                  }?>
   </div>
</body>

