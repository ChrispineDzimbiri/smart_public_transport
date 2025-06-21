<?php
// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'transport_system';

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_route'])) {
    // Retrieve form data
    $via_cities = $_POST['via_cities'];
    $registration_number = $_POST['registration_number'];
    $cost = $_POST['cost'];
    $departure_date = $_POST['departure_date'];
    $departure_time = $_POST['departure_time'];

    // Insert route details into the database
    $sql = "INSERT INTO route_tb (via_cities, registration_number, cost, departure_date, departure_time) 
            VALUES ('$via_cities', '$registration_number', '$cost', '$departure_date', '$departure_time')";

    if ($conn->query($sql) === TRUE) {
        echo '<p style="color: green;">Route added successfully!</p>';
    } else {
        echo '<p style="color: red;">Error adding route: ' . $conn->error . '</p>';
    }
}
?>



<?php
// Close the database connection
$conn->close();
?>
