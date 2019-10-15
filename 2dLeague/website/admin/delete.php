<?php  
 require "../php/conn.php";
 $id = mysqli_escape_string($conn, $_POST["id"]);
 $sql = "DELETE FROM playerDetails WHERE userID = ?";  
 $stmt = mysqli_stmt_init($conn);
 mysqli_stmt_prepare($stmt, $sql);
 mysqli_stmt_bind_param($stmt,"i", $id);
 mysqli_stmt_execute($stmt);
 $sql = "DELETE FROM verified WHERE userID = ?";  
 $stmt = mysqli_stmt_init($conn);
 mysqli_stmt_prepare($stmt, $sql);
 mysqli_stmt_bind_param($stmt,"i", $id);
 mysqli_stmt_execute($stmt);
 $sql = "DELETE FROM playerScore WHERE userID = ?";  
 $stmt = mysqli_stmt_init($conn);
 mysqli_stmt_prepare($stmt, $sql);
 mysqli_stmt_bind_param($stmt,"i", $id);
 mysqli_stmt_execute($stmt);
 $sql = "DELETE FROM matchesPlayed WHERE userID = ?";  
 $stmt = mysqli_stmt_init($conn);
 mysqli_stmt_prepare($stmt, $sql);
 mysqli_stmt_bind_param($stmt,"i", $id);
 mysqli_stmt_execute($stmt);
 ?>