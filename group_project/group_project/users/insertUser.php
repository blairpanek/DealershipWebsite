<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$name = $_POST["name"];
$username = $_POST["username"];
$password = $_POST["password"];
$phoneNumber = $_POST["phoneNumber"];
$email = $_POST["email"];

$query = "INSERT INTO Users VALUES ('$name', '$username', '$password', $phoneNumber, '$email')";
$stid = oci_parse($conn, $query);
oci_execute($stid);

oci_free_statement($stid);
oci_close($conn);
?>

<!DOCTYPE html>
<html>
</html>
