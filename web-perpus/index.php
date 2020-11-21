<?php
session_start();

require_once 'functions.php';

if (!isset($_SESSION['login'])) {
  header("Location: login.php");
}

$buku = query("SELECT * FROM buku");

if (isset($_POST["cari"])) {

  $keyword = $_POST["keyword"];
  $buku = search($keyword);
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
  <link rel="stylesheet" href="style.css">
  <title>Nyelangin</title>
</head>

<body>



  <!-- navbar -->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <img src="gambar/oren.png" width="100" height="40"></img>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="logout.php">Logout</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item">
            <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
          </li>
        </ul>

        <form class="form-inline my-2 my-lg-0" action="" method="post">
          <input class="form-control mr-sm-2" type="search" name="keyword" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" name="cari" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>

  <!-- swipe -->

  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="gambar/Untitled-1.jpg" height="500" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="gambar/Untitled-1.jpg" height="500" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="gambar/Untitled-1.jpg" height="500" class="d-block w-100" alt="...">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>


  <!-- border -->

  <div class="jumbotron jumbotron-fluid bg-light">
    <div class="container">

      <h1 class="display-4">Selamat datang <?php if (isset($_SESSION['label'])) { ?>
          <?php echo $_SESSION['label']; ?>
        <?php } ?>
      </h1>
      <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
    </div>
  </div>

  <!-- card -->
  <div class="container">

    <?php foreach ($buku as $b) : ?>
      <div class="card bg-white shadow p-3 mb-5 bg-white rounded float-left mr-3" style="width: 18rem;">
        <img src="gambar/<?= $b['gambar']; ?>" height="300" class="card-img-top" alt="<?= $b['gambar']; ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $b['judul']; ?></h5>
          <p class="card-text"><?= $b['penulis']; ?></p>
          <p class="card-text"><?= $b['penerbit']; ?></p>
          <a href="pinjam.php?id=<?= $b['id']; ?>" class="btn btn-primary">Pinjam buku</a>
        </div>
      </div>

    <?php endforeach; ?>
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>