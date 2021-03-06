<html>
<head>
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
            <?php
              if(!$_SESSION['username'] == ''){
                echo "<li class=\"nav-item active\">";
                echo  "<a class=\"nav-link\" href=\"profile.php\"> Profile </a>";
                echo "</li>";
              }
            ?>
            <li class="nav-item active">
              <a class="nav-link" href="dealership.php"> Dealerships </a>
            </li>
            <?php
              if(!$_SESSION['username'] == ''){
                echo "<li class=\"nav-item active\">";
                echo  "<a class=\"nav-link\" href=\"watchlist.php\"> Watchlist </a>";
                echo "</li>";
              }
              if (!$_SESSION['username'] == '') {
                echo "<li class=\"nav-item active\">";
                echo  "<a class=\"nav-link\" href=\"logout.php\"> Logout </a>";
                echo "</li>";
              } else {
                echo "<li class=\"nav-item active\">";
                echo  "<a class=\"nav-link\" href=\"login.php\"> Login </a>";
                echo "</li>";
              }
            ?>
          </ul>
        </div>
      </nav>

      <hr />
    <form action="handle_login.php" method="get">
      Username: <input type="text" name="username" required><br>
      Password: <input type="password" name="password" id="myInput" required><br><br>
      <input type="submit">
    </form>
    <br>
    <button onclick="location.href = 'AddUser.php';" id= "myButton" class= "float-left submit-button" > New User</button>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>
