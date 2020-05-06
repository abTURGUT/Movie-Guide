<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    <title>My php first project</title>
    <!--css dosyasını eklemek için-->
    <link rel="stylesheet" type="text/css" href="myDesign.css">
    </head>
    <body>
        <!-- /////////////////////////////////Forms-->
        <!-- POST and GET-->

        <!-- ///Sending data using post-->
        <h6>Sending data using post</h6>
        <form action = "printingforms(week5).php" method = "post">
            Name:  <input type = "text" name = "name"></input><br>
            E-mail:  <input type = "text" name = "email"></input><br>
            <input type = "submit" value="Submit" name="form1">
        </form>
        <br>
        <br>



        <!-- ///Sending data using get-->
        <h6>Sending data using get</h6>
        <form action = "printingforms(week5).php" method = "get">
            Name: <input type = "text" name = "name"></input><br>
            E-mail: <input type = "text" name = "email"></input><br>
            <input type = "submit"  value="Submit"></input>
        </form>
        <br>
        <br>



        <!-- ///////////////////////Different inputs-->
        <h6>Different types of Inputs</h6>
        <form action = "printingforms(week5).php" method = "post">
            Name: <input type="text" name="name"></input><br>
            Password: <input type="password" name="pwd"><br>
            Website: <input type="text" name="website"></input><br>
            Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
            Department:
            <input type="radio" name="dep" value="Computer Eng.">Computer Eng.</input>
            <input type="radio" name="dep" value="Software Eng.">Software Eng.</input>
            <input type="radio" name="dep" value="other">Other</input><br>
            <input type="radio" name="dep" value="other">Other2</input>
            <input type="radio" name="dep" value="other">Other3</input><br>
            <input type = "submit"  value="Submit" name="form2"></input>
        </form>

        <!-- ///Sending data to the currently executing script and clearing the data-->
        <h6>Sending data to the currently executing script</h6>
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            Name: <input type = "text" name = "name1" value="<?php $_POST['name1'] ?>"></input><br>
            E-mail: <input type = "text" name = "email1" value="<?php $_POST['email1'] ?>"></input><br>
            <input type = "submit"  value="Submit" name="testing1"></input>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (isset($_POST['testing1'])) { //<script>location.href('http://www.izu.edu.tr')</script>
                echo "<p id='errors'>" . check_input($_POST['name1']) . "</p>";
                echo "<p id='errors'>" . $_POST['email1'] . "</p>";
            }
        }
        function check_input($data) {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        ?>

        <!-- ///Sending data to the currently executing script with refilling-->
        <h6>Sending data to the currently executing script</h6>
        <form method="post" action="<?php echo check_input($_SERVER["PHP_SELF"]); ?>">
            Name: <input type = "text" name = "name"    <?php if (isset($_POST['testing2'])) {echo " value='" . check_input($_POST['name'] ) . "' ";}?>></input><br>
            E-mail: <input type = "text" name = "email" <?php if (isset($_POST['testing2'])) {echo " value='" . check_input($_POST['email']) . "' ";}?>></input><br>
            
            <input type = "submit"  value="Submit" name="testing2"></input>
        </form>
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['testing2'])) {
            echo "<p style='color: red;'>" . check_input($_POST['name']) . "</p>";
            echo "<p style='color: red;'>" . check_input($_POST['email']) . "</p>"; 
        }
        ?>
        



        <!-- ///Sending data to the currently executing script with required fields-->
        <?php
        $errors = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['testing3'])) {
            $nm = check_input($_POST["name"]);
            $em = check_input($_POST["email"]);
            $urll = check_input($_POST["webs"]);
            
            if (empty($nm)) {
                $errors = $errors . "* Name is required<br>";
            }
            if (!preg_match("/^[a-zA-Z .]*$/", $nm)) {
                $errors = $errors . "* Only letters and white space allowed<br>";
            }

            if (empty($em)) {
                $errors = $errors . "* Email is required<br>";
            }
            if (!filter_var($em, FILTER_VALIDATE_EMAIL)) {
                $errors = $errors . "* Invalid email format<br>";
            }

            if (empty($urll)) {
                $errors = $errors . "* URL is required<br>";
            }
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $urll)) {
                $errors = $errors . "* Invalid URL<br>";
            }
        }
        ?>
        <h6>Sending data to the currently executing script</h6>
        <form method = "post" action = "<?php echo check_input($_SERVER["PHP_SELF"]); ?>">
            Name: <input type = "text" name = "name" <?php if (isset($_POST['testing3'])) {echo " value='" . $nm . "' ";}?>></input><span style='color: red;'>*</span><br>
            E-mail: <input type = "text" name = "email" <?php if (isset($_POST['testing3'])) {echo " value='" . $em . "' ";}?>></input><span style='color:  red;'>*</span><br>
            Website: <input type = "text" name = "webs" <?php if (isset($_POST['testing3'])) {echo " value='" . $urll . "' ";}?>></input><span style='color:  red;'>*</span><br>
            <span style='color:  red;'><?php echo $errors ?></span>
            <input type = "submit"  value="Submit" name="testing3"></input>
        </form>
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['testing3']) && strlen($errors)==0) {
            echo "<p>" . $nm . "</p>";
            echo "<p>" . $em . "</p>";
            echo "<p>" . $urll. "</p>";
            
            session_start();
            $_SESSION = $_POST;
            session_write_close();
            header('Location: printingforms_1(week5).php');
            exit ();
        }
        ?>
        <br>
        <br>
    </body>
</html>