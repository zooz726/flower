<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLORISTA | Login </title>
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


    <section class="section111" id="">
        <br />
        <div class="">

            <div class="container">
                <h2 style="direction:rtl; text-align: center; font: size 90px; color:rgb(136, 172, 187);" class="mt-5">تسجيل الدخول</h2>

                <form style="direction:rtl; text-align: right;" class="mt-4" action="process_login.php" method="post">
                    <div class="form-group">
                        <label for="username">اسم المستخدم:</label>
                        <input type="text" class="form-control" id="username" name="username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">كلمة المرور:</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <br />
                    <button type="submit" style="border-radius: 6px 20px; color: white; background-color:rgb(136, 172, 187);
                    padding: 0px 9px; border: none; align-self: end; margin-left: 10px; font-weight: 200;" 
                    class="buttonStyle"> تسجيل الدخول</button>
                </form>
            </div>

        </div>
    </section>

    <br />


    <footer>
        Copyright reserved with <i>♥</i> for <span> FLORISTA </span>
    </footer>


    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var quantityInputs = document.querySelectorAll('.quantity');

        quantityInputs.forEach(function(input) {
            input.addEventListener('input', function() {
                updateTotalPrice(this);
                updateInvoiceTotal();
            });
        });

        updateInvoiceTotal();

        function updateTotalPrice(input) {
            var row = input.closest('tr');
            var pricePerUnit = parseFloat(row.querySelector('.price-per-unit').value);
            var quantity = parseInt(input.value);
            var totalPriceInput = row.querySelector('.total-price');
            var totalPrice = pricePerUnit * quantity;

            totalPriceInput.value = totalPrice.toFixed(2);
        }

        function updateInvoiceTotal() {
            var totalValueElement = document.getElementById('totalValue');
            var total = 0;

            var totalInputs = document.querySelectorAll('.total-price');
            totalInputs.forEach(function(totalInput) {
                total += parseFloat(totalInput.value);
            });

            totalValueElement.textContent = total.toFixed(2) + ' SR';
        }
    });
    </script>







</body>

</html>