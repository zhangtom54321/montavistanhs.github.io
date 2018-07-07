<?php
	session_start();
	$connect = mysqli_connect("localhost","monta30","onionbath345", "monta30_nhs") or die(mysql_error());
	if(isset($_COOKIE['user'])){
		$user = $_COOKIE['user'];
		$query = mysql_query("SELECT * FROM `users` WHERE `email` = '$user' LIMIT 1");
		$row = mysql_fetch_array($query);
		$_SESSION['user'] = $user;
		$_SESSION['name'] = $row['name'];
		$_SESSION['sid'] = $row['SID'];
	}
?>
