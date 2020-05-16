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
         <p id="center">Home</p>
      </div>
      <div class = "headerButton">
         <p id="center">Top 5</p>
      </div>
      <div class = "headerButton">
         <p id="center">Science Fiction</p>
      </div>
      <div class = "headerButton">
         <p id="center">Horror</p>
      </div>
      <div class = "headerButton">
         <p id="center">Romantic</p>
      </div>
      <div class = "headerButton">
         <p id="center">Action</p>
      </div>
      <div class = "headerButton">
         <p id="center">Drama</p>
      </div>
      <div id = 'loginButton' class = "loginButton" onclick="loginButton('clearInput')">
         <p id="loginButtonText"> 
            <?php if(isset($_COOKIE['signedIn']) && $_COOKIE['signedIn'] == 1) { 
                     echo $_COOKIE['username'];
                  } 
                  else echo 'Sign In / Up' ?></p>
      </div>
      <form name="logOutForm" id="logOutForm" method="post" onclick=" logOut()" action="<?php $_SERVER['PHP_SELF'];?>" >
         <input type = "submit" id= "logOutButton" name = "logOutButton" class = "headerLogOut" value="Log Out">
      </form>
      <?php if(isset($_COOKIE['signedIn']) && $_COOKIE['signedIn'] == 1) { 
                    echo "<script> document.getElementById('logOutButton').style.display = 'flex';</script>";
                  }?>
   </div>
</body>

