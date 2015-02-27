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
	echo "<hr/>";
	foreach ($result as $key => $value) {
		print_r($value);
		echo "<br/>";
	}

	echo "<hr/>";

/*SELECT Orders.OrderID, Customers.CustomerName, Orders.OrderDate
FROM Orders
INNER JOIN Customers
ON Orders.CustomerID=Customers.CustomerID; */

	$sql = "SELECT id FROM storage";

	$result = mysqli_query($con, $sql);
	echo "Crap:";
	print_r($result);	
	$x = 0;
	foreach ($result as $value) {
		print_r($value['id']);
		echo "<br/>";
		$x++;
	}										
	echo "<br/><br/>" + $x;
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <h2>Upload:</h2>
   <input type="file" id="filesToUpload" name="filesToUpload[]" multiple="multiple"/>
    <input type="submit" value="Upload Image" name="submit">
</form>