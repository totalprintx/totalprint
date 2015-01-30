<?php

define("DB_HOST", "localhost");
define("DB_USER", "root");
define("DB_PASSWORD", "");
define("DB_DATABASE", "ecms");

$search = $_POST['searchbox'];
$type = "document";
$query;

$tpStorageDir = "../tp_storage/";

if($search != "") {
	//Verbindung zur Datenbank herstellen
	$db = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_DATABASE);

		if(!$db)
		{
			exit("Verbindungsfehler: ".mysqli_connect_error());
		}

	switch($type){ 
		case "document":
			$query = "SELECT s.id, s.title, s.file_ext, s.upload_date, s.author_id, c.title as category
						FROM storage s, category c 
						WHERE s.category_id = c.category_id
	                    AND (s.title LIKE '%$search%' 
						OR c.title LIKE '%$search%') 
						order by upload_date ASC";	
			break;
		case "article":
			echo("Warte auf Zuarbeit von Mirco!");
			break;
	}

	$result = mysqli_query($db, $query);

		if(mysqli_num_rows($result)>0){
		    while($row = mysqli_fetch_assoc($result)) {
		    	if($type = "document") {
		    		echo '<a href="'.$tpStorageDir.$row['id'].'" download="'.$row['title'].'.'.$row['file_ext'].'">'.$row['title']. '-' . $row['file_ext'].'</a>'. ' - '  . $row['category']. ' - ' . $row['upload_date'].'<br/>';
		    	}else {
		    		echo("Warte auf Zuarbeit von Mirco!");
		    	} 
		        
		    }
		}

	mysqli_close($db);
} else {
	echo("Gib einen Suchbegriff ein du Fischkoeder!");
}

?>