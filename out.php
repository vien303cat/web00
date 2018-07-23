<?php 
session_start();
$_SESSION["user"] = "";
echo "<script> document.location.href='login.php'; </script>" ;

?>