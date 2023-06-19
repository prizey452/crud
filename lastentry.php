<?php
//parameters
$server = "localhost";
$username = "root";
$password = "";
$database = "users";

//establishing a connection to the server
$connection = mysqli_connect($server, $username, $password, $database);

//check connection success
if (!$connection) {
    die("<h2>check config, is server alive?</h2>" . mysqli_connect_error());

} else {
    echo "connection success<br>";
}



//insert into
$insert_table = "INSERT INTO data(
	id ,
	email ,
	passcode )
    VALUES (NULL, 'bair3in@gmal.com', 'dbi311dc@')";

if (mysqli_query($connection, $insert_table)) {
    $last_id = mysqli_insert_id($connection);
    echo "sql success, LAST ID =" . $last_id . "<br>";
} else {
    echo "sql error<br>" . mysqli_error($connection);
}




?>