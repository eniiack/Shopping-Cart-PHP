<?php
  

include_once "../main/header.php";




//    */////////////////////////////////////////////////////////////*/




    include_once ("../database/db.php");
    $error = null;
    $vefery = null;

      $errorsignup = null;
    $veferysignup = null;
   $req = $_POST['request'] ?? "";
   if($req == "login"){
       $name = $_POST['name'] ?? "";
       $pass = $_POST['pass'] ?? "";

       if(! empty($name) && ! empty($pass)){
            $statment = $pdo->prepare("SELECT * FROM admin WHERE username = :name ");
           $statment->bindParam(":name" , $name);
            if($statment->execute()){
                if($statment->rowCount() == 1){
                    $admin = $statment->fetch(PDO::FETCH_OBJ);
                    $password = hash_hmac("sha256" , $pass , "secret");
                    if($admin->password == $password){
                     
                        $_SESSION['admin'] = $name;
                        $vefery = "با موفقیت وارد شدید.";


                    }else{
                        $error = "پسورد صحیح نمی باشد.";
                    }
                }else{
                    $error = "این نام کاربری در سیستم ثبت نشده است.";
                }
            }
       }else{
           $error = "لطفا همه فیلدهارا پرکنید.";
       }
   }



    if($req == "insert"){
       $name = $_POST['name'] ?? "";
       $family = $_POST['family'] ?? "";
       $username = $_POST['username'] ?? "";
       $mobile = $_POST['mobile'] ?? "";
       $pass = $_POST['pass'] ?? "";
       if(! empty($name) && ! empty($family) && ! empty($mobile) && ! empty($pass)){
            $statment = $pdo->prepare("SELECT * FROM admin WHERE username = :username  ");
           $statment->bindParam(":username" , $username);
            if($statment->execute()){
                if($statment->rowCount() == 0){

                     $resultmob = $pdo->prepare("SELECT * FROM admin WHERE mobile = :mobile  ");
                      $resultmob->bindParam(":mobile" , $mobile);
                        if($resultmob->execute()){
                        if($resultmob->rowCount() == 0){
                   
                            $pass = hash_hmac("sha256" , $pass , "secret");
                             $stm = $pdo->prepare("INSERT INTO admin (name , family , username , mobile ,password ) VALUES (:name ,:family, :username ,:mobile ,:pass )");
                               
                                $stm->bindParam(":pass" , $pass);
                                $stm->bindParam(":family" , $family);
                                $stm->bindParam(":mobile" , $mobile);
                                $stm->bindParam(":name" , $name);
                                $stm->bindParam(":username" , $username);

                                if($stm->execute()){
                                    if($stm->rowCount() == 1){
                                       $_SESSION['admin'] = $username;
                                        $veferysignup = " با موفقیت ثبت نام شدید.  ";
                                    }
                                }
                         }else{
                    $errorsignup = " این شماره موبایل در سیستم ثبت شده است.  ";
                }
            }
                }else{
                    $errorsignup = " نام کاربری در سیسم ثبت شده است.    ";
                }
            }
       }else{
           $errorsignup = "لطفا همه فیلدهارا پرکنید.";
       }
   }





?>
<style>
    header { background-image: url("../pictures/comment.jpg");background-position: center!important};
</style>


   <div class="panel">
       <div class="container">
           <div class="login-panel">
               <div class="login">
                   <div class="head-panel">
                       ورود
                   </div>
                   <form action="" method="post">
                       <div class="user-panel">
                           <input type="text" placeholder="نام کاربری" name="name" autocomplete="off">
                           <input type="text" placeholder="پسورد" name="pass" autocomplete="off">
                       </div>
                       <div class="sub-panel">
                           <button type="submit" name="request" value="login">ورود</button>
                       </div>
                   </form>
                   <?php if(! is_null($error)) : ?>
                       <div class="alert-danger" style="margin-top: 20px;width: 70%;" >
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
                           <div>
                               <a href="../index.php" style="color: #e0bbfb;text-decoration: underline;">صفحه اصلی</a>
                           </div>
                       </div>
                   <?php endif; ?>
               </div>
               <div class="login panle-picture">
                 

                    
 <div class="head-panel">
  ثبت نام
                   </div>
                   <form action="" method="post">
                       <div class="user-panel">
                           <input type="text" placeholder="نام" name="name" autocomplete="off">
                           <input type="text" placeholder="نام خانوادگی" name="family" autocomplete="off">
                       </div>
                        <div class="user-panel">
                           <input type="text" placeholder="نام کاربری" name="username" autocomplete="off">
                       </div>
                        <div class="user-panel">
                           <input type="text" placeholder="موبایل" name="mobile" autocomplete="off">
                           <input type="text" placeholder="پسورد" name="pass" autocomplete="off">
                       </div>
                       <div class="sub-panel">
                           <button type="submit" name="request" value="insert">ثبت نام</button>
                       </div>
                   </form>
                   <?php if(! is_null($errorsignup)) : ?>
                       <div class="alert-danger" style="margin-top: 20px;width: 70%;" >
                           <?=
                           $errorsignup;
                           ?>
                       </div>
                   <?php endif; ?>

                   <?php if(! is_null($veferysignup)) : ?>
                       <div class="alert-success" style="margin-top: 20px;width: 70%;">
                           <?=
                           $veferysignup;
                           ?>
                           <div>
                               <a href="../index.php" style="color: #e0bbfb;text-decoration: underline;">صفحه اصلی</a>
                           </div>
                       </div>
                   <?php endif; ?>



               </div>
           </div>
       </div>
   </div>


<?php
include_once ("../main/foter.php");
?>