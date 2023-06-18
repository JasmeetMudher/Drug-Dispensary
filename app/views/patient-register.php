<?php

require_once 'UserController.php';

$servername = "localhost";
$username = "root";
$password = "123pass";
$dbname = "drugdispensary";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$userController = new UserController($conn);
$userController->register();

$conn->close();

?>

<!DOCTYPE html>
<html>

<head>
    <title>Patient Registration</title>
</head>

<body>
    <h2>Patient Registration</h2>
    <form action="register.php" method="POST">
        <label for="ssn">SSN:</label>
        <input type="text" name="ssn" id="ssn" required>
        <br>
        <label for="fname">First Name:</label>
        <input type="text" name="fname" id="fname" required>
        <br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" id="lname" required>
        <br>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" required>
        <br>
        <label for="dob">Date of Birth:</label>
        <input type="text" name="dob" id="dob" required>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" required>
        <br>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
        <br>
        <label for="address">Address:</label>
        <input type="text" name="address" id="address" required>
        <br>
        <input type="submit" value="Register">
    </form>
</body>

</html>