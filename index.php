<?php include("includes/header.php"); ?>

<h1 class="pageHeadingBig">Vous aimerez aussi...</h1>
<div class="gridViewContainer">
    <?php
        $albumQuery = mysqli_query($con, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");
        if (!$albumQuery) die("Error: %s\n" . mysqli_error($con));

        while($row = mysqli_fetch_array($albumQuery, MYSQLI_ASSOC)) {
            echo "
            <div class='gridViewItem'>
                <a href='album.php?id=". $row['id'] ."'>
                    <img src='". $row['artwork-path'] ."'>
                    <div class='gridViewInfo'>
                        " . $row['title'] . "'
                    </div>
                </a>
            </div>
            ";
        }
    ?>
</div>
<?php include("includes/footer.php"); ?>