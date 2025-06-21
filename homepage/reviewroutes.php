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

// Function to display routes
function displayRoutes() {
    global $conn;

    $result = $conn->query("SELECT * FROM route_tb");

    if ($result->num_rows > 0) {
        echo '<table border="1">
                <tr>
                    <th>ID</th>
                    <th>Via Cities</th>
                    <th>Bus Number</th>
                    <th>Cost</th>
                    <th>Departure Date</th>
                    <th>Departure Time</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
            echo '<tr>
                    <td>' . $row['ID'] . '</td>
                    <td>' . $row['via_cities'] . '</td>
                    <td>' . $row['registration_number'] . '</td>
                    <td>' . $row['cost'] . '</td>
                    <td>' . $row['departure_date'] . '</td>
                    <td>' . $row['departure_time'] . '</td>
                  </tr>';
        }

        echo '</table>';
    } else {
        echo 'No routes available.';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Routes</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        p {
            text-align: center;
            color: #333;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: rgb(32, 65, 91);
            color: white;
        }

        button {
            display: block;
            margin: 20px auto;
            padding: 10px 20px;
            background-color: rgb(32, 65, 91);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>

    <p>Routes</p>

    <?php
    // Call the function to display routes
    displayRoutes();
    ?>

    <button onclick="location.href='addroute.php'">Add Route</button>

</body>
</html>

<?php
include 'dashbord.php';
// Close the database connection
$conn->close();
?>
