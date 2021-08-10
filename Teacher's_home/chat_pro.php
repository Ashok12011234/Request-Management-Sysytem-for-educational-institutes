
<?php
session_start();

include '../db_config.php' ;

$gopi_sql = "INSERT INTO chat (id, frm, message) VALUES ('{$_POST['id']}', '{$_SESSION['name']}', '{$_POST['msg']}')";

$resul4t = $db->query($gopi_sql);
header("location: request_view.php?id=".$_POST['id']);

echo("Error description: " . $db -> error);



?>
