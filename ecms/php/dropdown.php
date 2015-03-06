<?php

	$con = mysqli_connect("localhost","ecms","");
	
	if(!$con)
	{
		exit("Verbindungsfehler: ".mysqli_connect_error());
	}

	$query = "SELECT name FROM mitarbeiter WHERE id =`1`";
	$result = mysqli_query($con, $query);
	$rows = $result->num_rows;

	if($rows >= 0) {
		$resultData = $result->fetch_array();
		echo($resultData);

		$firstresult = array(
        	'successful'   		=> $successful,
        	'name'         		=> $resultData[2]
        );
		echo  $_GET['callback'].'('.json_encode($firstresult) .')';
	} else {
		echo  $_GET['callback'].'('.json_encode(array('successful' => false)) .')';
	}	

?>