<?php
session_start();

require_once 'functions.php';


if (isset($_SESSION["admin"])) {
    header("Location: admin.php");
}
if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM admin WHERE username = '$username'");


    if (mysqli_num_rows($result) === 1) {

        $w = mysqli_fetch_assoc($result);

        if (password_verify($password, $w["password"])) {


            $_SESSION["admin"] = true;
            header("Location: admin.php");
        }
    }

    echo "<script>
                            alert('username/password salah');
                            
              	     	</script>";
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="login.css">
    <title>Hello, world!</title>
</head>

<body>




    <br><br><BR><BR>
    <div class="container">
        <div class="row">
            <div class="col">
                <BR><BR>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <div class="container">
        <form action="" method="post">
            <div class="form-group row">
                <div class="col">
                    <label for="username">Username</label>
                    <input type="text" class="form-control" id="username" name="username">
                </div>
                <div class="col">

                </div>
            </div>
            <div class="form-group row">
                <div class="col">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                <div class="col"></div>
            </div>

            <button type="submit" class="btn btn-primary" name="login">Login</button>
        </form>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>