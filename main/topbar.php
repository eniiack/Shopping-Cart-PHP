<div class="container" id="myHeader">
    <nav>
        <ul>
            <li>
                <a href="./index.php">صفحه اصلی</a>
            </li>
            <li>
                <a href="./layout/menu.php">منوی غذا</a>
            </li>
            <li>
                <a href="./layout/gallery.php">گالری</a>
            </li>
            <li><img src="./pictures/logo.png" alt=""></li>
            <li>
                <a href="./layout/callus.php">تماس با ما</a>
            </li>

            <li>
                سبد خرید
                <div class="shopcart">
                    <div class="cart" id="cart">
                        <?php if(isset($_SESSION['products']) && $_SESSION['products'] != 0) { ?>
                        <?php foreach ($_SESSION['products'] as $items => $key):
                        
                        $carts = $pdo->prepare("SELECT * FROM menu WHERE id = :items");
                        $carts->bindParam(":items" , $items);
                        if($carts->execute()){
                            if($carts->rowCount() == 1){
                                $cart = $carts->fetch(PDO::FETCH_OBJ);
                            }
                        }
                        ?>
                        <div class="item" id="item">
                            <div class="picture">
                                <img src="./pictures/<?= $cart->image ?>" alt="">
                            </div>
                            <div class="item-description">
                                <div class="subject"><?= $cart->product_name ?></div>
                                <div class="price">قیمت: <?= $cart->product_price ?></div>
                                <div class="price"
                                    style="color: #768ba0;display: flex;width: 200px;justify-content: space-between;align-items: center;">
                                    <div style="margin-right: 65px">تعداد: <?= $key ?> عدد</div>
                                    <div style="color: white;cursor: pointer">
                                        <a style="padding: 2px;color: #ff3f3f!important;font-size: 15px;font-weight: 700"
                                            onclick="deletecart(<?= $cart->id ?>)">حذف</a></div>
                                </div>
                            </div>

                        </div>
                        <?php $score = ($score + $cart->product_price) *  $key;
                        $sum += $key;

                        ?>
                        <?php endforeach; ?>
                        <?php if($sum != 0){ ?>
                        <hr style="border: 1px solid #aeaeae">
                        <div style="display: flex;width: 100%;">
                            <div style="margin-right: 5px;color: #707070">مجموع:</div>
                            <div id="totalscore"
                                style="margin-right: 5px;text-align: center;width: 100%;color: #707070"> <span>
                                    <?php $a = $score  ?> <?= $score  ?> </span>تومان</div>
                        </div>
                        <div class="payment">


                            <?php if(isset($_SESSION['admin'])){ ?>
                            <a href="layout/payment.php"><button type="submit">پرداخت</button></a>
                            <?php }else{ ?>
                            <a href="layout/login.php"><button type="submit">پرداخت</button></a>
                            <?php } ?>
                        </div>
                        <?php }else{ ?>
                        <div class="empty">سبد خرید شما خالی است.</div>
                        <?php } ?>


                    </div>
                </div>
            </li>
            <?php } ?>

            <?php if(isset($_SESSION['admin'])){?>
            <li>خوش آمدی <?php echo $_SESSION['admin']?></li>
            <?php     }else{ ?>
            <li>
                <a href="./layout/login.php">ورود / ثبت نام</a>
            </li>
            <?php } ?>

        </ul>
    </nav>
</div>