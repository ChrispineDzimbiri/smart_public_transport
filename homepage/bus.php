<?php
// Database connection details


// Create database connection
$conn = new mysqli("localhost", "root", "", "transport_system");

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to display buses
function displayBuses() {
    global $conn;

    $result = $conn->query("SELECT * FROM bus_tb");

    if ($result->num_rows > 0) {
        echo '<table border="1">
                <tr>
                <th>ID</th>
                    <th>Registration Number</th>
                    <th>Capacity</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>';

        while ($row = $result->fetch_assoc()) {
          echo '<tr>
          <td>' . $row['id'] . '</td>
          <td>' . $row['registration_number'] . '</td>
          <td>' . $row['capacity'] . '</td>
          <td>' . $row['price'] . '</td>
          <td>' . $row['route'] . '</td>
          <td><button class="edit"><style="text-decoration=none;" a href="edit_bus.php?id=' . $row['id'] . '">Edit</a></button></td>
          <td><button class="delete"><a style="text-decoration:none;color:white;" href="?delete=' . $row['id'] . '">Delete</a></button></td>
          </tr>';
  
        }

        echo '</table>';
    } else {
        echo 'No buses available.';
    }
}

// Function to add a new bus
if (isset($_POST['add_bus'])) {
    $registration_number = $_POST['registration_number'];
    $capacity=$_POST['capacity'];
    $price=$_POST['price'];
    $route=$_POST['route'];

    $sql = "INSERT INTO bus_tb (registration_number,capacity,price,route) VALUES ('$registration_number', '$capacity', '$price', '$route')";

    if ($conn->query($sql) === TRUE) {
        header('Location: addbus.php'); // Redirect after adding a bus
        exit;
    } else {
        echo 'Error adding bus: ' . $conn->error;
    }
}

// Function to delete a bus
if (isset($_GET['delete'])) {
    $bus_id = $_GET['delete'];
    $sql = "DELETE FROM bus_tb WHERE id=$bus_id";

    if ($conn->query($sql) === TRUE) {
        header('Location: addbus.php'); // Redirect after deleting a bus
        exit;
    } else {
        echo 'Error deleting bus: ' . $conn->error;
    }
}
?>
