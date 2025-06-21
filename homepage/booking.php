<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus Booking</title>
    <link rel="stylesheet" href="booking.css ">
</head>
<body>
    <form id="bookingForm">
        <label for="viaCities">Select Via City:</label>
        <select id="viaCities" onchange="fetchBusDetails()">
            <!-- Options will be dynamically populated using JavaScript -->
        </select>

        <label for="registrationNumber">Registration Number:</label>
        <input type="text" id="registrationNumber" name="registrationNumber" readonly>

        <label for="amount">Amount:</label>
        <input type="text" id="amount" name="amount" readonly>

        <button type="submit">Submit Booking</button>
    </form>

    <script src="script.js"></script>
</body>
</html>
