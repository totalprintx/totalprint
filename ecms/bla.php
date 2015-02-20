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

//DB auswählen
$sql = 'USE '.DB;
if (mysqli_query($con, $sql)) {
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
}

//storage Tabelle erstellen -TODO: author_id auf author id verlinken
echo '<br/>Erstellt ECMS - Storage...';
$sql = 'INSERT INTO directories (title, parent_id) VALUES ("ORDNERXY", 6)';
if (mysqli_query($con, $sql)) {
    echo 'OK!';
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
}

$sql = 'INSERT INTO directories (title, parent_id) VALUES ("ORDNER2XY", 6)';
if (mysqli_query($con, $sql)) {
    echo 'OK!';
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
}

$sql = 'INSERT INTO directories (title, parent_id) VALUES ("ORDNER3XY", 6)';
if (mysqli_query($con, $sql)) {
    echo 'OK!';
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
}

$sql = 'INSERT INTO directories (title, parent_id) VALUES ("ORDNER4XY", 6)';
if (mysqli_query($con, $sql)) {
    echo 'OK!';
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
}
$sql = 'INSERT INTO directories (title, parent_id) VALUES ("ORDNER5XY" , 6)';
if (mysqli_query($con, $sql)) {
    echo 'OK!';
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
}



//Verbindung schließen
mysqli_close($con);
?>