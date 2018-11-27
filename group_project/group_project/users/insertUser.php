<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$query = "INSERT INTO Users VALUES (1, 'user_name', 'user', '123', 123, 'user@mail.com')";
$stid = oci_parse($conn, $query);
oci_execute($stid);

oci_free_statement($stid);
oci_close($conn);
?>

<!DOCTYPE html>
<html>
</html>
