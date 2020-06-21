<?php
	ob_start();
	session_start();

	$timezone = date_default_timezone_set("Europe/Paris");

	$con = mysqli_connect("127.0.0.1", "root", "root", "spotify-clone", "8889", "localhost:/Applications/MAMP/tmp/mysql/mysql.sock");

	if(mysqli_connect_errno()) {
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>