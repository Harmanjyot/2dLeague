<?php 
require "secure/data.php";
$dbname = $dname;
$dbuser = $duser;
$dbpass = $dpass;
$dbhost = $dhost;
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);
if ($conn) {
	echo "success";
}
else {
	echo "fail";
}
 ?>
