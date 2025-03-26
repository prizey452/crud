<?php
include 'connection.php';

// Delete all rows from the 'data' table
$delete_all = "DELETE FROM data";

if (mysqli_query($connection, $delete_all)) {
    // Show success message and redirect
    echo "<script>
            alert('All records have been deleted successfully.');
            window.location.href = 'select_all.php';
          </script>";
} else {
    echo "Error deleting records: " . mysqli_error($connection);
}
?>
