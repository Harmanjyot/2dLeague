<?php

require "../php/conn.php";

$email = mysqli_escape_string($conn, $_POST["email"]);
$sql = $sql = "SELECT * from verified where email = ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt,"s", $email);
mysqli_stmt_execute($stmt);
$result = $stmt->get_result();
if (mysqli_num_rows($result) > 0) {
	$vkey = md5(time().$name);
	$to = $email;
    $subject = "2D League";
	$message = "<a href = 'http://localhost/2dLeague/2dLeague/website/misc/changePwd.php?vkey=$vkey>Register Account</a>";
	$headers = "From: 2dleagueofficial@gmail.com";
	$headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

if( mail($to, $subject, $message, $headers) )
{
	$sql = "UPDATE verified SET vkey = ? WHERE email = ?";
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt,"ss", $vkey, $email);
	mysqli_stmt_execute($stmt);
		// echo "Account created";
	header("Location: ../loginPage.php");
}
else
{
	echo "I HATE MY LIFE";
}
}

?>
