<?php 
require "../php/conn.php";

$name = mysqli_escape_string($conn, $_POST["username"]);
$pass = mysqli_escape_string($conn, $_POST["password"]);

$sql = $sql = "SELECT * from playerDetails where userName = ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt,"s", $name);
mysqli_stmt_execute($stmt);
$result = $stmt->get_result();
if (mysqli_num_rows($result) > 0) {
	$row = mysqli_fetch_array($result);
	$dpass = $row["Password"];
	if (password_verify($pass, $dpass)) {
		session_start();
		$_SESSION["playerID"] = $row["userID"];
		header("Location: ../dash.php");
	}

}
else
	{
		header("Location: ../loginPage.php");
	}


?>