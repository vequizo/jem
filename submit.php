<?php
// Database configuration
$servername = "localhost";
$username = "jem";  // Replace with your MySQL username
$password = "jem";  // Replace with your MySQL password
$dbname = "mydb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form submission
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $firstname = $_POST['fname'];  // Changed from 'firstname' to 'fname'
    $middlename = $_POST['mname']; // Changed from 'middlename' to 'mname'
    $lastname = $_POST['lname'];   // Changed from 'lastname' to 'lname'
    $age = $_POST['age'];
    $address = $_POST['address'];
    $courseandsec = $_POST['courseandsec']; // Corrected to match your table column name

    // Insert data into the `form` table
    $sql = "INSERT INTO form (fname, mname, lname, age, address, courseandsec) 
            VALUES ('$firstname', '$middlename', '$lastname', '$age', '$address', '$courseandsec')";

    if ($conn->query($sql) === TRUE) {
        echo "<div class='alert alert-success' role='alert'>New record created successfully!</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>Error: " . $conn->error . "</div>";
    }

    // Close the connection
    $conn->close();
}
?>