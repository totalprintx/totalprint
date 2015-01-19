<?php require '_mysql.php'; ?>
<h1>totalprint - STORAGE</h1>
<?php
	$tpStorageDir = "../tp_storage/";
	dirLoop($tpStorageDir);

	function dirLoop($directory){
		$files = scandir($directory);
		foreach ($files as $key => $value) {
			if($value != "." && $value != ".."){
				if(is_dir($directory.$value)){
					echo 'DIR - ';
					echo '<b>'.$value.'</b><br/>';
					dirLoop($directory.$value);
				} else {
					echo 'FILE - ';
					echo '<a href="'.$directory.$value.'"><b>'.$value.'</b></a><br/>';
				}
			}
		}
	}

?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <h2>Upload:</h2>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php 
	if(isset($_GET['message'])) echo $_GET['message'];
	echo DB_SERVER;
?>