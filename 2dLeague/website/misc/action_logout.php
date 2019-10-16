<?php

require "../php/conn.php";
session_start();
if(isset($_SESSION["playerID"]))
{
	session_unset();
	session_destroy();
	header("Location: ../loginPage.php");
}
else{
	header("Location: ../loginPage.php");
}

?>