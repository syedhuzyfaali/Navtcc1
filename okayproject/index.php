<?php
include ('connection.php');
$Error = 2;
$imgError = 2;
$res = '';
$execp = 'Error Registering User';
if (isset($_POST['btnReg'])) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $uid = uniqid();
    $filename = $_FILES['fileinput']['name'].$uid;
    $tempname = $_FILES['fileinput']['tmp_name'].$uid;
    $folder = "./image/" . $filename;
    $query = "insert into student(name, email, password, image) values('$name','$email','$pass','$filename')";
    try {
        $res = mysqli_query($conn, $query);
    } catch (mysqli_sql_exception $e) {
        $Error = 1;
    }
    if (move_uploaded_file($tempname, $folder) != True) {
        $imgError = 1;
    } else {
        $imgError = 0;
    }



    if ($res != null) {
        echo "Registerd USER";
    } else {
        $Error = 1;
    }


}

$selectquery = "SELECT * FROM student";
$result = mysqli_query($conn, $selectquery);
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

    <div class="container">
        <form method="POST" enctype="multipart/form-data">

            <?php if ($Error == 1) { ?>

                <div class="alert alert-danger" role="alert"><?php echo $execp ?></div>

                <?php
            } if($imgError == 1) {
                ?>
                <div class="alert alert-danger" role="alert"><?php echo "Image Not Uploaded" ?></div>

                <?php
            } else if($imgError == 0){
                ?>
                <div class="alert alert-success" role="alert"><?php echo "Image Successfully Uploaded" ?></div>
            <?php
            }
            ?>


            <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" name="name">

            </div>
            <div class="mb-3 ">
                <label class="form-check-label" for="exampleCheck1">Email</label>
                <input type="email" class="form-control" id="exampleInputPassword1" name="email">

            </div>
            <div class="mb-3 ">
                <label class="form-check-label" for="exampleCheck1">Pasword</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="pass">

            </div>
            <div class="mb-3">
                <input type="file" name="fileinput" id="inputfile">
            </div>
            <button type="submit" class="btn btn-primary" name="btnReg">Submit</button>
        </form>
    </div>

    <div class="container mt-5">
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Email</th>
                    <th scope="col">Img</th>
                    <th scope="col">Update</th>
                    <th scope="col">View</th>
                    <th scope="col">Delete</th>

                </tr>
            </thead>
            <tbody>


                <?php
                $rows = '';
                while ($rows = $result->fetch_assoc()) {
                    ?>
                    <tr>
                        <th scope="row"><?= $rows['id']; ?></th>
                        <td><?php echo $rows['name']; ?></td>
                        <td><?php echo $rows['email']; ?></td>
                        <td><img src="image/<?php echo $rows['image']; ?>" width="100px" height="100px" alt="userimg"></td>
                        
                        <td><a href="edit.php?id=<?= $rows["id"] ?>">Update</a></td>
                        <td><a href="view.php?id=<?= $rows["id"] ?>">View</a></td>
                        <td><a href="delete.php?id=<?= $rows["id"] ?>">Delete</a></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>