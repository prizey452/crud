<?php
include 'connection.php';
include 'buttons.php';

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Record</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            height: 100vh;
        }

        /* Navigation Bar */
        .nav {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 15px;
            background: white;
            padding: 15px;
            box-shadow: 0px 2px 5px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            left: 0;
        }

        .btn {
            text-decoration: none;
            font-weight: bold;
            padding: 12px 20px;
            border-radius: 8px;
            transition: all 0.3s ease-in-out;
            font-size: 16px;
            display: inline-block;
        }

        .btn-primary {
            background-color: #007BFF;
            color: white;
            border: 2px solid #007BFF;
        }

        .btn-primary:hover {
            background-color: white;
            color: #007BFF;
        }

        .btn-danger {
            background-color: #dc3545;
            color: white;
            border: 2px solid #dc3545;
        }

        .btn-danger:hover {
            background-color: white;
            color: #dc3545;
        }

        /* Form Container */
        .container {
            width: 350px;
            padding: 20px;
            background: white;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
            border-radius: 10px;
            text-align: center;
            margin-top: 80px; /* Push form below the navigation */
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        label {
            font-weight: bold;
            margin-bottom: 5px;
            align-self: flex-start;
        }

        input[type='text'] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
        }

        button {
            background: #28a745;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
            width: 100%;
        }

        button:hover {
            background: #218838;
        }
    </style>
</head>
<body>

<!-- Navigation Bar -->
<div class='nav'>
    <a href='select_all.php' class='btn btn-primary'>REGISTERED EMAILS</a>
    <a href='index.php' class='btn btn-danger'>HOME</a>
</div>

<!-- Update Form -->
<div class='container'>
    <h2>Update Record</h2>

    <?php
    if (isset($_GET['updateid'])) {
        $updateid = $_GET['updateid'];
        $select_all = "SELECT * FROM data WHERE id = $updateid";
        $action = mysqli_query($connection, $select_all);

        if ($action) {
            echo "<script>console.log('Success selecting record');</script>";
        }

        if ($line = mysqli_fetch_assoc($action)) {
            echo "<form action='' method='post'>
                    <label>Email</label>
                    <input type='text' name='email' value='" . $line["email"] . "' required />

                    <label>Password</label>
                    <input type='text' name='password' value='" . $line["passcode"] . "' required />

                    <button type='submit' name='update'>Update</button>
                  </form>";
        }

        if (isset($_POST['update'])) {
            $new_email = $_POST['email'];
            $new_passcode = $_POST['password'];
            $update = "UPDATE data SET email ='$new_email', passcode='$new_passcode' WHERE id = $updateid";

            if (mysqli_query($connection, $update)) {
                echo "<script>alert('Update successful! Redirecting...');</script>";
                echo "<script>window.location.href = 'select_all.php';</script>";
            } else {
                echo "<p style='color: red;'>Error updating record: " . mysqli_error($connection) . "</p>";
            }
        }
    }
    ?>
</div>

</body>
</html>
