<?php
define("DB_HOST","localhost");
define("DB_User","root");
define("DB_Pass","");
define("DB_Name","login");


$connection = mysqli_connect(DB_HOST, DB_User, DB_Pass, DB_Name);
if(mysqli_connect_errno()){
	echo mysqli_connect_error();
	exit;
}
?>