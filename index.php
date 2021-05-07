<?php

require_once "layout/functions.php";
include_once "database/db.php";
include_once "layout/shop.php";
global $score , $sum , $user ;



//    *///////////////////////////comment//////////////////////////////////*/


$error = null;
$vefery = null;
$req = $_POST['request'] ?? "";
if($req == "comment"){
    $fullname = $_POST['fullname'] ?? "";
    $email = $_POST['email'] ?? "";
    $comment = $_POST['comment'] ?? "";

    if(! empty($fullname) && ! empty($email) && ! empty($comment)){
        if(filter_var($email , FILTER_VALIDATE_EMAIL)){
            $statment = $pdo->prepare("INSERT INTO comments (fullname , email ,comment) VALUES (:fullname , :email , :comment)");
            $statment->bindParam(":fullname" , $fullname);
            $statment->bindParam(":email" , $email);
            $statment->bindParam(":comment" , $comment);

            if($statment->execute()){
                if($statment->rowCount() == 1){
                    $vefery = "نظر شما با موفقیت ثبت شد.";
                }else{
                    die($statment->errorInfo());
                }
            }
        }else{
            $error = "فرمت ایمیل درست نیست.";
        }
    }else{
        $error = "لطفا همه فیلدهارا پر کنید.";
    }
}

//    *////////////////////////////gallery_index/////////////////////////////////*/

$stmt = $pdo->prepare("SELECT * FROM gallery_index");
if($stmt->execute()){
    if($stmt->rowCount() >= 1){
        $value = $stmt->fetchAll(PDO::FETCH_OBJ);



    }
}




//    *////////////////////////////offer_customer/////////////////////////////////*/


$result = $pdo->prepare("SELECT * FROM menu LIMIT 10");
if($result->execute()){
    if($result->rowCount() >= 1){
        $results = $result->fetchAll(PDO::FETCH_OBJ);
    }
}



//    *///////////////////////////product//////////////////////////////////*/

$products = $pdo->prepare("SELECT * FROM product");
if($products->execute()){
    if($products->rowCount() >= 1){
        $product = $products->fetchAll(PDO::FETCH_OBJ);
    }
}




?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <link rel="stylesheet" href="./style/style.css">
    <link rel="stylesheet" href="./fonts/fontawesome-all.css">
    <title>صفحه اصلی</title>
</head>

<body>
    <div class="banner">
        <?php  include_once "main/topbar.php"; ?>
        <div class="welcome">
            ماندگارترین و لذیذترین طعم ها را با ما تجربه کنید
        </div>
        <div class="border">
            <img src="./pictures/home_bistro_slider_sep.png" alt="">
        </div>
    </div>
    <div class="wraper">
        <div class="container">
            <div class="wrap">
                <div class="description">
                    به مرکز غول پیکر ترین ساندویچ های بزرگ و ترکیبی از مواد خوشمزه و لذیذ خوش آمدید
                </div>
                <div class="line">
                    <img src="./pictures/line.png" alt="">
                </div>
                <div class="items">
                    <?php foreach ($product as $item): ?>
                    <div class="item" style="margin-top: 20px">
                        <img src="./pictures/<?= $item->image ?>" alt="">
                        <div class="food">
                            <div class="head"><?= $item->title ?></div>
                            <div class="line"><img src="./pictures/line2.png" alt=""></div>
                            <div class="about-food"><?= $item->description ?></div>
                            <div class="more"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
                <div class="show-menu">
                    <a href="./layout/menu.php">مشاهده منو</a>
                </div>
            </div>
        </div>
    </div>
    <div class="menu">
        <div class="container">
            <div class="category">
                <div class="description">
                    گالری
                </div>
                <div class="line"><img src="./pictures/line2.png" alt=""></div>
                <div class="items">
                    <?php foreach ($value as $item): ?>
                    <?php if($item->mini == 0){ ?>
                    <div class="item" id="item">
                        <img src="./pictures/" alt="">
                        <img src="pictures/<?= $item->image ?>" alt="">
                        <div class="slide"></div>
                    </div>
                    <?php } ?>
                    <?php endforeach; ?>
                    <div class="min-foods">
                        <?php foreach ($value as $item): ?>
                        <?php if($item->mini == 1){ ?>
                        <div class="item">
                            <img src="./pictures/<?= $item->image ?>" alt="">
                        </div>
                        <?php } ?>
                        <?php endforeach; ?>
                    </div>

                </div>
                <div class="show-menu" style="margin: -5px 0 40px 0;">
                    <a href="./layout/gallery.php">مشاهده گالری</a>
                </div>
            </div>
        </div>
    </div>
    <div class="offer">
        <div class="special-offer" style="background-image: url(./pictures/1-1.png);">
            <div class="text-offer">
                <span style="color: #0f834d;font-size: 125px;text-shadow: 2px 2px 8px #000000;">15%</span>
                <span style="color: red;font-size: 100px;text-shadow: 2px 2px 8px #ad6f6f;">تخفیف</span>
                <br>
                <span style="text-shadow: 2px 2px 8px #ad6f6f;">ویژه خوش سلیقه ها </span>
            </div>
        </div>
    </div>

    <div class="foods">
        <div class="contain">
            <div class="wrap">
                <div class="description">غذاهایی که حتما باید امتحان کنید.</div>
                <div class="advise">توصیه مشتریان<img src="./pictures/line2.png" alt=""></div>
                <div class="menu-food">
                    <?php foreach ($results as $item): ?>
                    <div class="food">
                        <div class="pic"><img src="./pictures/<?= $item->image ?>" alt=""></div>
                        <div class="food-description">
                            <div class="price">
                                <?= $item->product_name ?><span
                                    style="color: #b6b6b6">...........................................</span>
                                <span style="color: #fe3635;font-size: 18px"><?= $item->product_price ?> تومان</span>
                            </div>
                            <div class="former">
                                <?= $item->product_description ?>
                            </div>
                            <div class="addtoshop" onclick="AddToCart(<?= $item->id ?>)">
                                <span>اضافه کردن به سبد خرید</span>

                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
    <div class="about-us">
        <div class="container">
            <div class="history">
                <div class="comment">
                    نظرات شما
                </div>
                <div class="wrap-about-us">
                    <div class="about">
                        <div class="wrap">تاریخچه ما</div>
                        <div class="des">
                            واقعیت این است داشتن تنها یک وب سایت کمک به کسب و کار شما نمی کند ، ما با تیم خود به بررسی
                            راه حل های جدید و منطقی پرداخته و در تلاشیم تا کسب و کار شما را رونق بخشیم . مطمئن باشید از
                            کفتکو با ما پشیمان نخواهید شد .واقعیت این است داشتن تنها یک وب سایت کمک به کسب و کار شما نمی
                            کند ، ما با تیم خود به بررسی راه حل های جدید و منطقی پرداخته و در تلاشیم تا کسب و کار شما را
                            رونق بخشیم . مطمئن باشید از کفتکو با ما پشیمان نخواهید شد .
                            <br>
                            <br>
                            واقعیت این است داشتن تنها یک وب سایت کمک به کسب و کار شما نمی کند ، ما با تیم خود به بررسی
                            راه حل های جدید و منطقی پرداخته و در تلاشیم تا کسب و کار شما را رونق بخشیم . مطمئن باشید از
                            کفتکو با ما پشیمان نخواهید شد .واقعیت این است داشتن تنها یک وب سایت کمک به کسب و کار شما نمی
                            کند ، ما با تیم خود به بررسی راه حل های جدید و منطقی پرداخته و در تلاشیم تا کسب و کار شما را
                            رونق بخشیم . مطمئن باشید از کفتکو با ما پشیمان نخواهید شد .
                        </div>
                    </div>
                    <div class="commends">
                        <form action="" method="post">
                            <table>
                                <tr>
                                    <td class="name">نام و نام خانوادگی:</td>
                                </tr>
                                <tr style="width: 100%">
                                    <td style="width: 100%"><input type="text" name="fullname"></td>
                                </tr>
                                <tr>
                                    <td class="name">آدرس ایمیل:</td>
                                </tr>
                                <tr style="width: 100%">
                                    <td style="width: 100%"><input type="email" name="email"></td>
                                </tr>
                                <tr>
                                    <td class="name">پیام شما:</td>
                                </tr>
                                <tr style="width: 100%">
                                    <td style="width: 100%"><textarea class="" name="comment" id="" cols="10"
                                            rows="10"></textarea></td>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" name="request" value="comment">ارسال پیام</button>
                                    </td>
                                </tr>
                                <tr style="display: flex;justify-content: center;align-items: center">
                                    <td style="display: flex;justify-content: center;align-items: center;width: 100%">
                                        <?php if(! is_null($error)) : ?>
                                        <div class="alert-danger" style="margin-top: 20px;width: 70%;">
                                            <?=
                                            $error;
                                            ?>
                                        </div>
                                        <?php endif; ?>

                                        <?php if(! is_null($vefery)) : ?>
                                        <div class="alert-success" style="margin-top: 20px;width: 70%;">
                                            <?=
                                            $vefery;
                                            ?>

                                        </div>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="addres-us">
        <div class="addres-info">
            <div class="chapter">
                <div><img src="./pictures/foter1.png" alt=""></div>
                <div class="tell-us">ارتباط با ما</div>
                <div style="color: #626262;">۰۵۱-۳۸۵۵۴۴۶۰</div>
            </div>
            <div class="chapter">
                <div><img src="./pictures/foter2.png" alt=""></div>
                <div class="tell-us">آدرس</div>
                <div style="color: #626262;">اصفهان،خیابان جانبازان </div>
            </div>
            <div class="chapter">
                <div><img src="./pictures/foter3.png" alt=""></div>
                <div class="tell-us">ایمیل</div>
                <div style="color: #626262;">۰۵۱-۳۸۵۵۴۴۶۰</div>
            </div>
        </div>

    </div>
    <?php
        include_once ("./main/foter.php");
    ?>

