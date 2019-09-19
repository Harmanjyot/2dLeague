<?php

require "../php/conn.php";


$name = mysqli_escape_string($conn, $_POST["username"]);
$email = mysqli_escape_string($conn, $_POST["email"]);
$pass = mysqli_escape_string($conn, $_POST["password1"]);
// $email = mysqli_escape_string($_POST["email"]);

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>

</body>
</html>