<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Bus</title>
</head>
<body>

    <h2>Edit Bus</h2>

    <form method="post" action="">
        <input type="hidden" name="bus_id" value="<?php echo $bus['id']; ?>">
        <label for="new_registration_number">New Registration Number:</label>
        <input type="text" id="new_registration_number" name="new_registration_number" value="<?php echo $bus['registration_number']; ?>" required>
        <button type="submit">Save Changes</button>
    </form>

</body>
</html>
<?php

// Database connection details
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'buses';

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $bus_id = $_POST['bus_id'];
    $new_registration_number = $_POST['new_registration_number'];

    // Update the bus record
    $sql = "UPDATE bus_tb SET registration_number = '$new_registration_number' WHERE id = $bus_id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php'); // Redirect after updating a bus
        exit;
    } else {
        echo 'Error updating bus: ' . $conn->error;
    }
}

// Retrieve the bus ID from the query parameters
if (isset($_GET['id'])) {
    $bus_id = $_GET['id'];

    // Fetch the current bus details
    $result = $conn->query("SELECT * FROM bus_tb WHERE id = $bus_id");

    if ($result->num_rows > 0) {
        $bus = $result->fetch_assoc();
    } else {
        echo 'Bus not found.';
        exit;
    }
} else {
    echo 'Bus ID not provided.';
    exit;
}
?>


