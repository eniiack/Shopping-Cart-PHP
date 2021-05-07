    <?php
    $title = "تماس با ما";
    $header = "تماس با ما";
    include_once ("../main/header.php");





    //    */////////////////////////////////////////////////////////////*/

    include_once ("../database/db.php");
    $req = $_POST['request'] ?? "";
    $error = null;
    $vefery = null;
    if($req == "send"){
        $name = $_POST['name'] ?? "";
        $email = $_POST['email'] ?? "";
        $subject = $_POST['subject'] ?? "";
        $comment = $_POST['comment'] ?? "";

        if(! empty($name) && ! empty($email) && ! empty($subject) && ! empty($comment) ){
           if(filter_var($email , FILTER_VALIDATE_EMAIL)){
               $statment = $pdo->prepare("INSERT INTO contact (name , email , subject , comment) VALUES (:name , :email , :subject , :comment)");
               $statment->bindParam(":name" , $name);
               $statment->bindParam(":email" , $email);
               $statment->bindParam(":subject" , $subject);
               $statment->bindParam(":comment" , $comment);

               if($statment->execute()){
                   if ($statment->rowCount() == 1){
                       $vefery = "نظر شما با موفقیت ثبت شد.";
                   }
               }
           }else{
               $error = "فرمت ایمیل صحیح نیست.";
           }
        }else{
            $error = "لطفا همه فیلدهارا پر کنید.";
        }
    }


    ?>
    <div class="callus">
        <div class="container">
            <div class="call-wrap">
                <div class="adres">
                    <div class="head">رستوران ایتالیایی سی فایو</div>
                    <div class="main">آدرس: اصفهان-خیابان جانبازان</div>
                </div>
                <div class="adres">
                    <div class="head">تلفن</div>
                    <div class="main">6632487</div>
                </div>
                <div class="adres">
                    <div class="head">ایمیل</div>
                    <div class="main">fastfod@info.com</div>
                </div>
            </div>
            <div class="line"><img src="../pictures/line.png" alt=""></div>
            <div class="contact-us">
                <div class="picture"><img src="../pictures/home_bistro_contact_image.jpg" alt=""></div>
                <div class="tell-us">
                    <h3>تماس با ما</h3>
                    <form action="" method="post">
                        <table>
                            <div class="wrapper-contact">
                                <tr>
                                    <td class="label">نام</td>
                                </tr>
                                <tr>
                                    <td><input class="const" type="text" name="name"></td>
                                </tr>
                            </div>
                            <tr>
                                <td class="label">ایمیل</td>
                            </tr>
                            <tr>
                                <td><input class="const" type="text" name="email"></td>
                            </tr>
                            <tr>
                                <td class="label">موضوع</td>
                            </tr>
                            <tr>
                                <td><input class="const" type="text" name="subject"></td>
                            </tr>
                            <tr>
                                <td class="label">متن پیام</td>
                            </tr>
                            <tr>
                                <td><textarea class="const" name="comment" id="" cols="30" rows="10"></textarea></td>
                            </tr>
                            <tr>
                                <td><button class="send" name="request" value="send">ارسال</button></td>
                            </tr>
                            <tr>
                                <td>
                                    <?php if(! is_null($error)) : ?>
                                        <div class="alert-danger" >
                                            <?=
                                            $error;
                                            ?>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(! is_null($vefery)) : ?>
                                        <div class="alert-success" >
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
    <?php
    include_once ("../main/foter.php");
    ?>