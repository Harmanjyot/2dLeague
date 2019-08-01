<?php 
	require "php/conn.php";
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/stats.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title> Statistics </title>
</head>
<body>
	<div class="content_stats">
		<div class="grassOverlay"></div>
		<div class="statTable">
			<?php 
				$userID = htmlentities($_REQUEST["userID"]);
				if ($userID > 0)
				{
				$sql = "SELECT * FROM playerscore where userID = '$userID' ";
         		$result  = mysqli_query($conn ,$sql);
         		$row = mysqli_fetch_array($result);
         		echo "<b> Matches Played: " ; ?>
         		<br>
         		<?php
         		echo "<br> Matches Won:       " ;
         		?>
         		<br>
         		<?php
         		echo "<br> Goals Scored:      " ;
         		echo $row['goals'];
         		?>
         		<br>
         		<?php
         		echo "<br> Goals Saved:       " ;
         		echo $row['saves'];
         		?>
         		<br>
         		<?php
         		echo "<br> Shot on Goal:      ";
         		echo $row['shots'];
         		echo "</b>";
         	}
			 ?>
				
		</div>
	</div>
</body>
</html>