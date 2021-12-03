<?php 
			

			$dbName = "attb_db";
			$servername = "localhost";
			$username = "pma";
			$password = "";
		  
			$con = new PDO("mysql:host=$servername;dbname=$dbName",$username,$password);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

			

			//categorization
			////////////////////////////////////////////////////////////////////////////////////////
			$query="";
			$cg="";

			if(isset($_GET['category'])){
				if($_GET['category']=="mainPage"){
					$query = "SELECT * FROM films ORDER BY reg_date DESC";
				}
				else if($_GET['category']=="top5"){
					$cg = $_GET['category'];
					$query = "SELECT * FROM films ORDER BY frate DESC LIMIT 5";
				}
				else{
					$cg = $_GET['category'];
					$query = "SELECT * FROM films WHERE ftype='$cg' ORDER BY reg_date DESC";
				}
				
			}
			else{
				$query = "SELECT * FROM films ORDER BY reg_date DESC";
			}
			////////////////////////////////////////////////////////////////////////////////////////

			$stmt = $con->prepare($query);
			$stmt->execute();
			$stmt->setFetchMode(PDO::FETCH_ASSOC); // kolon ado ile çağırma
			$all = $stmt->fetchAll();
			
			//page
			////////////////////////////////////////////////////////////////////////////////////////
			$columnStart;
			$columnEnd;
			$page;
			if(isset($_GET['page'])){
				$page = $_GET['page'];
				$columnStart = $page*6-6;
				$columnEnd = $page*6;
			}
			else{
				$columnStart = 0;
				$columnEnd = 6;
			}
			////////////////////////////////////////////////////////////////////////////////////////
			
			if($columnEnd>sizeof($all)){$columnEnd=sizeof($all);}
        	for($row=$columnStart; $row<$columnEnd; $row++){
            	echo '<div id = "homeFilmCanvas" class = "homeFilmCanvas" onclick="detailPanelIn(this);"> ';
            		echo "<p style='display:none' id= 'panelId' >" . $row . "</p>";
					echo '<div id = "homeFilmImage" class = "homeFilmImage" >';
						echo "<img class = 'img' src='images\\" . $all[$row]['fimage'] . "'" . "alt='hata'  width='auto' height='auto'>";
					echo '</div>';
					echo '<div id = "homeFilmInformation" class = "homeFilmInformation">';
						echo '<p style="text-align:center" id="featureTitle">NAME</p>';
						echo "<p style='text-align:center' class='featureInfo' id='featureInfoName'>" . $all[$row]['fname'] . "</p>";

						echo '<p style="text-align:center" id="featureTitle">YEAR</p>';
						echo "<p style='text-align:center' class='featureInfo'id='featureInfoYear'>" . $all[$row]['fyear'] . "</p>";

						echo '<p style="text-align:center" id="featureTitle">TYPE</p>';
						echo "<p style='text-align:center' class='featureInfo'id='featureInfoType'>" . $all[$row]['ftype'] . "</p>";
			

						$frate="";
						if($all[$row]['frate']==0){$frate="Not Rated";}else{$frate=number_format((float)$all[$row]['frate'], 2, '.', '');}
						echo '<p style="text-align:center" id="featureTitle">RATE</p>';
						echo "<p style='text-align:center' class='featureInfo'id='featureInfoRate'>" . $frate . "</p>";

						echo "<p style='display:none' id= 'hiddenDescription' >" . $all[$row]['fdescription'] . "</p>";
						echo "<p style='display:none' id= 'hiddenTrailer' >" . $all[$row]['ftrailer'] . "</p>";
						echo "<p style='display:none' id= 'hiddenDirector' >" . $all[$row]['fdirector'] . "</p>";
						echo "<p style='display:none' id= 'hiddenId' >" . $all[$row]['id'] . "</p>";
					echo '</div>';
				echo '</div>';
			}
			
			if(!isset($_GET['page'])){$page=1;}
			$columnCount = sizeof($all);
			$pageCount = (int)($columnCount/6)+1;
			if($columnCount%6==0){$pageCount--;}
			if($pageCount>1){
				echo '<div class="pagePanel">';
				for($i=1;$i<=$pageCount;$i++){
					//$url = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
					$textSize; $textColor;
					if($page!=$i){$textSize="30px"; $textColor="black"; }else{$textSize="35px"; $textColor="blue";}
					echo '<a href="mainPage.php?page='.($i). '" class="pageNo" style="' .'font-size:'. $textSize  .'; color:'. $textColor . ';">' . ($i) . '</a>';
					if($i!=$pageCount){echo '<a class="pageNoLine">-</a>';}
				}	
				echo '</div>';
			}
			
			
    	?>