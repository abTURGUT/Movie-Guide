<?php
$filmId = $_REQUEST['filmId'];
$userId = $_REQUEST['userId'];
$rate = $_REQUEST['rate'];

//create table
$servername = "localhost";
$username = "pma";
$password = "";
$dbName = "attb_db";

    $con = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
    $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $con->prepare("SELECT COUNT(1) FROM filmratings WHERE (cusername = '$userId' AND cfilmid = '$filmId')"); 
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_NUM);
    $countTable = $stmt->fetch();

if( $countTable[0] == 0){

    $filmRate = 0;
    $stmt = $con->prepare("SELECT * FROM films WHERE id = '$filmId'");
    $stmt->execute();
    $stmt->setFetchMode(PDO::FETCH_ASSOC); // kolon ado ile çağırma
    $film=$stmt->fetch();

    // $film = $stmt->fetch();
    $rateCount = $film['fratecount'];
    $filmRate = $film['frate'];
    $filmRate = $rateCount * $filmRate;
    $filmRate += $rate;
    $rateCount++;
    $filmRate /= ($rateCount);
    try {
        $con->beginTransaction();
        $con->exec("UPDATE films SET frate = '$filmRate', fratecount = '$rateCount' WHERE id = '$filmId'");
        $con->exec("INSERT INTO filmratings (cusername,cfilmid,crate) VALUES ('$userId', '$filmId','$rate')");
        $con->commit();
    }
    catch (PDOException $e) {
        $con->rollback();
    }
    echo $filmRate;

    $con = null;
    mysqli_close($connection); 

}
else{
    echo "404";
}
?>

