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
$sql = 'CREATE DATABASE '.DB.' CHARACTER SET utf8 COLLATE utf8_general_ci;';
if (mysqli_query($con, $sql)) {
    echo 'OK!';
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
}

//DB auswählen
$sql = 'USE '.DB;
if (mysqli_query($con, $sql)) {
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
}

//storage Tabelle erstellen -TODO: author_id auf author id verlinken
echo '<br/>Erstellt ECMS - Storage...';
$sql = 'CREATE TABLE storage (
		id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
		title VARCHAR(256) NOT NULL,
		file_ext VARCHAR(10) NOT NULL,
		author_id VARCHAR(50),
		upload_date TIMESTAMP
		)';
if (mysqli_query($con, $sql)) {
    echo 'OK!';
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
}



//Verbindung schließen
mysqli_close($con);
?>