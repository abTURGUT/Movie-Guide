<!DOCTYPE html>

<html>
    <head>
   
        <meta charset="UTF-8">
        <meta name="viewport" content="width = device-width, initial-scale =1.">

        <style>
        .deneme{
            width:700px;
            height:500px;
            border: 6px solid #FF0000;
            margin:20px auto;
        }

        .deneme1{
            width:304px;
            height:300px;
            border: 3px solid #FF0000;
            margin:30px 20px;
            float:left;
        }

        .deneme2{
            width:304px;
            height:300px;
            border:3px solid #FF0000;
            margin:30px 20px;
            float:right;
        }
        </style>

</head>
<body>
    <div class="deneme">
        <div class="deneme1"></div>
        <div class="deneme2"></div>
    </div>

    <?php
        $con = new PDO("mysql:host=localhost;dbname=attb_db","pma","");
        if(isset($_POST['btn'])){
            $name = $_FILES[$_POST['myFile']]['name'];
            $type = $_FILES[$_POST['myFile']]['type'];
            $data = file_get_contents($_FILES[$_POST['myFile']]['tmp_name']);
            $stmt = $dbh->prepare("insert into films values('','','','','','','','','',?,'')");
            $stmt->bindParam(1,$data);
            $stmt->execute();
        }

    ?>




    <form enctype="multipart/form-data" method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="file" name="myfile" /> 
    <button name="btn" value="Upload">Yukle</button>
    </form>

   
</body>
</html>
