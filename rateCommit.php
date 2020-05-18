   
        <?php
        $filmId = $_REQUEST['filmId'];
        $userId = $_REQUEST['userId'];
        $rate = $_REQUEST['rate'];

        //create table
        $servername = "localhost";
        $username = "pma";
        $password = "";
        $dbName = "attb_db";
      
        
        $filmRate = 0;
        $con = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $con->prepare("SELECT * FROM films WHERE id = '$filmId'");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); // kolon ado ile çağırma
        while($film=$stmt->fetch()){
       // $film = $stmt->fetch();

        $rateCount = $film['fratecount'];
        $filmRate = $film['frate'];

        $filmRate = $rateCount * $filmRate;
        $filmRate += $rate;
        $rateCount++;
        $filmRate /= ($rateCount);

 
        $sql = "UPDATE films SET frate = '$filmRate', fratecount = '$rateCount' WHERE id = '$filmId'";
        $con->exec($sql);

        }
        $conn = null;
       /* $stmt = $con->prepare($sql);
        $stmt->execute();
        */
        echo $filmRate;

       
        ?>
      
