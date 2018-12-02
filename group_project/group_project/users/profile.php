<?php
session_start();
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');
$username = $_SESSION["username"];
//$username = "user";
$query = "SELECT * FROM Users WHERE UserName = '" . $username . "'";
$stid = oci_parse($conn, $query);
oci_execute($stid);
?>

<html lang="en" dir="ltr">
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
              <a class="nav-link" href="watchlist.php"> Watchlist </a>
            </li>
            <li class="nav-item-active">
              <?php
                if ($username == '') {
                  echo  "<a class=\"nav-link\" href=\"login.php\"> Login </a>";
                } else {
                  echo  "<a class=\"nav-link\" href=\"logout.php\"> Logout </a>";
                }
              ?>
            </li>
          </ul>
        </div>
      </nav>

      <hr />

      <h1>
        Account Details
      </h1>

      <div class="ml-3">
        <?php
          while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
              echo 'Name: '   . $row[0];
              echo '<br />';
              echo 'UserName: '   . $row[1];
              echo '<br />';
              echo 'Phone Number: '    . $row[3];
              echo '<br />';
              echo 'Email: ' . $row[4];
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
