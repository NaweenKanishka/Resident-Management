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

$output = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $search = trim($_POST['search']);

    // Prevent SQL injection
    $search = $conn->real_escape_string($search);

    // Search query (Search by NIC or Name)
    $sql = "SELECT * FROM residents WHERE nic LIKE '%$search%' OR full_name LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $output .= "<table border='1'>
                        <tr>
                            <th>Full Name</th>
                            <th>Date of Birth</th>
                            <th>NIC</th>
                            <th>Address</th>
                            <th>Phone</th>
                            <th>Email</th>
                            <th>Occupation</th>
                            <th>Gender</th>
                            <th>Registered Date</th>
                        </tr>";

        while ($row = $result->fetch_assoc()) {
            $output .= "<tr>
                            <td>{$row['full_name']}</td>
                            <td>{$row['dob']}</td>
                            <td>{$row['nic']}</td>
                            <td>{$row['address']}</td>
                            <td>{$row['phone']}</td>
                            <td>{$row['email']}</td>
                            <td>{$row['occupation']}</td>
                            <td>{$row['gender']}</td>
                            <td>{$row['registered_date']}</td>
                        </tr>";
        }
        $output .= "</table>";
    } else {
        $output = "<p>No residents found matching your search.</p>";
    }
}

$conn->close();

echo $output; // Send response to AJAX request
?>
