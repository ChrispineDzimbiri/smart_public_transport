<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Transport System Seats</title>
    <link rel="stylesheet" href="seats.css">
    <link rel="stylesheet" href="payment.css">
    <style>
        body {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        form {
            text-align: center;
            margin-bottom: 20px;
        }

        label, select, button {
            margin: 5px;
        }

        .seats-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            border: 2px solid #4CAF50; /* Green border */
            padding: 20px;
            max-width: 300px; /* Adjust the maximum width as needed */
        }

        .seat {
            width: 30px;
            height: 30px;
            margin: 5px;
            text-align: center;
            line-height: 30px;
            border: 1px solid #ccc;
            cursor: pointer;
        }

        .green-box {
            background-color: green;
            color: white;
        }

        #paymentForm {
            display: none;
        }
    </style>
</head>
<body>

<?php
// Assuming you have a database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "transport_system";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Start the session (make sure this is at the beginning of your file)
session_start();

// Fetch the list of buses for the dropdown
$sqlBuses = "SELECT registration_number FROM bus_tb";
$resultBuses = $conn->query($sqlBuses);
?>

<form method="post" action="">
    <label for="busSelect">Select a Bus:</label><br>
    <select id="busSelect" name="busSelect">
        <?php
        // Display the list of buses in the dropdown
        while ($rowBus = $resultBuses->fetch_assoc()) {
            echo '<option value="' . $rowBus['registration_number'] . '">'. $rowBus['registration_number'] . '</option>';
        }
        ?>
    </select>
    <button type="submit" style="background-color: #4CAF50; color: white; padding: 8px 15px; border: none; cursor: pointer;">Show Seats</button>
</form>

<div class="seats-container" id="seatsContainer">
    <?php
    // Check if the form is submitted
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Get the selected bus registration number
        $selectedBus = $_POST['busSelect'];

        // Set the selected bus in the session
        $_SESSION['selectedBus'] = $selectedBus;

        // Fetch the number of seats for the selected bus
        $sqlSeats = "SELECT capacity FROM bus_tb WHERE registration_number = '$selectedBus'";
        $resultSeats = $conn->query($sqlSeats);

        if ($resultSeats->num_rows > 0) {
            $rowSeats = $resultSeats->fetch_assoc();
            $numSeats = $rowSeats['capacity'];

            // Display the number of seats in green boxes
            for ($i = 1; $i <= $numSeats; $i++) {
                echo '<div class="seat" onclick="selectSeat(' . $i . ')">' . $i . '</div>';
                

            }
        } else {
            echo "No seats information available for the selected bus.";
        }
    }
    ?>
</div>

<div id="paymentForm">
<div class="table-container">
      <div class="container">
        <div class="title">
          <h4>Select a <span style="color: #ff0000">Payment</span> method</h4>
        </div>

        <form action="#">

          <div class="category">
           
            <label for="mastercard" class="mastercardMethod">
              <div class="imgName">
                <div class="imgContainer mastercard">
                  <img src="TNM.png" alt="" />
                </div>
                <span class="name">TNM Mpamba</span>
              </div>
              <span class="check"
                ><i class="fa-solid fa-circle-check" style="color: #76b4c1"></i
              ></span>
            </label>

            <a href="pay.php">
            <label for="Airtel" class="Airtel">
              <div class="imgName AMEX">
                <div class="imgContainer">
                  <img src="airtel-logo.png" alt="" />
                </div>
                <span class="name">Airtel Money</span>
              </div>
              <span class="check"
                ><i class="fa-solid fa-circle-check" style="color: #76b4c1"></i
              ></span>
            </label>
          </a>
          
          </div>
        </form>
      </div>
    </div>
</div>

<script>
    function selectSeat(seatNumber) {
        // Set the selected seat number in the hidden input field
        document.getElementById('seatNumber').value = seatNumber;

        // Set the selected seat number in the session variable
        var selectedSeat = <?php echo $seatNumber; ?>;
        sessionStorage.setItem('selectedSeat', selectedSeat);

        // Display the payment form when a seat is selected
        document.getElementById('paymentForm').style.display = 'block';
    }
</script>

</body>
</html>
