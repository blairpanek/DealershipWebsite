<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$dealership_id = $_GET["dealership_id"];
$user_email = $_GET["user_email"];

echo $dealership_id;
echo $user_email;

$query = "INSERT INTO UserVehicleWatchlist (UserVehicleWatchlist_ID, Vehicle_ID, User_ID, dealership_id) VALUES ( $PK_ID , $vehcle_id , $user_id , $dealership_id )";

$stid = oci_parse($conn, $query);
$stid2 = oci_parse($conn, "SELECT * FROM UserVehicleWatchlist" );
oci_execute($stid);
oci_execute($stid2);
while (($row = oci_fetch_array($stid2, OCI_BOTH)) != false) {
    echo 'UVW id: '   . $row[0];
    echo '<br />';
    echo 'V id: '   . $row[1];
    echo '<br />';
    echo 'U id: '    . $row[2];
    echo '<br />';
    echo 'D id: ' . $row[3];
}

oci_free_statement($stid);
oci_close($conn);
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Vehicles - Dealer View </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  </head>
  <body>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </body>
</html>