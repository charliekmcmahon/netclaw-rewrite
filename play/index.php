<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- Index's CSS -->
    <link href="css/signed-in.css" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Netclaw | Choose your machine!</title>
  </head>
  <body>
    <body>

    <?php require(($_SERVER["DOCUMENT_ROOT"]."/navbar.php"))?>

    <!--- Title --->

    <section class="py-5 text-center container">
    <div class="row py-lg-0">
      <div class="col-lg-6 col-md-8 mx-auto">
        <h6 class="card-subtitle mb-2 text-muted">Welcome to Netclaw</h6>
        <h1 class="fw-light">Choose a Netclaw machine to play</h1>
        <p class="lead text-muted">There are a few different types of arcade and claw machines to play with Netclaw. Browse the different options below and select a machine to join the queue and play.</p>
      </div>
    </div>
  </section>

    <!--- Album / Selector --->

    <div class="row justify-content-md-center">


  <div class="col-md-auto">
    <div class="card">
    <img src="toy-story.png" class="card-img-top" alt="Toy Story">
      <div class="card-body">
        <h5 class="card-title">Toy Box Plush Machine</h5>
        <p class="card-text">Play a fully functional 'Toy Box' claw machine and grab toys!</p>
        <p class="card-text">Temporarily unavailable</p>
      </div>
    </div>
  </div>

  <div class="col-md-auto">
    <div class="card">
    <img src="maxi-claw.png" class="card-img-top" alt="Chocolate Machine">
      <div class="card-body">
        <h5 class="card-title">Maxi Claw Plush Machine</h5>
        <p class="card-text">Play a fully functional 'Dynomax' machine and grab large toys!</p>
        <a href="../maxi-claw.php" class="btn btn-primary">Play Now</a>
      </div>
    </div>
  </div>

  <div class="col-md-auto">
    <div class="card">
    <img src="chocolate.png" class="card-img-top" alt="Chocolate Machine">
      <div class="card-body">
        <h5 class="card-title">Chocoholic Pusher Machine</h5>
        <p class="card-text">Play a fully functional chocolate machine and grab chocolate!</p>
        <p class="card-text">Temporarily unavailable</p>
      </div>
    </div>
  </div>


</div>

<br>
<br>
<br>
<br>
<br>
<br>
<br>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html> 