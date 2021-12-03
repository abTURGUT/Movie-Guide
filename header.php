<head>
   <link href="https://fonts.googleapis.com/css2?family=Fjalla+One&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
   <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,500&display=swap" rel="stylesheet">
   <script src="functions.js"></script>
</head>

<body>
   <div class = "header">
      <div class = "headerTitle">
         Movie Guide
      </div>
      <div class = "headerButton">
         <a href="http://localhost/webSite/mainPage.php?category=mainPage" style="visited:color: rgb(227, 216, 95);" class="headerBtn"><p id="center">Home</p></a>
      </div>
      <div class = "headerButton">
         <a href="http://localhost/webSite/mainPage.php?category=top5" class="headerBtn"><p id="center">Top 5</p></a>
      </div>
      <div class = "headerButton">
         <a href="http://localhost/webSite/mainPage.php?category=Science+Fiction" class="headerBtn"><p id="center">Science Fiction</p></a>
      </div>
      <div class = "headerButton">
         <a href="http://localhost/webSite/mainPage.php?category=Horror" class="headerBtn"><p id="center">Horror</p></a>
      </div>
      <div class = "headerButton">
         <a href="http://localhost/webSite/mainPage.php?category=Romance" class="headerBtn"><p id="center">Romance</p></a>
      </div>
      <div class = "headerButton">
         <a href="http://localhost/webSite/mainPage.php?category=Action" class="headerBtn"><p id="center">Action</p></a>
      </div>
      <div class = "headerButton">
         <a href="http://localhost/webSite/mainPage.php?category=Drama" class="headerBtn"><p id="center">Drama</p></a>
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

