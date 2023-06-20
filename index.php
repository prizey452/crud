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

}

//create table
echo "<form action='' method='post'>";
echo "<label> CREATE TABLE</label><br />";
echo "<input type='text' name='table'" . " />";

echo "<br /><br />";
echo "<button name='update'>UPDATE</button>";
echo "</form>";


if (isset($_POST['table'])) {
	$tablename = $_POST['table'];
	$table_create = "CREATE TABLE $tablename(
	id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
	email VARCHAR(30) NOT NULL,
	passcode VARCHAR(50) NOT NULL
)";

	if (mysqli_query($connection, $table_create)) {
		echo "Table created successfully";
	} else {
		echo "sql error<br>" . mysqli_error($connection);
	}
}




?>