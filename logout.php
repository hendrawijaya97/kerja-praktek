<?php
session_start();
ob_start();

session_destroy();
echo '<script>document.location.href="index.php";</script>';
//header('location:index.php');

?>
