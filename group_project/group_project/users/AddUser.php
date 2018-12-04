<html>
<head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <style>
    body {
      background-color: #f8f9fa!important;
    }
  </style>
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
              <a class="nav-link" href="watchlist.php"> Watchlist </a>
            </li>
            <?php
              if(!$_SESSION['username'] == ''){
                echo "<li class=\"nav-item active\">";
                echo  "<a class=\"nav-link\" href=\"logout.php\"> Logout </a>";
                echo "</li>";
              }
              else{
                echo "<li class=\"nav-item active\">";
                echo  "<a class=\"nav-link\" href=\"login.php\"> Login </a>";
                echo "</li>";
              }
              ?>
          </ul>
        </div>
      </nav>

      <h1>
        Create User
      </h1>

      <form action="insertUser.php" method="post">
        Name: <input type="text" name="name" id="name" required>
        <br>
        Username: <input type="text" name="username" id="username" required>
        <br>
        Password: <input type="password" minlength="8" name="password" id="password" required>
        <br>
        Phone Number: <input type="number" name="phoneNumber" id="phoneNumber" required>
        <br>
        Email: <input type="email" name= "email" id="email" required>
        <br>
        <input type="submit">
      </form>
    </div>
  </body>
</html>
