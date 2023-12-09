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

$lista_id = mysqli_real_escape_string($conn, $_GET['lista_id']);
$list_query = "SELECT * FROM bevasarlo_listak WHERE id='$lista_id' AND felhasznalo_id='{$_SESSION['felhasznalo_id']}'";
$list_result = mysqli_query($conn, $list_query);

if (mysqli_num_rows($list_result) != 1) {
    header('location: ./listak.php');
    exit();
}

$items_query = "SELECT le.*, p.nev AS termek_nev, u.nev AS egyseg_nev, s.nev AS bolt_nev
                FROM lista_elemek le
                INNER JOIN termekek p ON le.termek_id = p.id
                INNER JOIN egysegek u ON le.egyseg_id = u.id
                INNER JOIN boltok s ON le.bolt_id = s.id
                WHERE le.lista_id='$lista_id'";
$items_result = mysqli_query($conn, $items_query);



?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bevásárló Lista Tételek</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <?php
        $list_row = mysqli_fetch_assoc($list_result);
        echo "<h2>{$list_row['nev']}</h2>";
        echo "<p>Dátum: {$list_row['datum']}</p>";
        ?>

        <h3>Tételek:</h3>
        <ul>
            <?php
            while ($item_row = mysqli_fetch_assoc($items_result)) {
                echo "<li>{$item_row['mennyiseg']} {$item_row['egyseg_nev']} - {$item_row['termek_nev']} ({$item_row['bolt_nev']})</li>";
            }
            ?>
        </ul>
        <p><a href="listak.php">Vissza a bevásárló listákhoz</a></p>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
