<?php
// Connect to your MySQL database
$host = 'RENS_LAPTOP';
$username = 'root';
$password = '61P-P8}yvX+M@QV4bL95';
$database = 'WorldHotels';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

// Retrieve form data
$username = $_POST['SignupUsername'];
$firstName = $_POST['SignupFirstName'];
$lastName = $_POST['SignupLastName'];
$email = $_POST['SignupEmail'];
$password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash the password

// Insert data into the user table
$sql = "INSERT INTO user_table (username, first_name, last_name, email, password) VALUES ('$username''$firstName','$lastName','$email', '$password')";

if ($conn->query($sql) === TRUE) {
   echo "User registered successfully";
} else {
   echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
