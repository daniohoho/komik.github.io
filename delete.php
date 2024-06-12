<?php
include 'includes/db.php';
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "DELETE FROM komik WHERE id=$id";
    mysqli_query($conn, $query);
    header("Location: index.php");
}
?>
