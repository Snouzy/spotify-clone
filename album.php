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

<?php include("includes/footer.php"); ?>