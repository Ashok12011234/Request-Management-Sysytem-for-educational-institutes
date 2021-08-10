
<?php
session_start();

include '../db_config.php' ;

$gopi_sql = "INSERT INTO user_details (user_name, password, Type) VALUES ('{$_POST['name']}', '{$_POST['password']}', '{$_POST['type']}')";
       
              $resul4t = $db->query($gopi_sql);
  if($_POST['type']=="Student")      {
    $gopi_sql = "INSERT INTO student (name, id,year,course) VALUES ('{$_POST['name']}', '{$_POST['index_no']}', '{$_POST['year']}', '{$_POST['course']}')";
       
    $resul4t = $db->query($gopi_sql);
  }   
 else if($_POST['type']=="Teacher")      {
    $gopi_sql = "INSERT INTO teacher (name, id_no) VALUES ('{$_POST['name']}', '{$_POST['index_no']}')";
       
    $resul4t = $db->query($gopi_sql);
  }      
           header("location: index.php?success=true");




?>
