<?php
require '_mysql.php';

$target_dir = "../tp_storage/";
/*$file = pathinfo($_FILES['fileToUpload']['name']);
*/

// if everything is ok, try to upload file
/*if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header('Location: storage.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
        header('Location: storage.php?message=Sorry, there was an error uploading your file.');
}
*/

//DB
/*$con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
if (!$con) {
    die("<br/>Fehlgeschlagen: " . mysqli_connect_error());
}

$sql = 'USE '.DB;
if (mysqli_query($con, $sql)) {
} else {
    echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
}


$sql = 'INSERT INTO storage (title, file_ext) VALUES ("'.$file['filename'].'", "'.$file['extension'].'")';
if (mysqli_query($con, $sql)) {
	$target_file = $target_dir . mysqli_insert_id($con);
	mysqli_close($con);
	move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
	header('Location: storage.php');
} else { 
	mysqli_close($con);
    header('Location: storage.php?message=Sorry, there was an error uploading your file.');
}*/
print_r($_FILES);
echo "<hr/>";
foreach($_FILES as $file){
  foreach($file as $f){
  print_r($f); 
  echo "<br/>";
    }
}

echo "<br/>";
echo "<hr/>";
echo "<br/>";

foreach ($_FILES['filesToUpload']['name'] as $f => $name) {             
            
            echo pathinfo($name, PATHINFO_FILENAME) . " - " . $_FILES["filesToUpload"]["tmp_name"][$f] . " - " . $_FILES["filesToUpload"]["type"][$f] . "<br/>";
        
    }
?> 