<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newUsername = $_POST["username"];
    $newPassword = $_POST["password"]; 
    $newEmail = $_POST["email"];
    $newPhone = $_POST["phone"];
    $newLocation = $_POST["location"];

    $servername = "localhost";
    $dbUsername = "root";
    $password = "";
    $dbname = "flower";

    $conn = new mysqli($servername, $dbUsername, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $updateSql = "UPDATE users SET username=?, password=?, email=?, phone=?, location=? WHERE username=?";
    $stmt = $conn->prepare($updateSql);
    $stmt->bind_param("ssssss", $newUsername, $newPassword, $newEmail, $newPhone, $newLocation, $_SESSION["username"]);

    if ($stmt->execute()) {
        $_SESSION["username"] = $newUsername;

        header("Location: HomePage.php"); 
        exit();
    } else {
        echo "Error updating user information: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    header("Location: HomePage.php");
    exit();
}
?>
