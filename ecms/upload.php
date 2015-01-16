<?php
$target_dir = "../tp_storage/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);


// if everything is ok, try to upload file
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        header('Location: storage.php');
    } else {
        echo "Sorry, there was an error uploading your file.";
        header('Location: storage.php?message=Sorry, there was an error uploading your file.');
}
?> 