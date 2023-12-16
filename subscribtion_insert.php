<?php
session_start();
if(isset($_SESSION["username"])) {
} else {
    echo "لم يتم الاضافة الى السلة يرجى التسجيل في الموقع ";
    echo '<br /><br /><a href="signin.php">الانتقال الى صفحة التسجيل    </a>';
    echo '<br /><br /><a href="login.php">الانتقال الى صفحة تسجيل الدخول    </a>';
    echo '<br /><br /><a href="HomePage.php">الانتقال الى الصفحة الرئيسية    </a>';
    exit();
}
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "flower";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $sub_type = $_POST["sub_type"];
        $size = $_POST["size"];
        $location = $_POST["location"];
        $style = $_POST["style"];
        $type = $_POST["type"];
        $additional = $_POST["additional"];
        $color = $_POST["color"];
        $note = $_POST["note"];
        $saled = $_POST["saled"];
        $price = $_POST["price"];
        $user_id = $_SESSION["user_id"];

        $sql = "INSERT INTO subscription (user_id, sub_type, size, location, style, type, additional, color, note, saled, price)
            VALUES ($user_id , '$sub_type', '$size', '$location', '$style', '$type', '$additional', '$color', '$note', '$saled', '$price')";

        if ($conn->query($sql) === TRUE) {
            echo "تم الاضافة الى السلة ";
            echo '<br /><br /><a href="subscribtion.php">الانتقال الى صفحة اشتراكات فلوريستا </a>';
            echo '<br /><br /><a href="HomePage.php">الانتقال الى الصفحة الرئيسية    </a>';
            echo '<br /><br /><a href="cart.php">الانتقال الى صفحة السلة    </a>';
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

    }


    $conn->close();
    

  

?>