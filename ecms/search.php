<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "ecms");

//$search = $_POST['searchedword'];
$query="";
$search = "testbegriff";
$type = "document";

$tpStorageDir = "../tp_storage/";

//Verbindung zur Datenbank herstellen
$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

	if(!$db)
	{
		exit("Verbindungsfehler: ".mysqli_connect_error());
	}

echo("Verbindung mit der Datenbank hergestellt.");

switch($type){ 
	case "document":
		$query = "SELECT * FROM `storage` WHERE `title`LIKE '%$search%' order by `upload_date` ASC";	
		break;
	case "article":
		echo("Warte auf Zuarbeit von Mirco!");
		break;
}

$result = mysqli_query($db, $query);

	if(mysqli_num_rows($result)>0){
	    while($row = mysqli_fetch_assoc($result)) {
	    	if($type = "document") {
	    		echo '<a href="'.$tpStorageDir.$row['id'].'" download="'.$row['title'].'.'.$row['file_ext'].'">'.$row['title']. ' - ' . $row['file_ext'].'</a><br/>';
	    	}else {
	    		echo("Warte auf Zuarbeit von Mirco!");
	    	} 
	        
	    }
	}

mysqli_close($db);
?>