<?php
session_start();
$_SESSION['upload'] = true;
include '../db_config.php' ;
$sql = "SELECT id from request where reqiest_from='{$_SESSION['name']}' order by id DESC  LIMIT 1";
$result = $db->query($sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
      $id= $row['id'];
    }
}


$statusMsg = '';

// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("UPDATE request SET image ='{$fileName}' WHERE id='{$id}' ");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
                $_SESSION['upload'] = true;
                header("location: ../Student's_home");

            }else{
                echo $db->error;
                $statusMsg = "File upload failed, please try again.";
                header("location: file_upload.php");
            } 
        }else{
            $statusMsg = "Sorry, there was an error uploading your file.";
        }
    }else{
        $statusMsg = 'Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload.';
    }
}else{
    $statusMsg = 'Please select a file to upload.';
}

// Display status message
echo $statusMsg;

?>