<!-- ... (your existing code) ... -->

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Assuming you have a function to sanitize inputs
    function sanitizeInput($input) {
        return htmlspecialchars(stripslashes(trim($input)));
    }

    // Assuming you have a function to hash sensitive information securely
    function hashSensitiveInfo($info) {
        return password_hash($info, PASSWORD_BCRYPT);
    }

    // Assuming you have a function to check seat availability
    function isSeatAvailable($conn, $selectedBus, $selectedSeat) {
        $sqlCheckSeat = "SELECT * FROM booked_seats WHERE registration_number = '$selectedBus' AND seat_number = $selectedSeat";
        $resultCheckSeat = $conn->query($sqlCheckSeat);
        return $resultCheckSeat->num_rows === 0;
    }

    // Get the selected bus registration number and seat number
    $selectedBus = sanitizeInput($_POST['busSelect']);
    $selectedSeat = sanitizeInput($_POST['selectedSeat']);

    // Fetch cost from the database
    $sqlCost = "SELECT cost FROM bus_tb WHERE registration_number = '$selectedBus'";
    $resultCost = $conn->query($sqlCost);
    if ($resultCost->num_rows > 0) {
        $rowCost = $resultCost->fetch_assoc();
        $cost = $rowCost['cost'];
    } else {
        // Handle the case where cost is not found
        $cost = 0;
    }

    // Display the number of seats in green boxes
    echo '<div class="seats-container" id="seatsContainer">';
    for ($i = 1; $i <= $numSeats; $i++) {
        // Check if the seat is booked
        $seatClass = isSeatAvailable($conn, $selectedBus, $i) ? 'seat' : 'seat booked';
        echo '<div class="' . $seatClass . '" onclick="selectSeat(' . $i . ')">' . $i . '</div>';
    }
    echo '</div>';

    // Display the payment form with autofilled price
    echo '<div id="paymentForm">
        <div class="table-container">
            <div class="container">
                <div class="title">
                    <h4>Select a <span style="color: #ff0000">Payment</span> method</h4>
                </div>
                <form action="process_payment.php" method="post">
                    <input type="hidden" name="selectedBus" value="' . $selectedBus . '">
                    <input type="hidden" name="selectedSeat" value="' . $selectedSeat . '">
                    <input type="hidden" name="cost" value="' . $cost . '">
                    
                    <div class="category">
                        <label for="mastercard" class="mastercardMethod">
                            <div class="imgName">
                                <div class="imgContainer mastercard">
                                    <img src="TNM.png" alt="" />
                                </div>
                                <span class="name">TNM Mpamba</span>
                            </div>
                            <span class="check"><i class="fa-solid fa-circle-check" style="color: #76b4c1"></i></span>
                        </label>

                        <label for="Airtel" class="Airtel">
                            <div class="imgName AMEX">
                                <div class="imgContainer">
                                    <img src="airtel-logo.png" alt="" />
                                </div>
                                <span class="name">Airtel Money</span>
                            </div>
                            <span class="check"><i class="fa-solid fa-circle-check" style="color: #76b4c1"></i></span>
                        </label>
                    </div>
                    <div>
                        <label for="amount">Amount:</label>
                        <input type="text" id="amount" name="amount" value="' . $cost . '" readonly>
                    </div>
                    <div>
                        <label for="phoneNumber">Phone Number:</label>
                        <input type="text" id="phoneNumber" name="phoneNumber" required>
                    </div>
                    <button type="submit">Pay Now</button>
                </form>
            </div>
        </div>
    </div>';
}
?>
<script>
    // Update your selectSeat function to include the selectedSeat parameter
    function selectSeat(seatNumber) {
        // Display the payment form when a seat is selected
        document.getElementById('paymentForm').style.display = 'block';
        
        // Set the selected seat in the payment form
        document.getElementById('selectedSeat').value = seatNumber;
    }
</script>
</body>
</html>

