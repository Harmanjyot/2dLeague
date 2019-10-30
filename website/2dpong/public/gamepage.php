<?php
require "../../php/conn.php";
session_start();
if(isset($_SESSION["playerID"]))
{
  $player1 = $_SESSION["playerID"];
  $player2Name = mysqli_escape_string($conn, $_POST["username"]);
  echo $player2Name;
  $player2Pass = mysqli_escape_string($conn, $_POST["password"]);

  $sql = "SELECT * FROM playerDetails WHERE userName = ?";
  $stmt = mysqli_stmt_init($conn);
  mysqli_stmt_prepare($stmt, $sql);
  mysqli_stmt_bind_param($stmt,"s", $player2Name);
  mysqli_stmt_execute($stmt);
  $result = $stmt->get_result();
  if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_array($result);
	$dpass = $row["Password"];
	if (password_verify($player2Pass, $dpass)) {

?>

<html>
<head>
  <meta charset="UTF-8">
  <title>2D League</title>
  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/socket.io/2.3.0/socket.io.dev.js"></script> -->
  <script language="javascript" type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/p5.min.js"></script>
  <script language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/p5.js/0.9.0/addons/p5.dom.min.js"></script>
  <script id="p2" type="text/javascript">
  var p2name = "<?php echo $player2Name ?>";
  </script>
  <script language="javascript" type="text/javascript" src="sketch.js"></script>
  <script language="javascript" type="text/javascript" src="paddle.js"></script>
  <script language="javascript" type="text/javascript" src="ball.js"></script>
  <link rel='stylesheet' type='text/css' media='screen' href='gamepage.css'>
</head>

<body>


  
</body>
</html>

<?php
		
  }
  else{
    header("Location: ../../dash.php");
  }

}
else
	{
		header("Location: ../loginPage.php");
	}
}
?>