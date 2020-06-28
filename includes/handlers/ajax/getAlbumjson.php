<?php
include("../../config.php"); //DB infos

if(isset($_POST['albumId'])) {
    $albumId = $_POST['albumId'];

    $query = mysqli_query($con, "SELECT * FROM albums WHERE id='$albumId'");

    $resultArray = mysqli_fetch_array($query, MYSQLI_ASSOC);

    echo json_encode($resultArray);
}
?>