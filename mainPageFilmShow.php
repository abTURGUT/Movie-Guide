<?php 
			$dbName = "attb_db";
			$servername = "localhost";
			$username = "pma";
			$password = "";
		  
			$con = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$stmt = $con->prepare("SELECT fname,ftype,fyear,frate,fimage,reg_date FROM films ORDER BY reg_date DESC");
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC); // kolon ado ile çağırma
			$all = $stmt->fetchAll();
			
			$columnStart;
			$columnEnd;
			if(isset($_GET['page'])){
				$q = $_GET['page'];
				$columnStart = $q*6-6;
				$columnEnd = $q*6;
			}
			else{
				$columnStart = 0;
				$columnEnd = 6;
			}
			
			
			if($columnEnd>sizeof($all)){$columnEnd=sizeof($all);}
        	for($row=$columnStart; $row<$columnEnd; $row++){
            	echo '<div id = "homeFilmCanvas" class = "homeFilmCanvas"> ';
					echo '<div id = "homeFilmImage" class = "homeFilmImage" >';
						echo "<img class = 'img' src='images\\" . $all[$row]['fimage'] . "'" . "alt='hata'  width='auto' height='auto'>";
					echo '</div>';
					echo '<div id = "homeFilmInformation" class = "homeFilmInformation">';
						echo '<p style="text-align:center" id="featureTitle">NAME</p>';
						echo "<p style='text-align:center' id='featureInfo'>" . $all[$row]['fname'] . "</p>";

						echo '<p style="text-align:center" id="featureTitle">YEAR</p>';
						echo "<p style='text-align:center' id='featureInfo'>" . $all[$row]['fyear'] . "</p>";

						echo '<p style="text-align:center" id="featureTitle">TYPE</p>';
						echo "<p style='text-align:center' id='featureInfo'>" . $all[$row]['ftype'] . "</p>";

						$frate="";
						if($all[$row]['frate']==0){$frate="Not Rated";}else{$frate=$all[$row]['frate'];}
						echo '<p style="text-align:center" id="featureTitle">RATE</p>';
						echo "<p style='text-align:center' id='featureInfo'>" . $frate . "</p>";
					echo '</div>';
				echo '</div>';
			}
			

			$columnCount = sizeof($all);
			$pageCount = (int)($columnCount/6)+1;
			if($columnCount%6==0){$pageCount--;}
			for($i=0;$i<$pageCount;$i++){
				echo '<a href="http://localhost/webSite/anaSayfa.php?page='.($i+1). '">' . ($i+1) . '</a>';
			}	
			
    	?>