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

    // Delete query
    $sql = "DELETE FROM residents WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header('Location: find.php'); // Redirect back to search page
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

$conn->close();
?>
