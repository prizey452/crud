<?php
include 'connection.php';
include 'buttons.php';

// Check connection success
if (!$connection) {
    die("<h2>Check config, is server alive?</h2>" . mysqli_connect_error());
}

// Create table form
echo "<form action='' method='post'>";
echo "<label> CREATE TABLE</label><br />";
echo "<input type='text' name='table' required />";
echo "<br /><br />";
echo "<button name='update'>UPDATE</button>";
echo "</form>";

if (isset($_POST['table'])) {
    $tablename = $_POST['table'];
    $table_create = "CREATE TABLE $tablename (
        id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
        email VARCHAR(30) NOT NULL,
        passcode VARCHAR(50) NOT NULL
    )";

    if (mysqli_query($connection, $table_create)) {
        echo "<h2>Table '$tablename' created successfully.</h2>";
        echo "<h3>Redirecting to the homepage...</h3>";

        // JavaScript redirect after 3 seconds
        echo "<script>
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 3000);
              </script>";
    } else {
        echo "SQL Error: " . mysqli_error($connection);
    }
}
?>
