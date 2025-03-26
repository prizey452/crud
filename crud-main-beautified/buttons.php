<!DOCTYPE html>
<html>

<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
        }

        .parent {
            display: flex;
            justify-content: center;
            gap: 15px;
            margin-bottom: 2rem;
            margin-top: 20px;
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
    </style>
</head>

<body>

<?php
echo "<div class='parent'>
        <a href='select_all.php' class='btn btn-primary'>REGISTERED EMAILS</a>
        <a href='index.php' class='btn btn-danger'>HOME</a>
      </div>";
?>

</body>
</html>
