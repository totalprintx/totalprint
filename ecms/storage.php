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
	if(mysqli_num_rows($result)>0){
	    while($row = mysqli_fetch_assoc($result)) {
	        echo '<a href="'.$tpStorageDir.$row['id'].'" download="'.$row['title'].'.'.$row['file_ext'].'">'.$row['title']. ' - ' . $row['file_ext'].'</a><br/>';
	    }
	}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <h2>Upload:</h2>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<div id="categories">
Kategorien:<br/>
</div>

<?php 
	if(isset($_GET['message'])) echo $_GET['message'];
?>