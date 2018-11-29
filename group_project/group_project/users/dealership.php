<?php
// Remember to replace 'username' and 'password'!
$conn = oci_connect('coelhard', 'Jan211999', '(DESCRIPTION=(ADDRESS_LIST=(ADDRESS=(PROTOCOL=TCP)(Host=db2.ndsu.edu)(Port=1521)))(CONNECT_DATA=(SID=cs)))');

$query = "select * from Dealerships";
$stid = oci_parse($conn, $query);
oci_execute($stid);
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title> Watchlist - User View </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <style>
      body {
        background-color: #f8f9fa!important;
      }
    </style>
  </head>
<body>
<div class="container">
  <?php
    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
        echo "<div class=\"mt-4\"> </div>";
        echo "<div class=\"card p-5 shadow-lg\">";
        echo "<a href=\"vehicles.php?dealership_id=" . $row[0] . "\">" . $row[1] . "</a>";
        echo '</div>';
        echo "<div class=\"mb-4\"> </div>";
        echo "<hr />";
    }
  ?>
</div>
</body>
</html>

<?php
  oci_free_statement($stid);
  oci_close($conn);
?>
