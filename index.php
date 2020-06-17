<?php
    include("includes/config.php");

    // session_destroy(); //log out

    if(isset($_SESSION['userLoggedIn'])) {
        $userLoggedIn = $_SESSION['userLoggedIn'];
    } else {
        header("Location: register.php");
    }
?>
<html>
<head>
    <title>Welcome to Slotify!</title>
    <link rel="stylesheet" href="assets/css/main.css">
</head>

<body>
	<div id="nowPlayingBarContainer">
        <div id="nowPlayingBar">
            <div id="nowPlayingLeft"></div>
            <div id="nowPlayingCenter"></div>
            <div id="nowPlayingRight"></div>
        </div>
    </div>
</body>

</html>