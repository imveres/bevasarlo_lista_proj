1. Töltsd le és telepítsd a Xampp Control Panel-t.

2. Fájlok másolása
Másold be a 'bevasarlo_lista' mappát a webszerver könyvtárába pl. 'htdocs' mappa (Alapértelmezett útvonal: 'C:\xampp\htdocs')

3. Adatbázis létrehozása
Nyisd meg a phpmyadmin-t vagy egy másik SQL kezelőfelületet.
Hozz létre egy új adatbázist, pl.: bevasarlo_lista.
Importáld be a mappában található 'bevasarlo_lista' SQL fájlt.

4. Kapcsolat beállítása
Nyisd meg a db.php fájlt az alkalmazás gyökérkönyvtárában.
Állítsd be a MySQL adatbázis kapcsolódási adataidat:
==================================
$servername = "localhost";
$username = "root"; // MySQL felhasználónév
$password = "";     // MySQL jelszó
$dbname = "bevasarlo_lista"; // Az általad létrehozott adatbázis neve
==================================

5. Ellenörzés
Nyisd meg a böngészőt és ellenőrizd a futását a szervernek a 'http://localhost/bevasarlo_lista/' linken keresztül.