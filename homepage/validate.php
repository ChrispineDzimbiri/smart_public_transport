<?php

require_once('conn.php');


//admin credentials
$admin_phone = '0991105833';
$admin_password = '1234';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input
    $input_phone = $_POST['PHONE'];
    $input_password = $_POST['PASWORD'];

    // Check if it's the admin
    if ($input_phone === $admin_phone && $input_password === $admin_password) {
        // Redirect to admin dashboard
        header('Location:dashbord.php');
        exit;
    }

    // If not admin, check the database
    // $conn = new mysqli("localhost", "root", "", "transport_system");

    // Check the connection
    // if ($conn->connect_error) {
        // die("Connection failed: " . $conn->connect_error);
    // }

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT * FROM user_tb WHERE PHONE = ? AND PASWORD = ?");
    $stmt->bind_param("ss", $input_phone, $input_password);

    // Execute the query
    $stmt->execute();

    // Fetch the result
    $result = $stmt->get_result();

    // Check if the user exists in the database


    if ($result->num_rows > 0) {
        // Redirect to user dashboard
        header('Location: user.php');
    
        exit;
    } else {
        // Display an error message
        $error_message = 'Invalid credentials. Please try again.';
        echo "$error_message";
    }

    // Close the statement and database connection
    $stmt->close();
    $conn->close();
}
?>

