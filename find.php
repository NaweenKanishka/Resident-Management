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

$searchResults = "";

// Check if search form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $search = trim($_POST['search']);

    // Prevent SQL injection
    $search = $conn->real_escape_string($search);

    // Search query (Search by NIC or Name)
    $sql = "SELECT * FROM residents WHERE nic LIKE '%$search%' OR full_name LIKE '%$search%' OR address LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $searchResults .= "<table border='1'>
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
                                <th>Actions</th>
                            </tr>";

        while ($row = $result->fetch_assoc()) {
            $searchResults .= "<tr>
                                <td>{$row['full_name']}</td>
                                <td>{$row['dob']}</td>
                                <td>{$row['nic']}</td>
                                <td>{$row['address']}</td>
                                <td>{$row['phone']}</td>
                                <td>{$row['email']}</td>
                                <td>{$row['occupation']}</td>
                                <td>{$row['gender']}</td>
                                <td>{$row['registered_date']}</td>
                                <td>
                                    <a href='edit.php?id={$row['id']}'>Edit</a> | 
                                    <a href='delete.php?id={$row['id']}'>Delete</a>
                                </td>
                            </tr>";
        }
        $searchResults .= "</table>";
    } else {
        $searchResults = "<p>No residents found matching your search.</p>";
    }
}

// Close connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Find Residence</title>
    <link rel="stylesheet" href="find.css">
</head>

<body>
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="#"><img src="My first  logo black-01.png" alt=""></a>
            </div>

            <div class="auth-links">
                <a href="#">Sign In</a>
                <a href="#">Register</a>
            </div>
        </div>
    </header>
    <div class="back-forward">
        <a style="text-decoration: none;" href="index.html">
            <div class="back-forward-content">
                <img src="arrow_back_24dp_FFFFFF_FILL0_wght400_GRAD0_opsz24.svg" alt="">
                <p>Back to Dashboard</p>
            </div>
        </a>

    </div>
    <h1 style="text-align: center; padding-top: 20px;">Find Registered Residents Details</h1>
    <div class="body-content3">

        <div class="card2">
            <form action="" method="post">
                <div class="cc">
                    <div>
                        <label for="search">Search Resident (NIC, Name or Address)</label>
                        <input type="text" name="search" id="search" required>
                    </div>

                    <div class="ccc">

                        <button type="submit">Find Resident</button>
                    </div>
                </div>


            </form>
        </div>
        <div class="card2">
            <div class="residents-details">
                <h1>Details</h1>
                <div id="search-results">
                    <?php echo $searchResults; ?>

                </div>
            </div>

        </div>

    </div>





    <div class="body-content2">
        <div class="develop">
            <div>
                <div>
                    <p>--- Developed by Naween Kanishka ---</p>
                    <p></p>
                </div>

            </div>



        </div>
    </div>


</body>

</html>