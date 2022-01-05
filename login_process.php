<?php
session_start();

require_once "db_connect.php";
require('PasswordHash.php');

if(isset($_POST["username"]) && isset($_POST["password"]))
{	
	$username = $_POST["username"];
	$pass = $_POST["password"];
	
		
		$sql = "SELECT `password` FROM `users` WHERE `username` = ?";
					
		$stmt = mysqli_prepare($connection,$sql);

		
		if(is_object($stmt)){
			mysqli_stmt_bind_param($stmt ,'s', $username);
			mysqli_stmt_bind_result($stmt , $password); 
			mysqli_stmt_execute($stmt);
			mysqli_stmt_fetch($stmt);
			

            $pwdHasher = new PasswordHash(8, TRUE, 7);

	        $hash = $pwdHasher->CheckPassword($pass, $password );
			if($hash)
			{

				$_SESSION['username']= $username;
				$_SESSION['user']= true;

                echo "Logged In Successfully! Redirecting...";
				
			}else{
				
				echo "Invalid Credentials";
				
			}
						
			mysqli_stmt_close($stmt);
		
		}else{
			// $error = "Error In Fetching Record.( Statement )".mysqli_error($connection);
            echo "Failed to Login";
		}
	
}


mysqli_close($connection);

?>