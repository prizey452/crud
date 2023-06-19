<?php
$connection = mysqli_connect("localhost", "root", "", "users");
if (mysqli_connect_errno()) {
    echo "<script> alert('There is an error connecting')</script>";
}
?>