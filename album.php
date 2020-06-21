<?php include("includes/header.php");

if(isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else header("Location: index.php");

/**
 * Getting the album
 */
$stmt = mysqli_prepare($con, "SELECT * FROM `albums` WHERE id=?");
/* Lecture des marqueurs */
mysqli_stmt_bind_param($stmt, "i", $albumId);
/* Exécution de la requête */
mysqli_stmt_execute($stmt);
/* Lecture des variables résultantes */
mysqli_stmt_bind_result($stmt, $id, $title, $artist, $genre, $artworkPath);
/* Récupération des valeurs */
mysqli_stmt_fetch($stmt);
/* Fermeture de la requête */
mysqli_stmt_close($stmt);

/**
 * Getting the artist
 */
$artistStmt = mysqli_prepare($con, "SELECT `name` FROM `artists` WHERE id=?");
mysqli_stmt_bind_param($artistStmt, "i", $artist);
mysqli_stmt_execute($artistStmt);
mysqli_stmt_bind_result($artistStmt, $name);
mysqli_stmt_fetch($artistStmt);
echo $name;

mysqli_stmt_close($artistStmt);

?>

<?php include("includes/footer.php"); ?>