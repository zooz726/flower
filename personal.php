<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLORISTA | Personal Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <header>
        <h2>FLORISTA</h2>

        <nav id="nav_id">
            <a style="font-size:20px;" href="HomePage.php"> الصفحة الرئيسية </a> |
            <a style="font-size:20px;" href="flower.php"> عن الورد </a> |
            <a style="font-size:20px;" href="service.php"> خدماتنا </a> |
            <a style="font-size:20px;" href="subscribtion.php">اشتراكات فلوريستا </a> |
            <a style="font-size:20px;" href="cart.php"> السلة </a> |
            <a style="font-size:20px;" href="personal.php"> الصفحة الشخصية </a> |
            <?php
                session_start(); 

                if(isset($_SESSION["username"])) {
                    $username = $_SESSION["username"];
                    echo '<a style="font-size:20px;" href="logout.php"> الخروج</a> '; 
                } else {
                    echo '<a style="font-size:20px;" href="signin.php">التسجيل</a> |'; 
                    echo '<a style="font-size:20px;" href="login.php">الدخول</a>'; 
                }
            ?>
        </nav>
        <nav style="color:white;" id="">
            <?php

            if(isset($_SESSION["username"])) {
                $username = $_SESSION["username"];
                echo "مرحبًا, $username! ";
                echo '|  <a href="logout.php"> الخروج</a>';
            } else {
            }
        ?>
        </nav>
    </header>

    <section class="pic">
        <div>
            <h2>أهلاً وسهلاً بكم معنا في <span>فلوريستا</span></h2>
            <p>تصفح جميع خدماتنا</p>

        </div>
    </section>

    <section class="services" id="services">
        <h2>الصفحة الشخصية</h2>
        <?php

            if(isset($_SESSION["username"])) {
                $user___name = $_SESSION["username"];
                echo "<p style='text-align: center;'> مرحبًا, $username! </p>";


                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "flower";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM users WHERE username='$user___name'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    echo '<div class="profile">';
                        echo '<h2>'. $row['username'] .'</h2>';
                        echo '<p style="text-align: center;"><strong>البريد الإلكتروني :</strong>'. $row['email'] .'</p>';
                        echo '<p style="text-align: center;"><strong> الهاتف :</strong>'. $row['phone'] .'</p>';
                        echo '<p style="text-align: center;"><strong> الموقع :</strong>'. $row['location'] .'</p>';
                    echo '</div>';


                } else {
                    echo '<p style="text-align: center;">يجب تسجيل الدخول</p>';
                }
        }else {
                    echo '<p style="text-align: center;">يجب تسجيل الدخول</p>';
                }
        ?>


        <div class="container">

        </div>

    </section>





    <footer>
        Copyright reserved with <i>♥</i> for <span> FLORISTA </span>
    </footer>






</body>

</html>