<?php 

    $conn = mysqli_connect('localhost','root','','okaydatabase',);
    if($conn != null ){
        echo "Connected";
    }
    else{
        "Error Connecting";
    }
    

?>