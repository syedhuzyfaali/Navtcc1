<?php
session_start();
include ('connection.php');
if ($_SESSION['id'] != null) {
    $_id = $_SESSION['id'];

    $selectQuery = "select * from student where id='$_id'";
    $_execQuery = mysqli_query($conn, $selectQuery);
    $res = mysqli_fetch_array($_execQuery);
} else {
    header("Location:login.php");
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<h1>Welcome &nbsp; <?php echo $res['name'] ?></h1>
<form action="logout.php">
    <button type="submit">Logout</button>
</form>
<img src="image/<?php echo $res['image']?>" alt="" width="100px" height="100px"  style="border-radius: 50%;" >
</body>

</html>