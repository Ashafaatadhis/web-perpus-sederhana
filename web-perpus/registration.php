<?php

require_once 'functions.php';
if (isset($_POST["regist"])) {

    if (regist($_POST) > 0) {

        echo "<script>
                            alert('Berhasil regist');
                            location.href = 'login.php';
              	     	</script>";
    } else {
        echo "<script>
                            alert('gagal regist');
                            
              	     	</script>";
    }
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
    <div class="container">
        <a href="login.php" class="text-dark mr-5">Login</a>
        <a href="#" class="text-dark mr-5">About</a>
        <a href="#" class="text-dark mr-5">Home</a>
    </div>



    <br><br><BR><BR>
    <div class="container">
        <div class="row">
            <div class="col">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Inventore tenetur quo, deleniti ab ad necessitatibus saepe nostrum sunt similique? Ullam eius nostrum, a ipsa veritatis aliquid tenetur debitis possimus quidem?</p>
                <BR><BR>
            </div>
            <div class="col"></div>
        </div>
    </div>
    <div class="container">
        <form method="post" action="">
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
            <div class="form-group row">
                <div class="col">
                    <label for="password2">Konfirmasi Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                </div>
                <div class="col"></div>
            </div>

            <button type="submit" class="btn btn-primary" name="regist">Submit</button>
        </form>
    </div>






    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>