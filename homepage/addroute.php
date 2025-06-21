
<?php
include 'dashbord.php';
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

// Function to get the list of buses
function getBusList() {
    global $conn;

    $result = $conn->query("SELECT id, registration_number FROM bus_tb");

    $busList = array();

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $busList[$row['id']] = $row['registration_number'];
        }
    }

    return $busList;
}

// Call the function to get the bus list
$busList = getBusList();
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Add Routes</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f4f4f4;
        }

        p {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid #ddd;
        }

        th, td {
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-top: 10px;
            color: #333;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
        }

        button {
            background-color: rgb(32, 65, 91);
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
        }
    </style>
</head>
<body>

    <p>Add Routes</p>

    <form method="post" action="route.php">
        <label for="via_cities">Via Cities:</label>
        <input type="text" id="via_cities" name="via_cities" required>

        <select name="registration_number" id="registration_number" required>
            <option value="" disabled selected>Select a bus</option>
            <?php
            foreach ($busList as $busId => $registrationNumber) {
                echo "<option value=\"$registrationNumber\">$registrationNumber</option>";
            }
            ?>
        </select>

        <!-- <label for="bus_number">Bus Number:</label>
        <input type="text" id="bus_number" name="bus_number" required> -->

        <label for="cost">Cost:</label>
        <input type="number" placeholder="MWK" id="cost" name="cost" required>

        <label for="departure_date">Departure Date:</label>
        <input type="date" id="departure_date" name="departure_date" required>

        <label for="departure_time">Departure Time:</label>
        <input type="time" id="departure_time" name="departure_time" required>

        <button type="submit" name="add_route">Add Route</button>
    </form>

    <?php
   
    // Display routes logic goes here
    ?>
    <?php
// Close the database connection
$conn->close();
?>

</body>
</html>
