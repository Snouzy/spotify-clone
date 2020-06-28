<?php
    include("../../config.php"); //DB infos

    if(isset($_POST['songId'])) {
        $songId = $_POST['songId'];

        $query = mysqli_query($con, "SELECT * FROM songs WHERE id='$songId'");

        $resultArray = mysqli_fetch_array($query, MYSQLI_ASSOC);

        echo json_encode($resultArray);
    }
?>