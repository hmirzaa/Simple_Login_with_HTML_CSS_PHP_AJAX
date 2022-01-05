<?php

require_once "db_connect.php";
require('PasswordHash.php');

if(isset($_POST["newusername"]) && isset($_POST["newemail"]) && isset($_POST["newpassword"]))
{	
	$username = $_POST["newusername"];
	$email = $_POST["newemail"];
	$password = $_POST["newpassword"];
	
	$pwdHasher = new PasswordHash(8, TRUE, 7);

	$hash = $pwdHasher->HashPassword( $password );

	mysqli_query($connection,"INSERT into users SET username='$username',
		password='$hash', email='$email'");

    if(mysqli_affected_rows($connection) > 0)
    {
        echo 'Registered Successfully! Please proceed to <a href="login.php">Login Page</a>';
        
    }else{
        $query = mysqli_query($connection,"SELECT * FROM users where username='$username'");
        $count= mysqli_num_rows($query);

        if($count==0){
            echo 'Fail to Register. Email Already Exists';
        }else{
            echo 'Fail to Register. Username Already Exists';
        }
    }
	
}

mysqli_close($connection);

?>