<?php
// Include database connection code
$conn= new mysqli('localhost', 'root', '', 'transport_system');

if($conn->connect_error)
{
  echo"no connection".$conn->connect_error;
}


// Get form data
$viaCity = $_POST['viaCity'];
$registrationNumber = $_POST['registrationNumber'];
$cost = $_POST['cost'];
$selectedSeat = $_POST['selectedSeat'];

// Validate form data
if (empty($viaCity) || empty($registrationNumber) || empty($cost) || empty($selectedSeat)) {
    die("Error: All fields are required");
}

// Validate cost against the actual cost in the database
$sqlCostValidation = "SELECT cost FROM routes_tb WHERE registration_number = ?";
$stmtCostValidation = $conn->prepare($sqlCostValidation);
$stmtCostValidation->bind_param("s", $registrationNumber);
$stmtCostValidation->execute();
$resultCostValidation = $stmtCostValidation->get_result();

if ($resultCostValidation->num_rows === 0) {
    die("Error: Invalid registration number");
}

$row = $resultCostValidation->fetch_assoc();
$actualCost = $row['cost'];

if ($cost != $actualCost) {
    die("Error: Invalid cost");
}

$stmtCostValidation->close();

// Perform database operations within a transaction
$conn->begin_transaction();

try {
    // Update the booked seats in the database
    $sqlUpdate = "UPDATE routes_tb SET booked_seats = booked_seats + 1 WHERE registration_number = ?";
    $stmtUpdate = $conn->prepare($sqlUpdate);
    $stmtUpdate->bind_param("s", $registrationNumber);
    $stmtUpdate->execute();
    $stmtUpdate->close();

    // Add the booking information to a bookings table (replace with your actual table structure)
    $sqlInsertBooking = "INSERT INTO bookings (via_city, registration_number, cost, selected_seat) VALUES (?, ?, ?, ?)";
    $stmtInsertBooking = $conn->prepare($sqlInsertBooking);
    $stmtInsertBooking->bind_param("ssds", $viaCity, $registrationNumber, $cost, $selectedSeat);
    $stmtInsertBooking->execute();
    $stmtInsertBooking->close();

    // Commit the transaction
    $conn->commit();

    // Provide success message to the user
    echo "Booking is successful!";
} catch (Exception $e) {
    // Rollback the transaction in case of an exception
    $conn->rollback();

    // Handle the exception (log, display an error message, etc.)
    die("Error: " . $e->getMessage());
} finally {
    // Close the database connection
    $conn->close();
}
?>
