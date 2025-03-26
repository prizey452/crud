<?php
include 'connection.php';

if (isset($_GET['delte'])) {
    $delete = $_GET['delte'];
    $delete_from_table = "DELETE FROM data WHERE id = $delete";


    if (mysqli_query($connection, $delete_from_table)) {
        echo "<script> alert('Success deleting from table')</script>";
        header('location: select_all.php');
    }
}
?>