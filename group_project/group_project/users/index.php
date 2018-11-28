<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php"> Home </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a class="nav-link" href="profile.php"> Profile </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="dealership.php"> Dealerships </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="search.php"> Search </a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="login.php"> Login </a>
          </li>
        </ul>
      </div>
    </nav>

    <hr />

    <div class="jumbotron">
      <?php
        if (!($_SESSION["username"] == '')) {
          echo "<h1 class=\"display-4\">Welcome" $_SESSION["username"] "</h1>";
        } else {
          echo "<h1 class=\"display-4\">Welcome Customers! </h1>";
        }
      ?>
      <p class="lead">
        Get your great deals today at DealershipExpo!
      </p>
      <hr class="my-4">
      <div class="row">
        <div class="col-12 col-md-6 mb-3 mb-md-0">
          <p>
            Don't wait, shop now
          </p>
          <a class="btn btn-primary" href="dealership.php" role="button">
            View Dealerships
          </a>
        </div>
        <div class="col-12 col-md-6">
          <img class="img-fluid" src="https://c.pxhere.com/photos/8c/a1/road_car_vehicle_transportation_automobile_car_road_car_on_road_drive-495245.jpg!d">
        </div>
      </div>
    </div>
  </div>

  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>
