<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "resident_database";
$error = [];

//create connection
$conn = new mysqli($servername, $username, $password, $database);
//check connection
if($conn->connect_error){
    die("Connection Failed " . $conn->connect_error);
}

//check form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $full_name = $_POST['name'];
    $DOB = $_POST['DOB'];
    $NIC = $_POST['NIC'];
    $Address = $_POST['Address'];
    $phone = $_POST['phone'];
    $email = $_POST['Email'];
    $occupation = $_POST['Occupation'];
    $gender = $_POST['Gender'];
    $registered_date = $_POST['registered_date'];


    if(empty($full_name)) $error['name'] = "Full Name is required";
    if(empty($DOB)) $error['DOB'] = "Enter your date of birth is required"
    if(empty($NIC)) $error['NIC'] = "NIC Number is required"
    if(empty($Address)) $error['Address'] = "Address is required"
    if(empty($phone)) $error['phone'] = "Phone number is required"
    if(empty($email)) $error['Email'] = "Email is required"
    if(empty($occupation)) $error['occupation'] = "occupation is required"
    if(empty($gender)) $error['gender'] = "gender is required"
    if(empty($registered_date)) $error['registered_date'] = "This feild is required"
    


    if(empty($error)){
        $sql = "INSERT INTO residents (full_name, dob, nic, address, phone, email, occupation, gender, registered_date)
        VALUES ('$full_name', '$DOB', '$NIC', '$Address', '$phone', '$email', '$occupation', '$gender', '$registered_date')";
    
        if($conn->query($sql) === TRUE){
            echo "Registration success!";
        }else
        {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

  
    


}
$conn->close();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registeration Form</title>
    <link rel="stylesheet" href="registration.css">
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
    <h1 style="text-align: center; padding-top: 20px;">Registration Form</h1>
    <div class="body-content">

        <div class="card">
            <div class="card-details">
                <form action="" method="POST">


                    <div class="details">
                        <label for="name">Full Name</label>
                        <input type="text" name="name" id="name"><br>
                        <span class="error"><?php echo $error['name'] ?? ''; ?></span><br>

                        <label for="DOB">Date of Birth</label>
                        <input type="date" name="DOB" id="DOB"><br><br>
                        <span class="error"><?php echo $error['DOB'] ?? ''; ?></span>

                        <label for="NIC">NIC</label>
                        <input type="text" name="NIC" id="NIC"><br><br>

                        <label for="Address">Address</label>
                        <input type="text" name="Address" id="Address"><br><br>

                        <label for="phone">Phone Number</label>
                        <input type="number" name="phone" id="phone"><br><br>

                        <label for="Email">Email</label>
                        <input type="email" name="Email" id="Email"><br><br>


                        <label for="Occupation">Occupation</label>
                        <input type="text" name="Occupation" id="Occupation"><br><br>

                        <label for="Gender">Gender</label><br>
                        <select name="Gender" id="Gender">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <br><br>
                        <label for="registered-date">Registered Date</label>
                        <input type="date" name="registered_date" id="registered_date"><br><br>


                        <button type="submit" id="submit" name="submit">Register</button>

                    </div>

                </form>
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