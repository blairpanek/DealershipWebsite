<?php
session_start();
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

//we will need to get username from the session to ensure this is the correct watchlist
$username = $_SESSION['username'];
echo $username;

$query = "SELECT Vehicles.*, UserVehicleWatchlist.Vehicle_ID, UserVehicleWatchlist.UserName FROM Vehicles INNER JOIN UserVehicleWatchlist ON Vehicles.Vehicle_ID = UserVehicleWatchlist.Vehicle_ID AND UserVehicleWatchlist.UserName='$username'";
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

      <hr />

    <div class="container">
      <?php
        while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
            echo "<div class=\"mt-4\"> </div>";
            echo "<div class=\"card p-5 shadow-lg\">";
              $vehicle_id = $row[0];
              $dealership_id = $row[1];
              echo 'Color: '   . $row[2];
              echo '<br />';
              echo 'Model: '   . $row[3];
              echo '<br />';
              echo 'Year: '    . $row[4];
              echo '<br />';
              echo 'Mileage: ' . $row[5];
              echo '<br />';
              echo 'Price: '   . $row[6];
              echo '<br />';
              echo '<br />';
              echo "<a class=\"btn btn-primary\" href=\"handle_remove_from_watchlist.php?dealership_id=$dealership_id&vehicle_id=$vehicle_id\" role=\"button\"> Remove from Watchlist </a>";
            echo '</div>';
            echo "<div class=\"mb-4\"> </div>";
            echo '<hr />';
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
