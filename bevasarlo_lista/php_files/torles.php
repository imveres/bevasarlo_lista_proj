<?php
include('db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['felhasznalo_id'])) {
    header('location: ./index.html');
    exit();
}

if (!isset($_GET['lista_id']) || !isset($_GET['torol_tetel'])) {
    header('location: ./listak.php');
    exit();
}

$user_id = $_SESSION['felhasznalo_id'];
$lista_id = mysqli_real_escape_string($conn, $_GET['lista_id']);
$ellenorzes_query = "SELECT * FROM bevasarlo_listak WHERE id='$lista_id' AND felhasznalo_id='$user_id'";
$ellenorzes_result = mysqli_query($conn, $ellenorzes_query);

if (mysqli_num_rows($ellenorzes_result) != 1) {
    header('location: ./listak.php');
    exit();
}

$tetel_id = mysqli_real_escape_string($conn, $_GET['torol_tetel']);
$torles_query = "DELETE FROM lista_elemek WHERE id='$tetel_id' AND lista_id='$lista_id'";
mysqli_query($conn, $torles_query);


header("Location: lista_szerkesztes.php?lista_id=$lista_id");
exit();
?>
