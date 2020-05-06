<!DOCTYPE html>
<!-- ABDULLAH TURĞUT , 30118062 -->
<html>
    <head>
        <meta charset="UTF-8">
    <title>abdullah turgut</title>
</head>
<body>
    
      
        <?php
        //server connect 
        $servername = "localhost";
        $username = "pma";
        $password = "abdullah";
        
        try{
        
        $con = new PDO("mysql:host=$servername",$username,$password);
        //$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); hatayı exception'un içine at
        echo "Server connection is successfully";
        } catch (Exception $ex) {
        echo "Server connection failed : " . $ex->getMessage();
        }
       
        ?>
        
        
        <!--

        <?php
        //create database
        $servername = "localhost";
        $username = "pma";
        $password = "abdullah";
        
        try{
        
        $con = new PDO("mysql:host=$servername",$username,$password);
        //$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE tayyib";
        $con->exec($sql);
        echo 'Database has been created succeessfully';
        } catch (Exception $ex) {
        echo "Database could not be created" . $ex->getMessage();
        }
       
        ?>
       -->
        
        <!--
        <?php
        //create table
        $servername = "localhost";
        $username = "pma";
        $password = "abdullah";
        $databasename = "tayyib";
        try{
        
        $con = new PDO("mysql:host=$servername;dbname=$databasename",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "CREATE TABLE erdem (
                id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                firstname VARCHAR(30) NOT NULL,
                lastname VARCHAR(30) NOT NULL,
                email VARCHAR(50),
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";
        $con->exec($sql);
        echo 'Table Tablo1 created.';
        } catch (Exception $ex) {
        echo "Table Tablo1 not created" . $ex->getMessage();
        }
       
        ?>
        -->
        
        
        <?php
        
        //data insert into table
        $servername = "localhost";
        $username = "pma";
        $password = "abdullah";
        $databasename = "tayyib";
        try{
        
        $con = new PDO("mysql:host=$servername;dbname=$databasename",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "INSERT INTO yusuf (firstname,lastname,email)
                VALUES ('erdem','demir','demir.erdem@hotmail.com')";
        $con->exec($sql);
        //$last_id = $con->lastInsertId(); // son id'yi verir
        echo 'Entering Data inserted into Tablo1';
        } catch (Exception $ex) {
        echo "Entering Data not inserted" . $ex->getMessage();
        }
        
        ?>
        
        <?php
        /*
        //delete data from table
        $servername = "localhost";
        $username = "pma";
        $password = "abdullah";
        $databasename = "veritabani";
        try{
        
        $con = new PDO("mysql:host=$servername;dbname=$databasename",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $sql = "DELETE FROM Tablo1 WHERE id=3";
        $con->exec($sql);
        echo 'Data deleted';
        } catch (Exception $ex) {
        echo "Wanted Data not deleted" . $ex->getMessage();
        }
        */
        ?>
        
        <?php
        /*
        //update data
        $servername = "localhost";
        $username = "pma";
        $password = "abdullah";
        $databasename = "veritabani";
        try{
        
        $con = new PDO("mysql:host=$servername;dbname=$databasename",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "UPDATE Tablo1 SET firstname='Ahmet' WHERE firstname='Rıdvan' ";
        
        //eğer geri dönüş istemezsek böyle yaparız(geri dönüş = değiştirilen kolon sayisi vb.)
        //con->exec($sql); 
        //echo "wanted row was updated <br>";
        
        $stmt = $con->prepare($sql);
        $stmt->execute();
        echo  $stmt-> rowCount() . " rows was updated <br>";
        } catch (Exception $ex) {
        
            
        echo "Error " . $ex->getMessage();
        }
        */
        ?>
         
         
         
        <?php
        /*
        //multiple data insert into table (roll back)
        $servername = "localhost";
        $username = "pma";
        $password = "abdullah";
        $databasename = "veritabani";
        try{
        
        $con = new PDO("mysql:host=$servername;dbname=$databasename",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        //begin transaction
        $con->beginTransaction();
        $sql1 = "INSERT INTO Tablo1 (firstname,lastname,email)
                VALUES ('Abdullah','Turgut','email@email.com')";
        $sql2 = "INSERT INTO Tablo1 (firstname,lastname,email)
                VALUES ('Fatih','Turgut','email2@email.com')";
        $sql3 = "INSERT INTO Tablo1 (firstname,lastname,email)
                VALUES ('Ahmet','Turgut','email3@email.com')";
        
        $con->exec($sql1);
        $con->exec($sql2);
        $con->exec($sql3);
         
        //commit the transaction
        $con->commit();
        echo 'Entering Data inserted into Tablo1';
        } catch (Exception $ex) {
        //hata olduğunda yapılan işlemler geri alınır
        $con->rollBack();
        echo "Error " . $ex->getMessage();
        }
        */
        ?>
          
       
          <?php
          
        //tablodan veri çekme
        $servername = "localhost";
        $username = "pma";
        $password = "abdullah";
        $databasename = "tayyib";
        try{
        
        $con = new PDO("mysql:host=$servername;dbname=$databasename",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $stmt = $con->prepare("SELECT id,firstname,lastname,email FROM yusuf ORDER By id DESC");
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC); // kolon ado ile çağırma
        //$stmt->setFetchMode(PDO::FETCH_NUM); // numara ile çağırma
        
        //tamamını fetch ederek yapma
        //$all = $stmt->fetchAll();
        /*
        for($row=0; $row<sizeof($all); $row++){
            echo $all[$row][0] . "\t" . $all[$row][1] . "\t" . $all[$row][2] . "\t" . $all[$row][3] . "<br>";
        }
         */
        
        
        while($row=$stmt->fetch()){
            
           echo $row['id'] . "\t" . $row['firstname'] . "\t" . $row['lastname'] . "\t" . $row['email'] . "<br>";
           //echo $row[0] . "\t" . $row[1] . "\t" . $row[2] . "\t" . $row[3] . "<br>";
           
        }
        
        } catch (Exception $ex) {
        //hata olduğunda yapılan işlemler geri alınır
        $con->rollBack();
        echo "Error " . $ex->getMessage();
        }
       
        ?>
          
         <?php
         /* ORDER BY işlemleri
           ("SELECT id,firstname,lastname,email FROM Tablo1 "); 
                bir değişkene göre sırala
           ("SELECT id,firstname,lastname,email FROM Tablo1 ORDER BY id DESC"); 
                ASC : kucukten buyuge sırala
                DESC : buyukten kucuge sırala
            "SELECT id,firstname,lastname,email FROM Tablo1 ORDER BY fiORDER BY firstnamerstname ASC,id DESC"); 
                eger ki firstnameleri aynı deger cikarsa ikinci olarak id lerine bakar(buyuk olanı alır)
            "SELECT id,firstname,lastname,email FROM Tablo1 ORDER BY firstname LIMIT 3 OFFSET 4");
                tablonun 3. satırından başlayıp yalnızca 4 tane satır bilgisi çeker
          */
         ?>
        
        
</body>
</html>
