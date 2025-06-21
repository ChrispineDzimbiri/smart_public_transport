<?php
// Start the session (make sure this is at the beginning of your file)
session_start();

// Connect to the database (assuming you have a database connection)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transport_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve data from the Airtel Money payment form
$amount = $_POST['amount'];
$phone = $_POST['phone'];
$pin = $_POST['pin'];
$seatNumber = $_SESSION['selectedSeat']; // Retrieve the seat number

// Validate the entered amount against the bus's registration number
// Assuming the bus registration number is stored in $_SESSION['selectedBus']
$selectedBus = $_SESSION['selectedBus'];

$sql = "SELECT * FROM bus_tb WHERE registration_number = '$selectedBus' AND price = '$amount'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Amount matches, proceed with booking

    // Insert booking details into a bookings table
    $insertBookingSql = "INSERT INTO bookings (registration_number, seat_number, phone_number) VALUES ('$selectedBus', '$seatNumber', '$phone')";
    if ($conn->query($insertBookingSql) === TRUE) {
        // Remove the booked seat from the available seats for that bus
        $updateSeatsSql = "UPDATE bus_tb SET capacity = capacity - 1 WHERE registration_number = '$selectedBus' AND seat_number = '$seatNumber'";
        if ($conn->query($updateSeatsSql) === TRUE) {
            // Display success message
            echo "Booking successful!";
        } else {
            echo "Error updating seats: " . $conn->error;
        }
    } else {
        echo "Error inserting booking: " . $conn->error;
    }
} else {
    // Amount doesn't match
    echo "Error: Amount does not match the selected bus.";
}

// Close the database connection
$conn->close();
?>
