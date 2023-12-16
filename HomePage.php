<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLORISTA | Home Page</title>
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
            <p> متعة التسوق</p>
            
        </div>
    </section>

    <section class="services" id="services">
        <h2>خدماتنا</h2>
        <div class="container">


            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "flower";


            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM services";
            $result = $conn->query($sql);

            $count = 0;
            while ($row = $result->fetch_assoc()) {
                echo '<form action="service_insert.php" method="post">';
                echo '<input value="' . $row['title'] . '" type="text" class="form-control" id="sub_type" name="sub_type" hidden>';
                echo '<input value="' . $row['price'] . '" type="text" class="form-control" id="price" name="price" hidden>';
                echo '<div class="card">';
                echo '<div class="card-title">' . $row['title'] . ' </div>';
                echo '';
                if (!empty($row['image'])) {
                    $width = 300;
                    $height = 250;
        
                    echo '<img src="' . $row['image'] . '" width="' . $width . '" height="' . $height . '" alt="service Image">';
                }
                echo '<p>' . $row['description'] . '</p>';
                
                echo '<div class="card-description">السعر:' . $row['price'] . ' ر.س</div>';
                
                if(isset($_SESSION["username"])) {
                    echo '<button style="border-radius: 6px 20px; color: white; background-color:rgb(136, 172, 187);
                    padding: 0px 9px; border: none; align-self: end; margin-left: 10px; font-weight: 200;" class="buttonStyle">إضافة الى السلة</button>';
                } else {
                    echo '<button style="border-radius: 6px 20px; color: white; background-color:rgb(136, 172, 187);
                    padding: 0px 9px; border: none; align-self: end; margin-left: 10px; font-weight: 200;" class="buttonStyle">إضافة الى السلة</button>';
                }
                echo '</div>';
                echo '</form>';
            
    
            }

            $conn->close();
        ?>

        </div>

    </section>

    <section class="shortcuts" id="shortcuts">
        <h2> الورد</h2>
        <div class="container">
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "flower";

                $conn = new mysqli($servername, $username, $password, $dbname);

                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }

                $sql = "SELECT * FROM flowers";
                $result = $conn->query($sql);

                $count = 0;
                while ($row = $result->fetch_assoc()) {
                    echo '<form action="flower_insert.php" method="post">';
                    echo '<input value="' . $row['title'] . '" type="text" class="form-control" id="sub_type" name="sub_type" hidden>';
                    echo '<input value="' . $row['price'] . '" type="text" class="form-control" id="price" name="price" hidden>';
                    echo '<div class="card">';
                    echo '<div class="card-title">' . $row['title'] . ' </div>';
                    echo '';
                    if (!empty($row['image'])) {
                        $width = 300;
                        $height = 250;
            
                        echo '<img src="' . $row['image'] . '" width="' . $width . '" height="' . $height . '" alt="service Image">';
                    }
                    echo '<p>' . $row['description'] . '</p>';
                    
                    echo '<div class="card-description m-2 p-2">السعر:' . $row['price'] . ' ر.س</div>';

                    if(isset($_SESSION["username"])) {
                        echo '<button style="border-radius: 6px 20px; color: white; background-color:rgb(136, 172, 187);
                        padding: 0px 9px; border: none; align-self: end; text-align: center; font-weight: 200;" class="buttonStyle">إضافة إلى السلة</button>';
                    } else {
                        echo '<button style="border-radius: 6px 20px; color: white; background-color:rgb(136, 172, 187);
                        padding: 0px 9px; border: none; align-self: end; text-align: center; font-weight: 200;" class="buttonStyle">   إضافة إلى السلة </button>'; 
                    }
                    echo '</div>';
                    echo '</form>';
                
        
                }

                $conn->close();
            ?>


        </div>




    </section>

    



    <footer>
        Copyright reserved with <i>♥</i> for <span> FLORISTA </span>
    </footer>






</body>

</html>