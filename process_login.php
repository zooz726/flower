<?php
session_start(); // Start the session

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "flower";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $entered_username = $_POST["username"];
    $entered_password = $_POST["password"];

    
    $sql = "SELECT * FROM users WHERE username = '$entered_username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();

        if ($entered_password=== $row["password"]) {
            
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["username"] = $row["username"];

            
            header("Location: HomePage.php");
            exit();
        } else {
            echo "كلمة المرور غير صحيحة!";
            echo '<br>';
            echo '<a href="login.php">تسجيل الدخول</a>';
        }
    } else {
        echo "اسم المستخدم غير صحيح!";
        echo '<br>';
        echo '<a href="login.php">تسجيل الدخول</a>';
    }
}

$conn->close();
?>
