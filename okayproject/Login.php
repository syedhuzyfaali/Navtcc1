<?php
session_start();
    include('connection.php');
    if(isset($_POST['btnlogin'])){
        $_email = $_POST['email'];
        $_pass = $_POST['pass'];

        $selectQuery = "select * from student where email='$_email' and password='$_pass'";

            $execQuery = mysqli_query($conn, $selectQuery);
            $res = mysqli_fetch_array($execQuery);
           

            if(mysqli_num_rows($execQuery) == 1){
                
                $_SESSION['id']=$res['id'];
                if($_SESSION['id']!= null){
                    header("Location:profile.php");
                }
                else{
                    header("Location:login.php");
                }
            }
            else if(mysqli_num_rows($execQuery) != 1){
                echo "Error";
            }
    }

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
    <form method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="pass">
  </div>
  <button type="submit" class="btn btn-primary" name="btnlogin">Login</button>
</form>
</div>










<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>
</html>