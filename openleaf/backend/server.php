<?php
// Database configuration
$servername = "localhost"; 
$username = "root";        
$password = "Tushar@0326";           
$database = "abc"; 
// Create a connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Uncomment for debugging
// echo "Connected successfully";
?>


<?php
// Include the server.php file
include('server.php');

// Retrieve and sanitize user input
$name = mysqli_real_escape_string($conn, $_POST['name']);
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash the password

// Insert the user into the database
$sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Signup successful!'); window.location.href = 'index.html';</script>";
} else {
    echo "<script>alert('Error: " . $conn->error . "'); window.location.href = 'signup.html';</script>";
}

// Close the connection
$conn->close();
?>
