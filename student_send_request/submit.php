<?php
session_start();
// Include the database configuration file

include '../db_config.php' ;
if (isset($_POST['request_type'])){
    if(isset($_POST['request_to'])){
        $request_to = $_POST['request_to'];
    }    
    if(isset($_SESSION['name'])){
        $name = $_SESSION['name'];
    }
    if(isset($_POST['request_type'])){
        $request_type = $_POST['request_type'];
    }
    if(isset($_POST['year'])){
        $year = $_POST['year'];
    }
    if(isset($_POST['course'])){
        $course = $_POST['course'];
    }
    if(isset($_POST['detail'])){
        $detail = $_POST['detail'];
    }
    if(isset($_POST['index_no'])){
        $index_no = $_POST['index_no'];
    }
    


    $sql= "INSERT into request (request_to,reqiest_from,request_type, year, course, detail,index_no) VALUES ('{$request_to}','{$name}','{$request_type}','{$year}','{$course}','{$detail}','{$index_no}')";
    $insert = $db->query($sql);
    
    if($insert){
        echo "The file  has been uploaded successfully.";
        header('Location: file_upload.php');
    }else{
        echo"File upload failed, please try again.";
        echo $db -> error;

    } 
   
}




/*

$statusMsg = '';

// File upload path
$targetDir = "uploads/";


if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    $fileName = basename($_FILES["file"]["name"]);
$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf','doc');
    if(in_array($fileType, $allowTypes)){
        // Upload file to server
        if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
            // Insert image file name into database
            $insert = $db->query("INSERT into request (file_name,request_to,reqiest_from,request_type, yead, course, detail) VALUES ('".$fileName."','{$_POST['request_to']}','{$_SESSION['name']}','{$_POST['request_type']}','{$_POST[' year']}','{$_POST[' course']}','{$_POST[' detail']}')");
            if($insert){
                $statusMsg = "The file ".$fileName. " has been uploaded successfully.";
            }else{
                $statusMsg = "File upload failed, please try again.";
                echo $mysqli -> error;

            } 
            echo $mysqli -> error;
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
echo $statusMsg;*/
?>