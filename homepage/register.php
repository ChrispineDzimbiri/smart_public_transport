<?php

$conn = new mysqli('localhost', 'root', '', 'transport_system');

if ($conn->connect_error) {
    echo "no connection" . $conn->connect_error;
}

$phone = $_POST["PHONE"];
$name = $_POST["USERNAME"];
$password = $_POST["PASWORD"];

$stmt = $conn->prepare("INSERT INTO user_tb (PHONE, USERNAME, PASWORD) VALUES (?,?,?)");
$stmt->bind_param("sss", $phone, $name, $password);

if ($stmt->execute()) {
    // Registration successful
    echo '<script type="text/javascript">';
    echo 'alert("Register successful");';
    echo 'window.location.href = "userr.php";';  // Redirect to the user dashboard
    echo '</script>';
} else {
    // Registration failed
    echo "Registration failed: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
