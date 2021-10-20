<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "";

$conn  = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}

mysqli_set_charset($conn, "utf8");