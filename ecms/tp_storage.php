<?php 
  require '_mysql.php';
  $con = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD);
  if (!$con) {
      die("<br/>Fehlgeschlagen: " . mysqli_connect_error());
  }

  $sql = 'USE '.DB;
  if (mysqli_query($con, $sql)) {
  } else {
      echo "<br/>Fehlgeschlagen: " . mysqli_error($con);
  }

  $sql = 'SELECT * FROM directories';
  $result = mysqli_query($con, $sql);

  if(mysqli_num_rows($result)>0){
      while($row = mysqli_fetch_assoc($result)) {
          $array[] = $row;
      }
  }

  echo json_encode($array);
?>