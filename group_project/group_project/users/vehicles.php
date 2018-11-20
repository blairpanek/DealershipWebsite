<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$dealership_id = $_GET["dealership_id"];

echo $dealership_id;

$query = "select * FROM Vehicles WHERE Dealership_ID = " . $dealership_id;
$stid = oci_parse($conn, $query);
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    echo 'Color: '   . $row[2];
    echo 'Model: '   . $row[3];
    echo 'Year: '    . $row[4];
    echo 'Mileage: ' . $row[5];
    echo 'Price: '   . $row[6];
}

oci_free_statement($stid);
oci_close($conn);
?>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  </body>
</html>
