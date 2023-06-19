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


//CREATING A DATABASE, IF IT DOESNT EXIST
//$create_database = "CREATE DATABASE USERS";

/*if (mysqli_query($connection, $create_database)) {
	echo "database created successfully";
} else {
	echo "does the database exist?<br>" . mysqli_error($connection);
}*/

//create table
$table_create = "CREATE TABLE data(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(30) NOT NULL,
	passcode VARCHAR(50) NOT NULL
)";

if (mysqli_query($connection, $table_create)) {
	echo "sql success";
} else {
	echo "sql error<br>" . mysqli_error($connection);
}




?>