<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "resident_database";
$error = "";

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


    if(empty($full_name) || empty($DOB) || empty($NIC) || empty($Address) || empty($phone) || empty($email) || empty($occupation) || empty($gender) || empty($registered_date)){
        $error = "All feilds are required."
    }

    $sql = "INSERT INTO residents (full_name, dob, nic, address, phone, email, occupation, gender, registered_date)
    VALUES ('$full_name', '$DOB', '$NIC', '$Address', '$phone', '$email', '$occupation', '$gender', '$registered_date')";

    if($conn->query($sql) === TRUE){
        echo "Registration success!";
    }else
    {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
$conn->close();

?>