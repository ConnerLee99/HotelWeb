<?php
$servername = "127.0.0.1";
$username = "root";
$password = "61P-P8}yvX+M@QV4bL95";
$dbname = "WebSite Database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST['username'];
    $enteredPassword = $_POST['password'];

    // Query the database for user credentials
    $sql = "SELECT * FROM users WHERE username='$enteredUsername'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $storedPasswordHash = $row['password_hash'];

        // Verify the password
        if (password_verify($enteredPassword, $storedPasswordHash)) {
            // Password is correct, consider implementing session management here

            // Redirect the user after successful login
            header("Location: welcome.php"); // Change "welcome.php" to the desired page
            exit();
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
}

$conn->close();
?>
