<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$dealership_id = $_GET["dealership_id"];
$query = "select COUNT(users.username) from users where username='$username' and password='$password'";
$stid = oci_parse($conn, $query);
oci_execute($stid);

echo $dealership_id;

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    echo "<a href=\"vehicles/?dealership_id=" . $row[0] . "\">" . $row[1] . "</a>";
    echo "<hr />";
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
