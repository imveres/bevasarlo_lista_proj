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

$user_id = $_SESSION['felhasznalo_id'];
$lista_id = mysqli_real_escape_string($conn, $_GET['lista_id']);
$check_list_query = "SELECT * FROM bevasarlo_listak WHERE id='$lista_id' AND felhasznalo_id='$user_id'";
$check_list_result = mysqli_query($conn, $check_list_query);

if (mysqli_num_rows($check_list_result) != 1) {
    header('location: ./listak.php');
    exit();
}
$list_query = "SELECT * FROM bevasarlo_listak WHERE id='$lista_id'";
$list_result = mysqli_query($conn, $list_query);
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
    <title>Lista szerkesztése</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <?php
        $list_row = mysqli_fetch_assoc($list_result);
        echo "<h2>{$list_row['nev']}</h2>";
        echo "<p>Dátum: {$list_row['datum']}</p>";
        ?>
        <form action="termek_hozzaadas.php?lista_id=<?php echo $lista_id; ?>" method="post">
            <label for="termek_nev">Termék neve:</label>
            <input type="text" id="termek_nev" name="termek_nev" required>

            <label for="mennyiseg">Mennyiség:</label>
            <input type="text" id="mennyiseg" name="mennyiseg" required>

            <label for="egyseg">Mértékegység:</label>
            <div class="egyseg-buttons">
                <button type="button" class="egyseg-button" data-value="kg">kg</button>
                <button type="button" class="egyseg-button" data-value="dkg">dkg</button>
                <button type="button" class="egyseg-button" data-value="g">g</button>
                <button type="button" class="egyseg-button" data-value="db">db</button>
                <button type="button" class="egyseg-button" data-value="liter">liter</button>
                <button type="button" class="egyseg-button" data-value="csom">csom.</button>
            </div>
            <input type="hidden" id="selected_egyseg" name="egyseg" required>

            <label for="bolt">Bolt neve:</label>
            <select name="bolt" id="bolt">
                <?php
                $bolt_query = "SELECT id, nev FROM boltok";
                $bolt_result = mysqli_query($conn, $bolt_query);

                while ($bolt_row = mysqli_fetch_assoc($bolt_result)) {
                    echo "<option value='{$bolt_row['id']}'>{$bolt_row['nev']}</option>";
                }
                ?>
            </select>

            <button type="submit" name="submit">Tétel hozzáadása</button>
        </form>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                var buttons = document.querySelectorAll('.egyseg-button');
                var hiddenInput = document.getElementById('selected_egyseg');

                buttons.forEach(function(button) {
                    button.addEventListener('click', function() {
                        buttons.forEach(function(btn) {
                            btn.classList.remove('pressed');
                        });
                        this.classList.add('pressed');

                        hiddenInput.value = this.dataset.value;
                    });
                });
            });
        </script>


        <h3>Tételek:</h3>
        <ul>
            <?php while ($item_row = mysqli_fetch_assoc($items_result)): ?>
                <li>
                    <?php echo "{$item_row['mennyiseg']} {$item_row['egyseg_nev']} - {$item_row['termek_nev']} ({$item_row['bolt_nev']})"; ?>
                    <a href="torles.php?lista_id=<?php echo $lista_id; ?>&torolt_tetel=<?php echo $item_row['id']; ?>">Tétel törlése</a>
                </li>
            <?php endwhile; ?>
        </ul>

        <p><a href="listak.php">Vissza a bevásárló listákhoz</a></p>
    </div>
</body>
</html>

<?php
mysqli_close($conn);
?>
