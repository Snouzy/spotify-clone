<?php

include("../../config.php");

if(isset($_POST['songId'])) {
    $songId = $_POST['songId'];
    echo $songId;
    $query = mysqli_query($con, "UPDATE songs SET plays = plays + 1 WHERE id='$songId'");
    if(!$query) die(mysqli_error($con));
}

?>