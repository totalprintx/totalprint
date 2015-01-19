<?php
require '_mysql.php';

echo '<h1>totalprint ECMS Installation...</h1>';

$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);

//Verbindung prüfen
echo 'Verbindet zum Datenbankserver...';
if (!$con) {
    die("<br/>Fehlgeschlagen: " . mysqli_connect_error());
} else {
	echo 'OK!';
}

//DB erstellen
echo '<br/>Erstellt Datenbank "'.DB.'"...';
$sql = 'CREATE DATABASE '.DB;
if (mysqli_query($con, $sql)) {
    echo 'OK!';
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($conn);
}

//DB auswählen

//storage Tabelle erstellen
/*echo '<br/>Erstellt ECMS - Storage...';
$sql = 'CREATE DATABASE '.DB;
if (mysqli_query($con, $sql)) {
    echo 'OK!';
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($conn);
}
*/


//Verbindung schließen
mysqli_close($con);
?>