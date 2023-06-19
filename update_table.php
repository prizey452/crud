<?php
include 'connection.php';

if (isset($_GET['updateid'])) {

    $updateid = $_GET['updateid'];
    $select_all = "SELECT * FROM data where id = $updateid";
    $action = mysqli_query($connection, $select_all);
    if ($action) {
        echo "<script> alert('Success selecting table')</script>";
        // header('location: update_table.php');
    }

    while ($line = mysqli_fetch_assoc($action)) {
        echo "<form action='insert.php' method='post'>";
        echo "<label> EMAIL</label><br />";
        echo "<input type='text' name='email'" . "value=" . $line["email"] . " />";
        echo "<br /><br />";

        echo "<label> PASSWORD</label><br />";
        echo "<input type='text' name='password' value=" . $line["passcode"] . " />";
        echo "<br /><br />";

    }
    $update = "UPDATE data SET email = [''], passcode=[''] WHERE id = $";
    echo "<input type='submit' value='submit' />";
    echo "</form>";
}
?>