<?php
include ("connection.php");
$_id = $_GET['id'];
$deleteQuery = "delete from student where id = '$_id'";
$deleteResult = mysqli_query($conn, $deleteQuery);
 if($deleteResult != null){
    ?>
    <h1>Data Deleted</h1>
    <?php
 }
 else{
    ?>
    <h1>Some Error Deleting Data</h1>
    <?php
 }

 header('Location:index.php')

?>