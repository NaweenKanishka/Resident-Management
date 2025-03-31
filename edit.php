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

// Fetch resident details by ID
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM residents WHERE id = $id";
    $result = $conn->query($sql);
    $resident = $result->fetch_assoc();
}

// Update details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $dob = $_POST['dob'];
    $nic = $_POST['nic'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $occupation = $_POST['occupation'];
    $gender = $_POST['gender'];
    $registered_date = $_POST['registered_date'];

    $update_sql = "UPDATE residents SET full_name='$name', dob='$dob', nic='$nic', address='$address', 
                   phone='$phone', email='$email', occupation='$occupation', gender='$gender', 
                   registered_date='$registered_date' WHERE id=$id";
    if ($conn->query($update_sql) === TRUE) {
        echo "Record updated successfully";
        header('Location: find.php'); // Redirect back to search page
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Resident</title>
    <link rel="stylesheet" href="edit.css">
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
    <div class="body-content">
        <div class="card">


            <form action="" method="post">
                <label for="name">Full Name</label><br>
                <input type="text" name="name" value="<?php echo $resident['full_name']; ?>" required><br><br>

                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" value="<?php echo $resident['dob']; ?>" required><br><br>

                <label for="nic">NIC</label>
                <input type="text" name="nic" value="<?php echo $resident['nic']; ?>" required><br><br>

                <label for="address">Address</label>
                <input type="text" name="address" value="<?php echo $resident['address']; ?>" required><br><br>

                <label for="phone">Phone</label>
                <input type="text" name="phone" value="<?php echo $resident['phone']; ?>" required><br><br>

                <label for="email">Email</label>
                <input type="email" name="email" value="<?php echo $resident['email']; ?>" required><br><br>

                <label for="occupation">Occupation</label>
                <input type="text" name="occupation" value="<?php echo $resident['occupation']; ?>" required><br><br>

                <label for="gender">Gender</label><br>
                <select name="gender" required>
                    <option value="Male" <?php echo $resident['gender']=='Male' ? 'selected' : '' ; ?>>Male</option>
                    <option value="Female" <?php echo $resident['gender']=='Female' ? 'selected' : '' ; ?>>Female
                    </option>
                </select><br><br>

                <label for="registered_date">Registered Date</label>
                <input type="date" name="registered_date" value="<?php echo $resident['registered_date']; ?>"
                    required><br><br>

                <button type="submit">Update Resident</button>
            </form>




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