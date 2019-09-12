<?php 
	require "php/conn.php";
	$userID = mysqli_real_escape_string($_REQUEST["userID"])
	$sql = "SELECT * FROM playerscore where userID = '$userID'";
	$result = mysqli_query($conn, $sql);
	$rowPlayer = mysqli_fetch_array($result);
	$sql = "SELECT MAX(scoreTotal), userID, goals, saves, shots FROM playerscore";
	$result = mysqli_query($conn, $sql);
	$rowBestPlayer = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/stats.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	<script type="text/javascript">
		FusionCharts.ready(function(){
			var chartObj = new FusionCharts({
    type: 'radar',
    renderAt: 'chart-container',
    width: '600',
    height: '350',
    dataFormat: 'json',
    dataSource: {
        "chart": {
            "caption": "Budget Analysis",
            "subCaption": "Current month",
            "numberPreffix": "$",
            "theme": "fusion",
            "radarfillcolor": "#ffffff"
        },
        "categories": [{
            "category": [{
                "label": "Win/Loss Ratio"
            }, {
                "label": "Goals"
            }, {
                "label": "Goals Saved"
            }, {
                "label": "Shot on Goal"
            }]
        }],
        "dataset": [{
            "seriesname": "Your stats",
            "data": [{
                "value": "<?php $winsPlayer = $row["wins"]; $totalGames = $row["gamesPlayed"]; $ans = ($winsPlayer/$totalGames)*10; ?>"
            }, {
                "value": "16500"
            }, {
                "value": "14300"
            }, {
                "value": "10000"
            }, {
                "value": "9800"
            }]
        }, {
            "seriesname": "World's best",
            "data": [{
                "value": "6000"
            }, {
                "value": "9500"
            }, {
                "value": "11900"
            }, {
                "value": "8000"
            }, {
                "value": "9700"
            }]
        }]
    }
}
);
			chartObj.render();
		});
	</script>
	<title> Statistics </title>
</head>
<body>
	<div class="content_stats">
		<div class="grassOverlay"></div>
		<div id="chart-container" style="position: absolute; top: 20%;"></div>
		<div class="statTable" style="position: absolute; top: 20%; left: 60%;">
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