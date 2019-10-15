<?php

require "../php/conn.php";


$name = mysqli_escape_string($conn, $_POST["username"]);
$email = mysqli_escape_string($conn, $_POST["email"]);
$pass = mysqli_escape_string($conn, $_POST["pwd"]);

$query = "SELECT * FROM playerDetails WHERE userName = '$name' OR emailID = '$email'";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result)>0) {
	echo "Email or Username already in use.";
}
else
{
	$vkey = md5(time().$name);
	echo $name;
	$to = $email;
    $subject = "2D League";
	$message = "<a href = 'http://localhost/2dLeague/2dLeague/website/loginPage.php?vkey=$vkey>Register Account</a>";
	$headers = "From: 2dleagueofficial@gmail.com";
	$headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";


    if( mail($to, $subject, $message, $headers) )
    {
    	$hashPass = password_hash($pass, PASSWORD_DEFAULT);
		$sql = "INSERT INTO verified(userName, email, Password, status, vkey) VALUES(?,?,?, '0', ?)";
		$stmt = mysqli_stmt_init($conn);
		mysqli_stmt_prepare($stmt, $sql);
		mysqli_stmt_bind_param($stmt,"ssss", $name, $email, $hashPass, $vkey);
		mysqli_stmt_execute($stmt);
		// echo "Account created";
		header("Location: ../loginPage.php");
    }
    else
    {

    	header("Location: ../loginPage.php?error");


    }


}


?>
