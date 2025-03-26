<?php
include 'connection.php';

//CREATING A DATABASE, IF IT DOESNT EXIST
$create_database = "CREATE DATABASE USERS";

if (mysqli_query($connection, $create_database)) {
    echo "database created successfully";
} else {
    echo "does the database exist?<br>" . mysqli_error($connection);
}
?>