<?php
include('db.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = mysqli_real_escape_string($conn, $_POST['felhasznalonev']);
    $password = mysqli_real_escape_string($conn, $_POST['jelszo']);
    $query = "SELECT * FROM felhasznalok WHERE felhasznalonev='$username' AND jelszo='$password'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 1) {
        $user = mysqli_fetch_assoc($result);
        $_SESSION['felhasznalo_id'] = $user['id'];
        header('location: ./listak.php');
        exit();
    } else {
        echo "Sikertelen bejelentkezés";
    }
}

mysqli_close($conn);
?>
