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
      
        try{
        
        $con = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        
        $filmsSql = "CREATE TABLE films (

                id VARCHAR(50) PRIMARY KEY,
                fname VARCHAR(50) NOT NULL,
                ftype VARCHAR(30) NOT NULL,
                fyear VARCHAR(50) NOT NULL,
                frate VARCHAR(50) NOT NULL,
                fcommentcount VARCHAR(50) NOT NULL,
                factors VARCHAR(50) NOT NULL,
                fdescription VARCHAR(50) NOT NULL,
                ftrailer VARCHAR(50) NOT NULL,
                fimage blob NOT NULL,
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

        $commentsSql = "CREATE TABLE comments (

                id VARCHAR(50) PRIMARY KEY,
                cowner VARCHAR(50) NOT NULL,
                comment VARCHAR(200) NOT NULL,     
                reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP)";

        
        $con->exec($filmsSql);
        $con->exec($commentsSql);
        echo 'Table Tablo1 created.';
        } catch (Exception $ex) {
        echo "Table Tablo1 not created" . $ex->getMessage();
        }
       
        ?>
      
</body>
</html>
