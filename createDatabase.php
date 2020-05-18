<!DOCTYPE html>
<!-- ABDULLAH TURĞUT , 30118062 -->
<html>
    <head>
        <meta charset="UTF-8">
</head>
<body>
    
      
        <?php

        $dbName = "attb_db";
        //server connect 
        $servername = "localhost";
        $username = "pma";
        $password = "";
        
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
        $password = "";
        
        try{
        
        $con = new PDO("mysql:host=$servername",$username,$password);
        //$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE $dbName";
        $con->exec($sql);
        echo 'Database has been created succeessfully';
        } catch (Exception $ex) {
        echo "Database could not be created" . $ex->getMessage();
        }
       
        ?>
       -->

       
        <?php
        //create table
        $servername = "localhost";
        $username = "pma";
        $password = "";
      
        
        
        $con = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        try{
        $filmsSql = "CREATE TABLE films (

                id VARCHAR(50) PRIMARY KEY,
                fname VARCHAR(50) NOT NULL,
                ftype VARCHAR(30) NOT NULL,
                fyear VARCHAR(50) NOT NULL,
                frate INT(50) DEFAULT '0',
                fratecount INT(50) DEFAULT '0',
                fcommentcount INT(50) DEFAULT '0',
                fdirector VARCHAR(50) NOT NULL,
                fdescription VARCHAR(500) NOT NULL,
                ftrailer VARCHAR(50) NOT NULL,
                fimage VARCHAR(50) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

        $con->exec($filmsSql);

         } catch (Exception $ex) {echo "films already exist";}

         try{
        $commentsSql = "CREATE TABLE comments (

                id VARCHAR(50) PRIMARY KEY,
                cowner VARCHAR(50) NOT NULL,
                comment VARCHAR(200) NOT NULL,     
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

        $con->exec($commentsSql);

        } catch (Exception $ex) {echo "comments already exist";}

        try{
        $userSql = "CREATE TABLE users (

                id int(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
                nickname VARCHAR(200) NOT NULL,        
                email VARCHAR(200) NOT NULL,     
                userpassword VARCHAR(200) NOT NULL,     
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

        $con->exec($userSql);

        } catch (Exception $ex) {echo "users already exist";}
        
        // TEMPORARY FOR TESTING
        try {
            /*
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql1 = "INSERT INTO films (id,fname,ftype,fyear,factors,fdescription,ftrailer,fimage) 
            VALUES ('theDarkKnight2008', 'The Dark Knight', 'Action','2008','Christopher Nolan','When the menace known as the Joker wreaks havoc and chaos on the people of Gotham, Batman must accept one of the greatest psychological and physical tests of his ability to fight injustice.','https://www.youtube.com/watch?v=EXeTwQWrcwY','darkknight.jpg')";
            $sql2 = "INSERT INTO films (id,fname,ftype,fyear,factors,fdescription,ftrailer,fimage) 
            VALUES ('theGodfather1972', 'The Godfather', 'Drama','1972','Francis Ford Coppola','The aging patriarch of an organized crime dynasty transfers control of his clandestine empire to his reluctant son.','https://www.youtube.com/watch?v=sY1S34973zA','thegodfather.jpg')";
            $sql3 = "INSERT INTO films (id,fname,ftype,fyear,factors,fdescription,ftrailer,fimage) 
            VALUES ('pulpFiction1994', 'Pulp Fiction', 'Drama','1994','Quentin Tarantino','The lives of two mob hitmen, a boxer, a gangster and his wife, and a pair of diner bandits intertwine in four tales of violence and redemption.','https://www.youtube.com/watch?v=s7EdQ4FqbhY','pulpfiction.jpg')";
            $sql4 = "INSERT INTO films (id,fname,ftype,fyear,factors,fdescription,ftrailer,fimage) 
            VALUES ('inception2010', 'Inception', 'Science Fiction','2010','Christopher Nolan','A thief who steals corporate secrets through the use of dream-sharing technology is given the inverse task of planting an idea into the mind of a C.E.O.','https://www.youtube.com/watch?v=YoHD9XEInc0','inception.jpg')";
            $sql5 = "INSERT INTO films (id,fname,ftype,fyear,factors,fdescription,ftrailer,fimage) 
            VALUES ('theLastSamurai2003', 'The Last Samurai', 'Action','2003','Edward Zwick','An American military advisor embraces the Samurai culture he was hired to destroy after he is captured in battle.','https://www.youtube.com/watch?v=T50_qHEOahQ','thelastsamurai.jpg')";
            $sql6 = "INSERT INTO films (id,fname,ftype,fyear,factors,fdescription,ftrailer,fimage) 
            VALUES ('theNotebook2004', 'The Notebook', 'Romantic','2004','Nick Cassavetes','A poor yet passionate young man falls in love with a rich young woman, giving her a sense of freedom, but they are soon separated because of their social differences.','https://www.youtube.com/watch?v=FC6biTjEyZw','thenotebook.jpg')";
            $con->exec($sql1);
            $con->exec($sql2);
            $con->exec($sql3);
            $con->exec($sql4);
            $con->exec($sql5);
            $con->exec($sql6);
            $con = null;
            */

        $a=simplexml_load_file("filmsData.xml");
        foreach ($a->film as $film) {
            $id=$film->id;
            $fname=$film->fname;
            $ftype=$film->ftype;
            $fyear=$film->fyear;
            $fdirector=$film->fdirector;
            $fdescription=$film->fdescription;
            $ftrailer=$film->ftrailer;
            $fimage=$film->fimage;
            
            $sql = "INSERT IGNORE INTO films (id,fname,ftype,fyear,fdirector,fdescription,ftrailer,fimage) 
            VALUES ('$id', '$fname', '$ftype','$fyear','$fdirector','$fdescription','$ftrailer','$fimage')";

            $con->exec($sql);
            
        }

        } 
        catch (PDOException $e) {
            echo $sql . "<br>" . $e->getMessage();
        }
        $con = null;
       

       
        ?>
      
</body>
</html>
