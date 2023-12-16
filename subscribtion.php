<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FLORISTA | subscribtions</title>
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
                    echo '<a style="font-size:20px;" href="signin.php">التسحيل</a> |'; 
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


    <style>
    .text-right {
        direction: rtl;
        text-align: right;
    }

    .img-fluid {
        width: 100%;
        height: auto;
    }
    </style>


    <section class="container">
        <div class="row">
            <div class="col-7">
            <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <img src="img/onReq.jpg" alt="" class="img-fluid">
            </div>
            <div class="col-5 text-right">
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <br />
                <h2>خدمات إشتراك <span>فلوريستا</span></h2>
                <p>أحط نفسك بالجمال مع خدمة الاشتراك التي نوفرها
                    سيجد الجمال طريقه إليك، أسبوعاً بعد أسبوع،
                    على شكل أروع إبداعات الطبيعة
                    دلّل نفسك مع رفاهية الأزهار التي نقدمها،
                    وشاهد كيف يتحول مزاجك، والمكان من حولك
                    إلى واحة من الرقي والبهجة والجمال.
                    بإمكانك اختيار أن تصلك باقة من اختيارنا
                    صممت بحب لتضفي لمسة من السعادة.
                    وبإمكانك تصميم باقتك بنفسك</p>
            </div>
        </div>
    </section>



    <section class="Subscr">
        <h2> باقات الإشتراك </h2>
        <div class="container">
            <div class="card">
                <h3> الباقة الصغيرة</h3>
                <div class="card-S">
                    <img src="img/subs.jpg" alt="">

                    <p> 350 ر.س

                    </p>

                </div>

            </div>

            <div class="card">
                <h3> الباقة المتوسطة</h3>
                <div class="card-S">
                    <img src="img/subs.jpg" alt="">

                    <p> ر.س 550

                    </p>
                </div>

            </div>

            <div class="card">
                <h3> الباقة الكبيرة</h3>
                <div class="card-S">
                    <img src="img/subs.jpg" alt="">

                    <p> 750 ر.س

                    </p>
                </div>

            </div>

        </div>
    </section>


    <section class="choose">
        <h2> التفاصيل </h2>

        <form action="subscribtion_insert.php" method="post">
            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="sub_type" class="form-label"> نوع الباقة</label>
                    <select class="form-select w-100" id="sub_type" name="sub_type">
                        <option value="صغير">الباقة الصغيرة</option>
                        <option value="متوسط">الباقة المتوسطة</option>
                        <option value="كبير">الباقة الكبيرة</option>
                    </select>
                    <input value="350" type="text" class="form-control" id="price" name="price" hidden>
                </div>
            </div>
            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="size" class="form-label">حجم التنسيق</label>
                    <select class="form-select w-100" id="size" name="size">
                        <option value="صغير">صغير</option>
                        <option value="متوسط">متوسط</option>
                        <option value="كبير">كبير</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="location" class="form-label">مكان التنسيق</label>
                    <select class="form-select w-100" id="location" name="location">
                        <option value="مكتب">مكتب</option>
                        <option value="طاولة طعام">طاولة طعام</option>
                        <option value="ركن قهوة">ركن قهوة</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="style" class="form-label">نوع التنسيق</label>
                    <select class="form-select w-100" id="style" name="style">
                        <option value="موسمي">موسمي</option>
                        <option value="فلوريستا سيجنتشر">فلوريستا سيجنتشر</option>
                        <option value="اختيار خاص">اختيار خاص</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="type" class="form-label">نوع الباقة</label>
                    <select class="form-select w-100" id="type" name="type">
                        <option value="باقة">باقة</option>
                        <option value="سلة">سلة</option>
                        <option value="فازة">فازة</option>
                    </select>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="additional" class="form-label">إضافة</label>
                    <select class="form-select w-100" id="additional" name="additional">
                        <option value="كرت تهنئة">كرت تهنئة</option>
                        <option value="عبارة تحفيزية">عبارة تحفيزية</option>
                        <option value="بيت شعر">بيت شعر</option>
                    </select>
                </div>
                <div class="col-md-6">
                    <label for="color" class="form-label">ألوان مفضلة يستحب تضمينها</label>
                    <input type="text" class="form-control" id="color" name="color">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <label for="note" class="form-label">ملاحظات إضافية</label>
                    <input type="text" class="form-control" id="note" name="note">
                    <input value="cart" type="text" class="form-control" id="saled" name="saled" hidden>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12">
                    <button type="submit" style="border-radius: 6px 20px; color: white; background-color:rgb(136, 172, 187);
                    padding: 0px 9px; border: none; align-self: end; margin-left: 10px; font-weight: 200;"  class="buttonStyle">أضف للسلة</button>
                </div>
            </div>
        </form>

    </section>





    <footer>
        Copyright reserved with <i>♥</i> for <span> FLORISTA </span>
    </footer>




    <script>
    document.addEventListener("DOMContentLoaded", function() {
        document.getElementById("sub_type").addEventListener("change", function() {
            var selectedSize = this.value;

            var priceInput = document.getElementById("price");
            if (selectedSize === "صغير") {
                priceInput.value = "350";
            } else if (selectedSize === "متوسط") {
                priceInput.value = "550";
            } else if (selectedSize === "كبير") {
                priceInput.value = "750";
            }

        });
    });
    </script>



</body>

</html>