<?php
// include 'insert_form.html';
include 'connection.php';
include 'buttons.php';
echo "
<form action='' method='post'>
  <label> EMAIL</label><br />
  <input type='email' name='email' />
  <br /><br />

  <label> PASSWORD</label><br />
  <input type='password' name='password' required/>
  <br /><br />

  <input type='submit' value='submit'/>
</form>
";
//check connection success
if (!$connection) {
    die("<h2>check config, is server alive?</h2>" . mysqli_connect_error());

} else {
    // echo "connection success<br>";
}

if (isset($_POST['password'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    //insert into
    $insert_table = "INSERT INTO data(
	id ,
	email ,
	passcode )
    VALUES (NULL, '$email', '$password')";


    if (mysqli_query($connection, $insert_table)) {
        $last_id = mysqli_insert_id($connection);
        echo "insert success, LAST ID =" . $last_id . "<br>";
    } else {
        echo "sql error<br>" . mysqli_error($connection);
    }
}


?>