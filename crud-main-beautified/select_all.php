<?php
include 'connection.php';
include 'buttons.php';

// Select all data from the table
$select_all = "SELECT * FROM data";
$action = mysqli_query($connection, $select_all);

// CSS styles
echo "<style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        text-align: center;
    }
    h1 {
        color: #333;
    }
    table {
        width: 80%;
        margin: 20px auto;
        border-collapse: collapse;
        background: white;
        box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        border-radius: 10px;
        overflow: hidden;
    }
    th, td {
        padding: 12px;
        border-bottom: 1px solid #ddd;
        text-align: center;
    }
    th {
        background: #007BFF;
        color: white;
        text-transform: uppercase;
    }
    tr:nth-child(even) {
        background: #f9f9f9;
    }
    tr:hover {
        background: #f1f1f1;
    }
    button {
        background: #28a745;
        color: white;
        border: none;
        padding: 8px 12px;
        margin: 2px;
        cursor: pointer;
        border-radius: 5px;
        font-size: 14px;
    }
    button:hover {
        opacity: 0.8;
    }
    .delete-btn {
        background: #dc3545;
    }
    .delete-all-btn {
        background: #dc3545;
        padding: 10px 20px;
        font-size: 16px;
        margin-top: 20px;
    }
</style>";

echo "<h1>RESULTS</h1>";
echo "<table>
        <tr>
            <th>ID</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>ACTION</th>
        </tr>";

while ($line = mysqli_fetch_assoc($action)) {
    echo "<tr>
            <td>{$line['id']}</td>
            <td>{$line['email']}</td>
            <td>{$line['passcode']}</td>
            <td>
                <form action='update_table.php' method='get' style='display:inline;'>
                    <button name='updateid' value='{$line['id']}'>UPDATE</button>
                </form>
                <form action='delete_from_table.php' method='get' style='display:inline;'>
                    <button class='delete-btn' name='delte' value='{$line['id']}'>DELETE</button>
                </form>
            </td>
         </tr>";
}

echo "</table>";

echo "<form action='max_remove_table_data.php' method='post' onsubmit='return confirmDelete();'>
        <button type='submit' class='delete-all-btn'>DELETE ALL DATA</button>
      </form>";

?>

<script>
    function confirmDelete() {
        return confirm("Are you sure you want to delete all records?");
    }
</script>
