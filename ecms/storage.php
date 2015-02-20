<?php require '_mysql.php'; ?>
<h1>totalprint - STORAGE</h1>
<?php

	$tpStorageDir = "../tp_storage/";

	//DB
	$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
	if (!$con) {
	    die("<br/>Fehlgeschlagen: " . mysqli_connect_error());
	}

	$sql = 'USE '.DB;
	if (mysqli_query($con, $sql)) {
	} else {
	    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
	}

	$sql = 'SELECT * FROM storage';
	$result = mysqli_query($con, $sql);

	echo json_encode($result);
?>