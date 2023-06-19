<?php
include 'connection.php';

if (isset($_GET['updateid'])) {

    $update = $_GET['updateid'];
    $select_all = "SELECT * FROM data where id = $update";
    $action = mysqli_query($connection, $select_all);
    while ($line = mysqli_fetch_assoc($action)) {

        echo "<form action='insert.php' method='post'>" .
            "<label> EMAIL</label><br />" .
            "<input type='text' name='email'" . "value=" . $_line['email'] . " />
        <br /><br />

        <label> PASSWORD</label><br />
        <input type='text' name='password' value=" . $_line['passcode'] . " />
    <br /><br />

    <input type='submit' value='submit' />
</form>";
    }
}
?>