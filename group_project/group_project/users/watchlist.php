<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('iflage', 'Feb161998', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

//we will need to get username from the session to ensure this is the correct watchlist
$watchlist_id = "1user1";
$query = "select * FROM UserVehicleWatchlist WHERE UserVehicleWatchlist_ID = " . $watchlist_id;
$stid = oci_parse($conn, $query);

$vehicleID = 0;
$vehicleID2 = 0;
oci_execute($stid);

//sets vehicle ID for other query
while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
  $vehicleID = $row[1];
  $vehicleID2 = $row[2];
}
oci_free_statement($stid);

$query2 = "select * FROM Vehicles WHERE Vehicle_ID = " . $vehicleID;
$stid2 = oci_parse($conn, $query2);
oci_execute($stid2);

while (($row = oci_fetch_array($stid2, OCI_BOTH)) != false) {
  echo 'Color: '   . $row[2];
  echo '<br />';
  echo 'Model: '   . $row[3];
  echo '<br />';
  echo 'Year: '    . $row[4];
  echo '<br />';
  echo 'Mileage: ' . $row[5];
  echo '<br />';
  echo 'Price: '   . $row[6];
  echo '<hr />';
}
oci_free_statement($stid2);

//IF $vehicleID2 != NULL{
$query3 = "select * FROM Vehicles WHERE Vehicle_ID = " . $vehicleID2;
$stid3 = oci_parse($conn, $query3);
oci_execute($stid3);

while (($row = oci_fetch_array($stid3, OCI_BOTH)) != false) {
  echo 'Color: '   . $row[2];
  echo '<br />';
  echo 'Model: '   . $row[3];
  echo '<br />';
  echo 'Year: '    . $row[4];
  echo '<br />';
  echo 'Mileage: ' . $row[5];
  echo '<br />';
  echo 'Price: '   . $row[6];
  echo '<hr />';
}

oci_free_statement($stid3);

oci_close($conn);
?>

<!DOCTYPE html>
<html>
</html>
