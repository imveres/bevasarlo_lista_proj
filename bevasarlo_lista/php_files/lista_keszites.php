<?php
include('db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['felhasznalo_id'])) {
    header('location: ../index.html');
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $felhasznalo_id = $_SESSION['felhasznalo_id'];
    $lista_nev = mysqli_real_escape_string($conn, $_POST['lista_nev']);
    $lista_datum = mysqli_real_escape_string($conn, $_POST['lista_datum']);
    $insert_query = "INSERT INTO bevasarlo_listak (felhasznalo_id, nev, datum) VALUES ('$felhasznalo_id', '$lista_nev', '$lista_datum')";
    mysqli_query($conn, $insert_query);

    header('location: ./listak.php');
    exit();
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bevásárló Lista létrehozása</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Bevásárló Lista létrehozása</h2>
        <form action="./lista_keszites.php" method="post">
            <label for="lista_nev">Lista neve:</label>
            <input type="text" id="lista_nev" name="lista_nev" required>

            <label for="lista_datum">Lista dátuma:</label>
            <input type="date" id="lista_datum" name="lista_datum" required>

            <button type="submit">Létrehozás</button>
        </form>
        <p><a href="./listak.php">Vissza a bevásárló listákhoz</a></p>
    </div>
</body>
</html>
