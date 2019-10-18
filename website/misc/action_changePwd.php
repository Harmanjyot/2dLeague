<?php

require "../php/conn.php";

$newPass = mysqli_escape_string($conn, $_POST["newPwd"]);
$vkey = mysqli_escape_string($conn, $_POST["vky"]);

$hashPass = password_hash($newPass, PASSWORD_DEFAULT);
$sql = "UPDATE verified SET Password = ? where vkey = ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt,"ss", $hashPass, $vkey);
mysqli_stmt_execute($stmt);

$sql = "SELECT * FROM verified WHERE vkey = ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt,"s", $vkey);
mysqli_stmt_execute($stmt);
$result = $stmt->get_result();
$row = mysqli_fetch_array($result);

$sql = "UPDATE playerdetails SET Password = ? where userID = ?";
$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt,"ss", $hashPass, $row["userID"]);
mysqli_stmt_execute($stmt);
header("Location: ../loginPage.php");

?>
