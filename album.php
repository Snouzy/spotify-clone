<?php include("includes/header.php");

if(isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else header("Location: index.php");

//get the album
$stmt = mysqli_prepare($con, "SELECT * FROM `albums` WHERE id=?");
/* Lecture des marqueurs */
mysqli_stmt_bind_param($stmt, "i", $albumId);
/* Exécution de la requête */
mysqli_stmt_execute($stmt);
/* Lecture des variables résultantes */
mysqli_stmt_bind_result($stmt, $id, $title, $artist, $genre, $artworkPath);
/* Récupération des valeurs */
mysqli_stmt_fetch($stmt);

//get the artist
$artistStmt = mysqli_prepare($con, "SELECT `name` FROM `artists` WHERE id=?");
echo '<pre>' . print_r($artistStmt, 1) . '</pre>';
mysqli_stmt_bind_param($artistStmt, "i", $artist);
if(!$artistStmt) echo mysqli_error($con);
mysqli_stmt_execute($artistStmt);

?>

<?php include("includes/footer.php"); ?>