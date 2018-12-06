<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$username = $_GET["username"];
$password = $_GET["password"];
$query = "select COUNT(users.username) from users where username='$username' and password='$password'";
$stid = oci_parse($conn, $query);
oci_execute($stid);

$user_count;
while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    foreach ($row as $item) {
        $user_count = $item;
    }
}

if ($user_count == 1) {
  session_start();
  $_SESSION["username"] = $username;
  header('Location: index.php');
} else {
  echo "Invalid username and password. Go Back!";
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
