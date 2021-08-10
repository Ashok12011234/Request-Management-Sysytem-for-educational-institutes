
<?php
session_start();
include '../db_config.php' ;
$id = $_GET['id'];
$gopi_sql = "UPDATE request SET status='decilineds' WHERE id='{$_GET['id']}'";
           
              $resul4t = $db->query($gopi_sql);

?>
<script>
window.location.href = "request_view.php?id=<?php echo $_GET['id'];?>";
</script>