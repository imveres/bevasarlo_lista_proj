<?php
include('db.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['felhasznalo_id'])) {
    header('location: ../index.html');
    exit();
}

$felhasznalo_id = $_SESSION['felhasznalo_id'];

if (isset($_GET['search'])) {
    $search_term = mysqli_real_escape_string($conn, $_GET['search']);
    $lists_query = "SELECT * FROM bevasarlo_listak WHERE felhasznalo_id='$felhasznalo_id' AND nev LIKE '%$search_term%'";
} else {
    $lists_query = "SELECT * FROM bevasarlo_listak WHERE felhasznalo_id='$felhasznalo_id'";
}

$lists_result = mysqli_query($conn, $lists_query);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bevásárló Listák</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Bevásárló Listák</h2>
        <form method="GET" action="">
            <input type="text" name="search" placeholder="Keresés név alapján">
            <button type="submit">Keresés</button>
        </form>

        <ul>
            <?php while ($list_row = mysqli_fetch_assoc($lists_result)): ?>
                <li>
                    <a href="lista_megnezes.php?lista_id=<?php echo $list_row['id']; ?>">
                        <?php echo $list_row['nev']; ?>
                    </a>
                    <a href="lista_szerkesztes.php?lista_id=<?php echo $list_row['id']; ?>">Szerkesztés</a>
                </li>
            <?php endwhile; ?>
        </ul>

        <p><a href="lista_keszites.php">Új lista létrehozása</a></p>
        <p><a href="logout.php">Kijelentkezés</a></p>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
