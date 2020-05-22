<?php

$servername = "localhost";
$username = "pma";
$password = "";
$dbName = "attb_db";

try {
    $con = new PDO("mysql:host=$servername", $username, $password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE DATABASE IF NOT EXISTS attb_db";
    $con->exec($sql);
    $con = null;
  } 
  catch (PDOException $e) {
    echo $sql . "<br>" . $e->getMessage();
  }


$link = mysqli_connect($servername,$username,$password);
mysqli_select_db($link,$dbName);

if(!mysqli_query($link,'select 1 from `filmratings`') ||
   !mysqli_query($link,'select 1 from `films`') ||
   !mysqli_query($link,'select 1 from `users`'))   {include 'createDatabase.php'; }

?>