<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$username = $_GET["username"];
$password = $_GET["password"];
$query = "select COUNT(users.username) from users where username='$username' and password='$password'";
$stid = oci_parse($conn, $query);
oci_execute($stid);

$user_count;
while ($row = oci_fetch_array($stid, OCI_BOTH)) {
    foreach ($row as $item) {
        $user_count = $item[0];
    }
}
echo $user_count;

if ($user_count == 1) {
  header('Location: index.php');
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
