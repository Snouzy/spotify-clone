<?php include("includes/header.php");

if(isset($_GET['id'])) {
    $albumId = $_GET['id'];
} else header("Location: index.php");

$stmt = mysqli_prepare($con, "SELECT * FROM albums WHERE id=?");

/* Lecture des marqueurs */
mysqli_stmt_bind_param($stmt, "i", $albumId);

/* Exécution de la requête */
mysqli_stmt_execute($stmt);

/* Lecture des variables résultantes */
mysqli_stmt_bind_result($stmt, $id, $title, $artist, $genre, $artworkPath);

/* Récupération des valeurs */
mysqli_stmt_fetch($stmt);

?>

<?php include("includes/footer.php"); ?>