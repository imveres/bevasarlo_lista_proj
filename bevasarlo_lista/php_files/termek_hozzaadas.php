<?php
include('db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['felhasznalo_id'])) {
    header('location: ../index.html');
    exit();
}

if (!isset($_GET['lista_id'])) {
    header('location: ./listak.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_SESSION['felhasznalo_id'];
    $lista_id = mysqli_real_escape_string($conn, $_GET['lista_id']);
    $termek_nev = mysqli_real_escape_string($conn, $_POST['termek_nev']);
    $mennyiseg = mysqli_real_escape_string($conn, $_POST['mennyiseg']);
    $egyseg = mysqli_real_escape_string($conn, $_POST['egyseg']);
    $bolt_id = mysqli_real_escape_string($conn, $_POST['bolt']);
    $check_product_query = "SELECT id FROM termekek WHERE nev='$termek_nev'";
    $check_product_result = mysqli_query($conn, $check_product_query);

    if (mysqli_num_rows($check_product_result) > 0) {
        $product_row = mysqli_fetch_assoc($check_product_result);
        $product_id = $product_row['id'];
        $insert_query = "INSERT INTO lista_elemek (lista_id, termek_id, mennyiseg, egyseg_id, bolt_id)
                         VALUES ('$lista_id', '$product_id', '$mennyiseg',
                                 (SELECT id FROM egysegek WHERE nev='$egyseg'), '$bolt_id')";
        mysqli_query($conn, $insert_query);
    } else {
        echo "A termék nem található az adatbázisban.";
    }
}


header("Location: lista_szerkesztes.php?lista_id=$lista_id");
exit();
