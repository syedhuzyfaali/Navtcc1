<?php 
session_start();
if($_SESSION != null){
    session_destroy();
    header("Location:Login.php");
}
else{
    header("Location:Login.php");
}
?>