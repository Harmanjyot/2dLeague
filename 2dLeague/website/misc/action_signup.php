<?php

require "../php/conn.php";


$name = mysqli_escape_string($conn, $_POST["username"]);
$email = mysqli_escape_string($conn, $_POST["email"]);
$pass = mysqli_escape_string($conn, $_POST["password1"]);

$query = "SELECT * FROM playerDetails WHERE userName = '$name' OR emailID = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)>0) {
	echo "Email or Username already in use.";
}
else
{
	$hashPass = password_hash($pass, PASSWORD_DEFAULT);
	$sql = "INSERT INTO playerDetails(userName, emailID, Password) VALUES(?,?,?)";
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt,"sss", $name, $email, $hashPass);
	mysqli_stmt_execute($stmt);
	echo "Account created";
}


?>
