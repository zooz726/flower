<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $location = $_POST["location"];

    $sql = "INSERT INTO users (username, password, email, phone, location, image) VALUES ('$username', '$password', '$email', '$phone', '$location', '-')";

    if ($conn->query($sql) === TRUE) {
        echo "تم التسجيل بنجاح! مرحبًا بكم في فلوريستا";
        echo '<br>';
        echo '<a href="HomePage.php">الصفحة الرئيسية</a>';
        echo '<br>';
        echo '<a href="login.php">تسجيل الدخول</a>';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>