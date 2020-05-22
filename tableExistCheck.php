<?php

$servername = "localhost";
$username = "pma";
$password = "";
$dbName = "attb_db";

$link = mysqli_connect($servername,$username,$password);
mysqli_select_db($link,$dbName);

if(!mysqli_query($link,'select 1 from `filmratings`') ||
   !mysqli_query($link,'select 1 from `films`') ||
   !mysqli_query($link,'select 1 from `users`'))   {include 'createDatabase.php'; }

?>