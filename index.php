<?php
session_start();

if(!isset($_SESSION['user'])){

	header("Location: login.php");

}

?>
Welcome to Home Page.
<br>
<br>
<br>
<a href="logout.php">
<button type="button">Logout</button>
</a>