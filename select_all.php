<?php
include 'connection.php';

//select all
$select_all = "SELECT * FROM data";
$action = mysqli_query($connection, $select_all);
echo "<h1>RESULTS</h1>";
echo "<table border = '2' >" . "<tr >" . "<th>" . "ID" . "</th>" . "<th>" . "EMAIL" . "</th>" . "<th>" . "PASSWORD" . "</th>" . "</tr>";
while ($line = mysqli_fetch_assoc($action)) {
    echo "<tr>" . "<td>" . $line["id"] . "</td>" . "<td>" . $line["email"] . "</td>" . "<td>" . $line["passcode"] .
        "</td>" . "<td>" . "<form action='delete_from_table.php' method='get'> <button value= name='updateid'>UPDATE</button>"
        . "</td>" . "<td>" . "<button value=$line[id] name='delte'>DELETE</button>" . "</form></td>" . "</tr>";
}

echo "</table>";
?>