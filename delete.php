<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "resident_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection Failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Handle confirmation alert via JavaScript
    echo "<script>
        if (confirm('Are you sure you want to delete this record?')) {
            window.location.href = 'delete_confirmed.php?id=$id'; // Redirect to a separate page for confirmation
        } else {
            window.location.href = 'find.php'; // Redirect back to the find page if not confirmed
        }
    </script>";
}

$conn->close();
?>
