<?php include("includes/header.php");

if(isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else header("Location: index.php");


$album = new Album($con, $albumId);
$artist =  new Artist($con, $_GET['id']);

?>

<div class="entityInfo">

    <div class="leftSection">
        <img src="<?=$album->getArtworkPath();?>" alt="">
    </div>
    <div class="rightSection">
        <h2><?=$album->getTitle()?></h2>
        <span>By <?=$artist->getName()?></span>
        <p><?= $album->getNumberOfSongs() > 1 ? $album->getNumberOfSongs() . " songs" : $album->getNumberOfSongs() . " song" ?></p>
    </div>

</div>

<div class="tracklistContainer">
    <ul class="tracklist">
        <?php
            $songIdArray = $album->getSongIds();
            foreach ($songIdArray as $key => $songId) {
                $albumSong = new Song($con, $songId);
                $albumArtist = $albumSong->getArtist();
                echo "
                <li class='tracklistRow'>
                    <div class='trackCount'>
                        <img class='play' src='assets/images/icons/play-white.png'/>
                        <span class='trackNumber'>" . intval($key+1) . "</span>
                    </div>

                    <div class='trackInfo'>
                        <span class='trackName'>" . $albumSong->getTitle() . "</span>
                        <span class='artistName'>" . $albumArtist->getName() . "</span>
                    </div>

                    <div class='trackOptions'>
                        <img class='optionsButton' src='assets/images/icons/more.png' />
                    </div>

                    <div class='trackDuration'>
                        <span class='duration'>" . $albumSong->getDuration() . "</span>
                    </div>
                </li>";
            }
        ?>
    </ul>
</div>

<?php include("includes/footer.php"); ?>