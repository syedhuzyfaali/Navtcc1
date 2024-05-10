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
    <form method="post">
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Name</label>
        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name= "name" value="<?= $selectResultArray["name"];?>">
      </div>
      <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email" value="<?= $selectResultArray["email"];?>">
      </div>
      
      <button type="submit" class="btn btn-primary" name="btnupdate">Submit</button>
    </form>

    <?php
    
        if(isset($_POST['btnupdate'])){
            $_name = $_POST['name'];
            $_email = $_POST['email'];
            echo $_email;
            echo $_name;
            $updateQuery = "update student set name='$_name', email='$_email' where id='$_id'";

            $updateRes = mysqli_query($conn, $updateQuery);
            if($updateQuery!=null){
                header("Location:index.php");
            }
            else{
                die("Error");
            }
        }
    ?>










    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>