<?php
session_start();
$_SESSION['page_no'] -=1;
header("Location: index.php");

?>