    <?php
    $title = "منوی غذا";
    $header = "منوی غذا";
    include_once ("../main/header.php");





    //    */////////////////////////////////////////////////////////////*/
    include_once ("../database/db.php");
    $statment = $pdo->prepare("SELECT * FROM menu ");
    if($statment->execute()){
        if($statment->rowCount() >= 1){
            $items = $statment->fetchAll(PDO::FETCH_OBJ);
            $menu_items = $statment->fetchAll(PDO::FETCH_ASSOC);
        }
    }







    ?>
    <div class="food-menu">
        <div class="container">

           <div class="wrap-menu">
               <div class="title">انواع پیتزا</div>
               <div class="line">
                   <img src="../pictures/line.png" alt="">
               </div>
               <div class="food-dec">انواع پیتزا برای ذائقه های متنوع و نیز مناسب برای گیاه خواران</div>
               <div class="wrapper-menu">
                   <div class="picture">
                       <img src="../pictures/home_bistro_boxbg1-1.jpg" alt="">
                   </div>
                   <table>
                    <?php foreach ($items as $value): ?>
                       <?php if($value->product_title == 'pizza'){ ?>
                      <tr>
                          <td class="dec-foods">
                              <div class="name"><?= $value->product_name ?></div>
                              <div class="dec1"><?= $value->product_description ?></div>
                               <div class="addtoshop" onclick ="AddToCart(<?= $value->id ?>)">
                                           <span>اضافه کردن به سبد خرید</span>
                                         </div>
                          </td>
                          <td class="price-foods">
                             <span><img src="../pictures/<?= $value->image ?>" alt=""></span>
                              <span><?= $value->product_price ?></span>
                          </td>
                      </tr>
                    <?php } ?>
                    <?php endforeach; ?>
                   </table>
               </div>
           </div>
            <div class="wrap-menu">
                <div class="title">انواع ساندویچ ها</div>
                <div class="line">
                    <img src="../pictures/line.png" alt="">
                </div>
                <div class="food-dec">انواع پیتزا و ساندویچ برای ذائقه های متنوع و نیز مناسب برای گیاه خواران</div>
                <div class="wrapper-menu">
                    <div class="picture">
                        <img src="../pictures/_______.jpg" alt="">
                    </div>
                    <table>

                        <?php foreach ($items as $value): ?>
                            <?php if($value->product_title == 'sandwich'){ ?>

                                <tr>
                                    <td class="dec-foods">
                                        <div class="name"><?= $value->product_name ?></div>
                                        <div class="dec1"><?= $value->product_description ?></div>
                                         <div class="addtoshop" onclick ="AddToCart(<?= $value->id ?>)">
                                           <span>اضافه کردن به سبد خرید</span>
                                         </div>
                                    </td>
                                    <td class="price-foods">
                                      <span><img src="../pictures/<?= $value->image ?>" alt=""></span>
                                        <span><?= $value->product_price ?></span>
                                    </td>
                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
            <div class="wrap-menu">
                <div class="title">انواع پاستا و لازانیا</div>
                <div class="line">
                    <img src="../pictures/line.png" alt="">
                </div>
                <div class="food-dec">شما در سی فایو میتوانید لذیذترین پاستا ها و لازانیا را امتحان کنید تا مشتری همیشگی ما شوید.</div>
                <div class="wrapper-menu">
                    <div class="picture">
                        <img src="../pictures/home_bistro_boxbg2 (1).jpg" alt="">
                    </div>
                    <table>

                        <?php foreach ($items as $value): ?>
                            <?php if($value->product_title == 'pasta'){ ?>

                                <tr>
                                    <td class="dec-foods">
                                        <div class="name"><?= $value->product_name ?></div>
                                        <div class="dec1"><?= $value->product_description ?></div>
                                         <div class="addtoshop" onclick ="AddToCart(<?= $value->id ?>)">
                                           <span>اضافه کردن به سبد خرید</span>
                                         </div>
                                    </td>
                                    <td class="price-foods">
                                      <span><img src="../pictures/<?= $value->image ?>" alt=""></span>
                                        <span><?= $value->product_price ?></span>
                                    </td>

                                </tr>
                            <?php } ?>
                        <?php endforeach; ?>

                    </table>
                </div>
            </div>
        </div>
    </div>
    <footer>
    <div class="foter">
        <div class="picture">
            <img src="../pictures/home_bistro_footer_pic.png" alt="">
        </div>
        <div class="slogan">
            گروه رستوران های زنجیره ای سی فایو با کادری بی نظیر در خدمت شماست. میزبان خاطرات خوب و خوش طعم شما هستیم.
        </div>
        <div class="socials">
            <div class="social">
                <a href=""><i class="fab fa-facebook-f"></i></a>
            </div>
            <div class="social">
                <a href=""><i class="fab fa-google-plus-g"></i></a>
            </div>
            <div class="social">
                <a href=""><i class="fab fa-twitter"></i></a>
            </div>
            <div class="social">
                <a href=""><i class="fab fa-pinterest-p"></i></a>
            </div>
            <div class="social">
                <a href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
        </div>
    </div>
</footer>
</body>

</html>
<script src="js/jquery-3.4.1.min.js"></script>
<script src="js/jquery.js"></script>
<script>
    window.onscroll = function () {
        myFunction()
    };

    var header = document.getElementById("myHeader");
    var sticky = header.offsetTop;

    function myFunction() {
        if (window.pageYOffset > sticky) {
            header.classList.add("sticky");
        } else {
            header.classList.remove("sticky");
        }
    }


    function AddToCart(id) {

        var request = new XMLHttpRequest();
        request.open('GET', "./shop.php?product=" + id, true);
        request.onreadystatechange = function () {
            if ((request.readyState === 4) && (request.status === 200)) {
                $('.shopcart').load(document.URL + ' #cart');
            }
        }
        request.send();
    }

    function deletecart(id) {
        var request = new XMLHttpRequest();
        request.open("GET", "./delete.php?delete=" + id, true);
        request.onreadystatechange = function () {
            if ((request.readyState === 4) && (request.status === 200)) {
                $('.shopcart').load(document.URL + ' #cart');
            }
        }
        request.send();
    }
</script>