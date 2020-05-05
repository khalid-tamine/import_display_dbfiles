<?php
    include 'config.php';

    $con = mysqli_connect($host , $user , $pass ,$dbname) or die("connect failed");

    if(isset($_POST['submit'])){
        $file = $_FILES['file'];
       
        
        $filename = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileError= $_FILES['file']['error'];
        $fileType = $_FILES['file']['type'];

        $fileExt = explode('.',$filename);
        $fileActualExt = strtolower(end($fileExt));
      
        $allowed = array('jpg','jpeg','png','pdf');

       
        if(in_array($fileActualExt , $allowed)){
            if($fileError== 0 ){
                if($fileSize < 1000000){
                  
                    $target_dir = "uploads/";
                    $query = "insert into images(name) values ('".$filename."')";
                    mysqli_query($con , $query);
                    move_uploaded_file($_FILES['file']['tmp_name'],$target_dir.$filename);
                   
                }else{
                    echo 'file too big';
                }
            }else{
                echo 'error';
            }
        }else{
            echo'cant upload it';
        }
    }
   
?>