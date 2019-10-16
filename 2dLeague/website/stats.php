<?php 
	require "php/conn.php";
    session_start();
	$userID = $_SESSION["playerID"];
	$sql = "SELECT * FROM playerscore where userID = '$userID'";
	$result = mysqli_query($conn, $sql);
	$rowPlayer = mysqli_fetch_array($result);
	$sql = "SELECT MAX(scoreTotal), userID, goals, saves, savesMissed FROM playerscore";
	$result = mysqli_query($conn, $sql);
	$rowBestPlayer = mysqli_fetch_array($result);

  $sql = "SELECT * FROM matchesPlayed where userID = '$userID'";
  $result = mysqli_query($conn, $sql);
  $rowPlayerMatches = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="css/stats.css">
  <link rel="stylesheet" href="css/login.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/fusioncharts.js"></script>
	<script type="text/javascript" src="https://cdn.fusioncharts.com/fusioncharts/latest/themes/fusioncharts.theme.fusion.js"></script>
	<script type="text/javascript">
		const dataSource = {
  chart: {
    caption: "Skill Analysis",

    showlegend: "0",
    showdivlinevalues: "0",
    showlimits: "0",
    showvalues: "1",
    plotfillalpha: "40",
  },
  categories: [
    {
      category: [
        {
          label: "Goals Scored"
        },
        {
          label: "Goals Saved"
        },
        {
          label: "Saves Missed"
        },
        {
          label: "Matches Won"
        },
        {
          label: "Matches Lost"
        }
      ]
    }
  ],
  dataset: [
    {
      seriesname: "Ratings",
      data: [
        {
          value: "<?php echo ($rowPlayer["goals"]/$rowPlayer["saves"])*10; ?>"
        },
        {
          value: "<?php echo ($rowPlayer["saves"]/($rowPlayer["savesMissed"]+$rowPlayer["saves"]))*10; ?>"
        },
        {
          value: "<?php echo ($rowPlayer["savesMissed"]/($rowPlayer["savesMissed"]+$rowPlayer["saves"]))*10; ?>"
        },
        {
          value: "<?php echo ($rowPlayerMatches["matchesWon"]/$rowPlayerMatches["matchesPlayed"])*10; ?>"
        },
        {
          value: "<?php echo ($rowPlayerMatches["matchesLost"]/$rowPlayerMatches["matchesPlayed"])*10; ?>"
        }
      ]
    }
  ]
};

FusionCharts.ready(function() {
  var myChart = new FusionCharts({
    type: "radar",
    renderAt: "chart-container",
    width: "60%",
    height: "130%",
    dataFormat: "json",
    dataSource
  }).render();
});

	</script>
	<title> Statistics </title>
</head>
<body>

  <div style="float: right;">
    <form method="POST" action="dash.php">
        <button id="logout" type="submit" name="logout">Dash</button>
    </form>
    <form method="POST" action="misc/action_logout.php">
      <button type="submit">Logout</button>
    </form>
  </div>
  
	<div class="content_stats">
		<div class="grassOverlay" style="opacity: 1;">
		<div id="chart-container" class="charts"></div>
    </div>
		<div class="statTable">
			<?php 
				if ($userID > 0)
				{
				$sql = "SELECT * FROM playerscore where userID = '$userID' ";
         		$result  = mysqli_query($conn ,$sql);
         		$row = mysqli_fetch_array($result);
         		echo "<b> Matches Played: " ; 
            echo $rowPlayerMatches["matchesPlayed"];  
            ?>
            
         		<br>
         		<?php
         		echo "<br> Matches Won:       " ;
            echo $rowPlayerMatches["matchesWon"];
         		?>
         		<br>
            <?php
            echo "<br> Matches Lost:       " ;
            echo $rowPlayerMatches["matchesLost"];
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
         		echo "<br> Saves Missed:      ";
         		echo $row['savesMissed'];
         		echo "</b>";
         	}
			 ?>
				
		</div>
	</div>
</body>
</html>