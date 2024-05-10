<?php
include ("connection.php");
$_id = $_GET['id'];
$selectQuery = "select * from student where id = '$_id'";
$selectResult = mysqli_query($conn, $selectQuery);
$selectResultArray = mysqli_fetch_array($selectResult);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>

    <?php
        if(true){
            ?>
        <script>
            confirm('<?= "Name: ".$selectResultArray['name']."  Email: ".$selectResultArray['email']?>')
           
        </script>
    <?php
        }

    ?>






    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>