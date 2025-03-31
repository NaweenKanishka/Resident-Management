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
    

}

?>