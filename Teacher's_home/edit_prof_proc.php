
<?php
session_start();

include '../db_config.php' ;

$gopi_sql = "UPDATE teacher SET Email ='{$_POST['Email']}', Phone_no ='{$_POST['Phone_no']}',Address ='{$_POST['Address']}',Zip ='{$_POST['Zip']}' WHERE name='{$_SESSION['name']}'";
           
              $resul4t = $db->query($gopi_sql);
              
            header("location: edit_prof.php");




?>
