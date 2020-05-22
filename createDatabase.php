<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
</head>
<body>

       
        <?php
        //create table
        $servername = "localhost";
        $username = "pma";
        $password = "";
        $dbName = "attb_db";
      
        
        
        $con = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        try{
        $filmsSql = "CREATE TABLE IF NOT EXISTS films (

               id VARCHAR(50) PRIMARY KEY,
                fname VARCHAR(50) NOT NULL,
                ftype VARCHAR(30) NOT NULL,
                fyear VARCHAR(50) NOT NULL,
                frate FLOAT(50),
                fratecount INT(50),
                fcommentcount INT(50) DEFAULT '0',
                fdirector VARCHAR(50) NOT NULL,
                fdescription VARCHAR(500) NOT NULL,
                ftrailer VARCHAR(50) NOT NULL,
                fimage VARCHAR(50) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

        $con->exec($filmsSql);

         } catch (Exception $ex) {echo "films already exist";}

         try{
        $ratingSql = "CREATE TABLE IF NOT EXISTS filmratings (

                id INT(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                cusername VARCHAR(50) NOT NULL,
                cfilmid VARCHAR(50) NOT NULL,
                crate INT(5) NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

        $con->exec($ratingSql);

        } catch (Exception $ex) {echo "comments already exist";}

        try{
        $userSql = "CREATE TABLE IF NOT EXISTS users (

                id int(50) UNSIGNED AUTO_INCREMENT PRIMARY KEY,  
                nickname VARCHAR(200) NOT NULL,        
                email VARCHAR(200) NOT NULL,     
                userpassword VARCHAR(200) NOT NULL,     
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP)";

        $con->exec($userSql);

        } catch (Exception $ex) {echo "users already exist";}
        

        $a=simplexml_load_file("filmsData.xml");
        foreach ($a->film as $film) {
            $id=$film->id;
            $fname=$film->fname;
            $ftype=$film->ftype;
            $fyear=$film->fyear;
            $frate=$film->frate;
            $fratecount=$film->fratecount;
            $fdirector=$film->fdirector;
            $fdescription=$film->fdescription;
            $ftrailer=$film->ftrailer;
            $fimage=$film->fimage;
            
            $sql = "INSERT IGNORE INTO films (id,fname,ftype,fyear,frate,fratecount,fdirector,fdescription,ftrailer,fimage) 
            VALUES ('$id','$fname','$ftype','$fyear','$frate','$fratecount','$fdirector','$fdescription','$ftrailer','$fimage')";

            $con->exec($sql);
            
        }
        $con = null;
       


       
        ?>
      
</body>
</html>
