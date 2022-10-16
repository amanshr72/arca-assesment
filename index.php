<?php
if (file_exists('data.json')) {
  $filename = 'data.json';
  $data = file_get_contents($filename); //data read from json file
  $moviedata = json_decode($data, true);  //decode data

  //print_r($users); //array format data printing

  /* Success Alert */
  $message = '  <div class="alert alert-success" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>Success!</strong> You data has been fetched successfully!
</div>

 ';
} else {
  /* Failure Alert */
  $message = '  <div class="alert alert-danger" role="alert">
  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
  <strong>oops!</strong> Data not found!
</div>

 ';
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Assesment</title>
  <!-- Bootstrap CSS cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body>
  <!-- Display Success Message -->
  <?php
  if (isset($message)) {
    echo $message;
  ?>
    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarCenteredExample" aria-controls="navbarCenteredExample" aria-expanded="false" aria-label="Toggle navigation">
          <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse justify-content-center" id="navbarCenteredExample">
          <ul class="navbar-nav mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <form method="POST" action="">
                  <select name="year" id="year_dropdown">
                    <option>Release Year</option>
                    <option value="2018">2018</option>
                    <option value="2017">2017</option>
                    <option value="2016">2016</option>
                    <option value="2010">2010</option>
                    <option value="2001">2001</option>
                  </select>
                  <input type="submit" name="submit" value="Select Year">
                </form>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link disabled">Genres</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- Navbar Ends -->

    <!-- card start -->
    <?php for ($i = 0; $i < count($moviedata['Movie List']); $i++) { ?>
      <div class="row d-inline-flex p-4">
        <div class="card p-0" style="width: 29rem;">
          <div class="embed-responsive embed-responsive-16by9">
            <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/<?= $moviedata['Movie List'][$i]['YouTube Trailer'] ?>" allowfullscreen> </iframe>
          </div>
          <div class="card-body">
            <h5 class="card-title"> <?= $moviedata['Movie List'][$i]['Title'] ?> </h5>
            <p class="card-text"> <?= $moviedata['Movie List'][$i]['Short Summary'] ?> </p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Genres: <?= $moviedata['Movie List'][$i]['Genres'] ?> </li>
            <li class="list-group-item">Runtime: <?= $moviedata['Movie List'][$i]['Runtime'] ?> min </li>
            <li class="list-group-item">Rating: <?= $moviedata['Movie List'][$i]['Rating'] ?>/10 </li>
            <li class="list-group-item">Release Year: <?= $moviedata['Movie List'][$i]['Year'] ?> </li>
            <li class="list-group-item">IMDBID: <a href="https://www.imdb.com/title/<?= $moviedata['Movie List'][$i]['IMDBID'] ?>"> <?= $moviedata['Movie List'][$i]['IMDBID'] ?> </a> </li>
          </ul>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Director: <?= $moviedata['Movie List'][$i]['Director'] ?> </li>
            <li class="list-group-item">Writers: <?= $moviedata['Movie List'][$i]['Writers'] ?> </li>
            <li class="list-group-item">Cast: <?= $moviedata['Movie List'][$i]['Cast'] ?> </li>
          </ul>
        </div>
      </div>
    <?php } ?>
    <!-- cards ends -->

    <!-- Display Error Message -->
  <?php } else {
    echo $message;
  }
  ?>

  <!-- Jquery & Bootstrap js cdn -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  <!-- Jquery Code to Disapper Alter after 2 seconds. -->
  <script>
    window.setTimeout(function() {
      $(".alert").fadeTo(500, 0).slideUp(500, function() {
        $(this).remove();
      });
    }, 2000);
  </script>
</body>

</html>