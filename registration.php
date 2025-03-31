<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "resident_database"

//create connection
$conn = new mysqli($servername, $username, $password, $database);
//check connection
if($conn->connect_error){
    die("Connection Failed " . $conn->connect_error);
}

//check form is submitted
if($_server["REQUEST_METHOD"] == POST){
    $full_name = $_POST['name'];
    $DOB = $_POST['dob'];
    $NIC = $_POST['NIC'];
    $Address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['Email']
    $occupation = $_POST['Occupation'];
    $gender = $_POST['Gender'];
    $registered_date = $_POST['registered_date'];

    $sql = "INSERT INTO residents (full_name, dob, nic, address, phone, email, occupation, gender, registered_date)
    VALUES ('$full_name', '$DOB', '$NIC', '$Address', '$phone', '$email', '$occupation', '$gender', '$registered_date')";

    if($conn->query($sql) === TRUE){
        echo "Registration success!"
    }else{
        echo "Error: " . $sql . "<br>" . $conn->error;
    }


}
$conn->close();

?>