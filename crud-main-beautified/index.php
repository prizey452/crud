<?php
include 'connection.php';
include 'buttons.php';

echo "
<!DOCTYPE html>
<html>
<head>
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

        /* Navigation buttons */
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

        /* Form container */
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

        input[type='email'],
        input[type='password'] {
            width: 90%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 16px;
            text-align: left;
        }

        input[type='submit'] {
            background: #007BFF;
            color: white;
            border: none;
            padding: 12px 20px;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            transition: 0.3s;
            width: 100%;
        }

        input[type='submit']:hover {
            background: #0056b3;
        }
    </style>
</head>
<body>

<!-- Navigation buttons at the top -->
<div class='nav'>
    <a href='select_all.php' class='btn btn-primary'>REGISTERED EMAILS</a>
    <a href='index.php' class='btn btn-danger'>HOME</a>
</div>

<!-- Form container -->
<div class='container'>
    <h2>Register</h2>
    <form action='' method='post'>
        <label for='email'>Email</label>
        <input type='email' name='email' id='email' required />

        <label for='password'>Password</label>
        <input type='password' name='password' id='password' required />

        <input type='submit' value='Submit' />
    </form>
</div>

</body>
</html>
";

// Check connection success
if (!$connection) {
    die("<h2>Check config, is server alive?</h2>" . mysqli_connect_error());
}

if (isset($_POST['password'])) {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Insert into table
    $insert_table = "INSERT INTO data (
        id,
        email,
        passcode
    ) VALUES (NULL, '$email', '$password')";

    try {
        if (mysqli_query($connection, $insert_table)) {
            $last_id = mysqli_insert_id($connection);
            echo "<script>alert('Insert success, LAST ID = $last_id');</script>";
        }
    } catch (mysqli_sql_exception $e) {
        if (strpos($e->getMessage(), "Table 'users.data' doesn't exist") !== false) {
            echo "<h2>Error: The table 'data' does not exist.</h2>";
            echo "<h3>Redirecting to create_table.php...</h3>";

            // Redirect after 3 seconds
            echo "<script>
                    setTimeout(function() {
                        window.location.href = 'create_table.php';
                    }, 3000);
                  </script>";
        } else {
            echo "Error: " . $e->getMessage();
        }
    }
}
?>
