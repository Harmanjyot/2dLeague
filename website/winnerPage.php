<?php
require "php/conn.php";
session_start();
if (isset($_SESSION["playerID"])) {
	$p1score = mysqli_escape_string($conn, $_GET["p1Score"]);
	$p2score = mysqli_escape_string($conn, $_GET["p2Score"]);
	$p1Touch = mysqli_escape_string($conn, $_GET["p1Touch"]);
	$p2Touch = mysqli_escape_string($conn, $_GET["p2Touch"]);
	$p1Miss = mysqli_escape_string($conn, $_GET["p1Miss"]);
	$p2Miss = mysqli_escape_string($conn, $_GET["p2Miss"]);
	$p2Name = mysqli_escape_string($conn, $_GET["p2Name"]);
    $p1Goals = mysqli_escape_string($conn, $_GET["p1Goals"]);
    $p2Goals = mysqli_escape_string($conn, $_GET["p2Goals"]);

    $sql = "SELECT * FROM playerScore where userID = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"i", $_SESSION["playerID"]);
    mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);
    $p1Newtouch = $row["saves"] + $p1Touch;
    $p1NewMiss = $row["savesMissed"] + $p1Miss;
    $p1NewGoal = $row["goals"] + $p1Goals;
    $p1NewScore = $p1Newtouch + $p1score + $p1NewGoal;

    $sql = "UPDATE playerScore SET saves = ?, savesMissed = ?, goals = ?, scoreTotal = ? where userID = ?";
	  $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"iiiii", $p1Newtouch, $p1NewMiss, $p1NewGoal, $p1NewScore , $_SESSION["playerID"]);
    mysqli_stmt_execute($stmt);


    $sql = "SELECT * FROM playerDetails where userName = ?";
	$stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"s", $p2Name);
    mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);
    $p2ID = $row["userID"];

    $sql = "SELECT * FROM playerScore where userID = ?";
    $stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"i", $p2ID);
    mysqli_stmt_execute($stmt);
    $result = $stmt->get_result();
    $row = mysqli_fetch_array($result);
    $p2Newtouch = $row["saves"] + $p2Touch;
    $p2NewMiss = $row["savesMissed"] + $p2Miss;
    $p2NewGoal = $row["goals"] + $p2Goals;
    $p2NewScore = $p2Newtouch + $p2score + $p2NewGoal;

    $sql = "UPDATE playerScore SET saves = ?, savesMissed = ?, goals = ?, scoreTotal = ? where userID = ?";
	$stmt = mysqli_stmt_init($conn);
    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt,"iiiii", $p2Newtouch, $p2NewMiss, $p2NewGoal, $p2NewScore , $p2ID);
    mysqli_stmt_execute($stmt);

    if ($p1score > $p2score) {
    	$sql = "SELECT * FROM matchesPlayed where userID = ?";
		$stmt = mysqli_stmt_init($conn);
	    mysqli_stmt_prepare($stmt, $sql);
	    mysqli_stmt_bind_param($stmt,"i", $_SESSION["playerID"]);
	    mysqli_stmt_execute($stmt);
	    $result = $stmt->get_result();
	    $row = mysqli_fetch_array($result);


	    $newMatchWon = $row["matchesWon"] + 1;
	    $newMatchPlayed = $row["matchesPlayed"] + 1;
    	$sql = "UPDATE matchesPlayed SET matchesWon = ?, matchesPlayed = ? where userID = ?";
		$stmt = mysqli_stmt_init($conn);
	    mysqli_stmt_prepare($stmt, $sql);
	    mysqli_stmt_bind_param($stmt,"iii", $newMatchWon, $newMatchPlayed , $_SESSION["playerID"]);
	    mysqli_stmt_execute($stmt);

        $sql = "SELECT * FROM matchesPlayed where userID = ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt,"i", $p2ID);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);


	    $newMatchLost = $row["matchesLost"] + 1;
	    $newMatchPlayed = $row["matchesPlayed"] + 1;
	    $sql = "UPDATE matchesPlayed SET matchesLost = ?, matchesPlayed = ? where userID = ?";
		$stmt = mysqli_stmt_init($conn);
	    mysqli_stmt_prepare($stmt, $sql);
	    mysqli_stmt_bind_param($stmt,"iii", $newMatchLost, $newMatchPlayed , $p2ID);
	    mysqli_stmt_execute($stmt);
    }
    else
    {
        $sql = "SELECT * FROM matchesPlayed where userID = ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt,"i", $p2ID);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);



	    $newMatchWon = $row["matchesWon"] + 1;
	    $newMatchPlayed = $row["matchesPlayed"] + 1;
    	$sql = "UPDATE matchesPlayed SET matchesWon = ?, matchesPlayed = ? where userID = ?";
		$stmt = mysqli_stmt_init($conn);
	    mysqli_stmt_prepare($stmt, $sql);
	    mysqli_stmt_bind_param($stmt,"iii", $newMatchWon, $newMatchPlayed, $p2ID);
	    mysqli_stmt_execute($stmt);


        $sql = "SELECT * FROM matchesPlayed where userID = ?";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt, $sql);
        mysqli_stmt_bind_param($stmt,"i", $_SESSION["playerID"]);
        mysqli_stmt_execute($stmt);
        $result = $stmt->get_result();
        $row = mysqli_fetch_array($result);


	    $newMatchLost = $row["matchesLost"] + 1;
	    $newMatchPlayed = $row["matchesPlayed"] + 1;
	    $sql = "UPDATE matchesPlayed SET matchesLost = ?, matchesplayed = ? where userID = ?";
		$stmt = mysqli_stmt_init($conn);
	    mysqli_stmt_prepare($stmt, $sql);
	    mysqli_stmt_bind_param($stmt,"iii", $newMatchLost, $newMatchPlayed, $_SESSION["playerID"]);
	    mysqli_stmt_execute($stmt);
    }

}
?>

<!DOCTYPE html>
<html>
<head>
  <title>Login</title>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='css/login.css'>
    <script src='main.js'></script>
</head>
<body>
        <div class="container">
                <form action="dash.php" method="POST">
                  <h1>2D League</h1>
                  <div  id="grad">
                     
                    <div class="row">
                    <h2 style="text-align:center">Match Over!</h2>
                      
                      <centre><button type="submit" name="Login">Return</button></centre>
                      <br>
                      <br>

                    </div>
                  </div>

                </form>
              </div>
              
              <div class="bottom-container">
               
              </div>
</body>
</html>