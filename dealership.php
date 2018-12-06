<?php
session_start();
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$query = "select * from Dealerships";
$stid = oci_parse($conn, $query);
oci_execute($stid);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Watchlist - User View </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
      body {
        background-color: #f8f9fa!important;
      }
    </style>
  </head>
<body>
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

<hr />
<div class="container">
  <?php
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        echo "<div class=\"mt-4\"> </div>";
        echo "<div class=\"card p-5 shadow-lg\">";
        echo "<a href=\"vehicles.php?dealership_id=" . $row[0] . "\">" . $row[1] . "</a>";
        echo '</div>';
        echo "<div class=\"mb-4\"> </div>";
        echo "<hr />";
    }
  ?>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>

<?php
  oci_free_statement($stid);
  oci_close($conn);
?>
