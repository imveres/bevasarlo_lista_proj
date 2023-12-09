<?php
include('db.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $felhasznalonev = mysqli_real_escape_string($conn, $_POST['felhasznalonev']);
    $jelszo = mysqli_real_escape_string($conn, $_POST['jelszo']);
    $check_user_query = "SELECT * FROM felhasznalok WHERE felhasznalonev='$felhasznalonev'";
    $check_result = mysqli_query($conn, $check_user_query);

    if (mysqli_num_rows($check_result) > 0) {
        echo "Ez a felhasználónév már foglalt. Kérlek, válassz másikat.";
    } else {
        $register_query = "INSERT INTO felhasznalok (felhasznalonev, jelszo) VALUES ('$felhasznalonev', '$jelszo')";
        mysqli_query($conn, $register_query);

        echo "Sikeres regisztráció. Most már bejelentkezhetsz.";
        header('location: ../index.html');
        exit();
    }
}

mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="hu">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regisztráció</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <div class="container">
        <h2>Regisztráció</h2>
        <form action="./register.php" method="post">
            <label for="username">Felhasználónév:</label>
            <input type="text" id="felhasznalonev" name="felhasznalonev" required>

            <label for="password">Jelszó:</label>
            <input type="password" id="jelszo" name="jelszo" required>

            <button type="submit">Regisztráció</button>
        </form>
        <p>Már van fiókod? <a href="../index.html">Bejelentkezés</a></p>
    </div>
</body>
</html>
