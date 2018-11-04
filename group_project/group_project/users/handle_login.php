<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

//put your query
// $query = "SELECT COUNT(username) FROM Users WHERE username = " . $_GET["username"] . " AND password = " . $_GET["password"];
$query "SELECT * FROM CAT";
$stid = oci_parse($conn, $query);
$response = oci_execute($stid, OCI_DEFAULT);

echo $response;

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
