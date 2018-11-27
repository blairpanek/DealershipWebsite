<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$query = "select * from Dealerships";
$stid = oci_parse($conn, $query);
oci_execute($stid);

while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
    echo "<a href=\"vehicles.php?dealership_id=" . $row[0] . "\">" . $row[1] . "</a>";
    echo "<hr />";
}

oci_free_statement($stid);
oci_close($conn);
?>

<!DOCTYPE html>
<html>
</html>
