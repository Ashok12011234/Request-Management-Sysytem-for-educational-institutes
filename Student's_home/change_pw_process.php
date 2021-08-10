
<?php
session_start();
$_SESSION['msgpw']="";
include '../db_config.php' ;


$sql = "SELECT password FROM user_details WHERE user_name='{$_SESSION['name']}'";
$result = $db->query($sql);
if ($result->num_rows > 0) {
  
  while($row = $result->fetch_assoc()) {
    if($row['password']==$_POST['pw_old']) {
        if($_POST['pw_new1']!=$_POST['pw_new2']){
            $_SESSION['msgpw']="Your new passwords don't match";
            header("location: change_pw.php");
        }
        else{
                
            $gopi_sql = "UPDATE user_details SET password='{$_POST['pw_new1']}' WHERE user_name='{$_SESSION['name']}'";
           
              $resul4t = $db->query($gopi_sql);
              $_SESSION['msgpw']="Your recent attempt to change password sucessful";
            header("location: change_pw.php");
        }



        
    }
    else{
        $_SESSION['msgpw']="You have wrongly entered your current password";
        
        header("location: change_pw.php");
    }
  }
}



?>
