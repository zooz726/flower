<!DOCTYPE html>
<html lang="ar">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLORISTA | Home Page</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        .section111 {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
            direction: rtl;
        }

        .section-heading {
            color: #333;
            font-size: 24px;
            margin-bottom: 15px;
            direction: rtl !important;
            display: flex;
            flex-direction: column;
            align-items: center;
        }


        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        th {
            background-color: #ddd;
            padding: 10px;
            text-align: center;
        }

        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        .delete-icon {
            cursor: pointer;
            color: #e74c3c;
            font-size: 20px;
        }
    </style>

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

    <?php
        if(isset($_SESSION["username"])) {
            
        } else {
            echo'<br /> <br />';
            echo '<h1 style="direction:rtl;  text-align: right;">فضلاً التسجيل في الموقع من ثم تسجيل الدخول</h1>';
            exit();
        }
    ?>


    <section class="" id="">
        <h2 style="direction: rtl !important;" class="section-heading">السلة</h2>
        <div class="">
            <table>
                <tr>
                    <th>الخدمة/المنتج</th>
                    <th>الكمية</th>
                    <th>السعر</th>
                    <th>المجموع</th>

                    <th>ازالة</th>
                </tr>
                <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $dbname = "flower";

                    $conn = new mysqli($servername, $username, $password, $dbname);

                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    }
                    $user_id = $_SESSION["user_id"];

                    $sql = "SELECT * FROM subscription where saled='cart' and user_id=$user_id";
                    $result = $conn->query($sql);

                    $count = 0;
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td class="td">باقة   ' . $row['sub_type'] . '</td>';
                        echo '<td class="td"><input class="quantity" type="text" value="1"></td>';
                        echo '<td class="td"><input class="price-per-unit" type="text" value="' . $row['price'] . '" disabled> ر.س </td>';
                        echo '<td class="td"><input class="total-price" type="text" value="' . $row['price'] . '" disabled> ر.س </td>';
                        echo '<td class="td"><span class="delete-icon">🗑️</span></td>';
                        echo '</tr>';
                    }
                    

                    $conn->close();
                ?>

            </table>


        </div>


    </section>
    <div class="container">
        <div class="p1">
            <h2>الفاتورة</h2>
            <table>
                <tr>
                    <td>القيمة</td>
                    <td>
                        <p id="totalValue">0 SR</p>
                    </td>
                </tr>
            </table>
        </div>
    </div>



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

        // Call updateInvoiceTotal once after the page loads
        updateInvoiceTotal();

        function updateTotalPrice(input) {
            var row = input.closest('tr');
            var pricePerUnit = parseFloat(row.querySelector('.price-per-unit').value);
            var quantity = parseInt(input.value);
            var totalPriceInput = row.querySelector('.total-price');
            var totalPrice = pricePerUnit * quantity;

            // Update the total price input value
            totalPriceInput.value = totalPrice.toFixed(2);
        }

        function updateInvoiceTotal() {
            var totalValueElement = document.getElementById('totalValue');
            var total = 0;

            // Loop through all rows and sum up the total values
            var totalInputs = document.querySelectorAll('.total-price');
            totalInputs.forEach(function(totalInput) {
                total += parseFloat(totalInput.value);
            });

            // Update the total value in the invoice section
            totalValueElement.textContent = total.toFixed(2) + ' SR';
        }
    });
    </script>







</body>

</html>