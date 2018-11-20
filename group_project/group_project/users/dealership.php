<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$query = "select * from Dealerships";
$stid = oci_parse($conn, $query);
oci_execute($stid);

while ($row = oci_fetch_array($stid, OCI_ASSOC+OCI_RETURN_NULLS)) {
    for ($x = 0; $x < count($row); $x++) {
      echo "<a href=\"vehicles/?dealership_id=" . $row[0] . "\"></a>";
      echo $x;
    }
    echo "<br />";
}

oci_free_statement($stid);
oci_close($conn);
?>

<!DOCTYPE html>
<html>
</html>
