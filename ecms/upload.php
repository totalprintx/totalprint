<?php
require '_mysql.php';

$target_dir = "../tp_storage/";
$file = pathinfo($_FILES['fileToUpload']['name']);
$dir = $_POST['uploadTargetDir'];

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


$sql = 'INSERT INTO storage (title, file_ext, category_id) VALUES (:filename, :fileextension, :dir)';
    if (mysqli_query($con, $sql)) {
    	$target_file = $target_dir . mysqli_insert_id($con);
    	mysqli_close($con);
    	move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $target_file);
        return ;
    	//header('Location: storage.php');
    } else { 
    	mysqli_close($con);
        //header('Location: storage.php?message=Sorry, there was an error uploading your file.');
    }


            // if everything is ok, try to upload file
            /*if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
                    header('Location: storage.php');
                } else {
                    echo "Sorry, there was an error uploading your file.";
                    header('Location: storage.php?message=Sorry, there was an error uploading your file.');
            }
            */

?> 

