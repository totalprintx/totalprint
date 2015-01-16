<h1>totalprint - STORAGE</h1>
<?php
	$files = scandir("../tp_storage/");
	foreach ($files as $key => $value) {
		echo '<a href="../tp_storage/'.$value.'"><b>'.$value.'</b></a><br/>';
	}
?>

<form action="upload.php" method="post" enctype="multipart/form-data">
    <h2>Upload:</h2>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

<?php if(isset($_GET['message'])) echo $_GET['message'];
?>