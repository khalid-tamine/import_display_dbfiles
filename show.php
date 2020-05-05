<?php
  $host = "localhost";
  $user = "root";
  $pass = "";
  $dbname = "tuto";

  $con = mysqli_connect($host , $user , $pass ,$dbname) or die("connect failed");

    $sql = "SELECT name from images";
    $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $image = $row['name'];
    $image_src  ="uploads/".$image;

?>
<img src ='<?php echo $image_src; ?>'>