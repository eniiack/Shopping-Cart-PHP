<?php 
global $score , $sum , $user ;
    
  $errorsignup = null;
    $veferysignup = null;
include_once "../database/db.php";
session_start();
$username = $_SESSION['admin'] ?? "";

 $result = $pdo->prepare("SELECT * FROM admin WHERE username = :username");
    $result->bindParam(":username" , $username);
    if($result->execute()){
                if($result->rowCount() == 1){
                   $value = $result->fetch(PDO::FETCH_OBJ);
                }else{
                    die($result->errorInfo());
                }
            }


$re = 1;    

  $req = $_POST['request'] ?? "";
if($req == "insert"){
       $name = $_POST['name'] ?? "";
       $mobile = $_POST['mobile'] ?? "";
       $address = $_POST['address'] ?? "";


       $total = $_POST['total'] ?? "";

       $name1 = $_POST['name1'] ?? "";
       $name2 = $_POST['name2'] ?? "";
       $name3 = $_POST['name3'] ?? "";
       $name4 = $_POST['name4'] ?? "";
       $name5 = $_POST['name5'] ?? "";
       $name6 = $_POST['name6'] ?? "";
       if( ! empty($address) ){
            
                   
                     $stm = $pdo->prepare("INSERT INTO basket (name , mobile , address ,cart ,total ) VALUES (:name ,:mobile, :address ,:name1 :name2  :name3  :name4  :name5,:total )");
                       
                        $stm->bindParam(":address" , $address);
                        $stm->bindParam(":mobile" , $mobile);
                        $stm->bindParam(":name" , $name);
                        $stm->bindParam(":name1" , $name1);
                        $stm->bindParam(":name2" , $name2);
                        $stm->bindParam(":name3" , $name3);
                        $stm->bindParam(":name4" , $name4);
                        $stm->bindParam(":name5" , $name5);
                        $stm->bindParam(":total" , $total);

                        if($stm->execute()){
                            if($stm->rowCount() >= 1){
                                $veferysignup = "خرید شما ثبت گردید";
                                 $_SESSION['products'] = null;
                            }
                        }
               
            
       }else{
           $errorsignup = "لطفا همه فیلدهارا پرکنید.";
       }
   }







?>
<style>
    nav { display: none;}
    .cart{
    	background-color: white;
    	padding: 20px;
    	margin-top: 50px;
    	text-align: center;
    }
</style>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../style/style.css">
</head>
<body>
	
	<div class="payment">

		<div class="container">
			<div style="display: flex">
			<div class="userinformation">

				<div class="information">
			<form action="" method="post">

					<div class="wrap-information">
						<div>
						
							<div style="display: flex;margin: 50px 0">
								<div class="name-user">
									 اطلاعات کاربری
								</div>
								<div class="information-user">
									<div class="wrap-username">
									<span>		نام و نام خانوادگی:   </span>
									<span>		شماره تماس   :  </span>
									</div>

									<div class="wrap-data">
										<span> <?=  $value->name . $value->family ?></span>
                               			 <input type="hidden" name="name" value="<?=  $value->name . $value->family ?>">

									<span>  <?= $value->mobile ?> </span>
                               			 <input type="hidden" name="mobile" value="<?= $value->mobile ?>">
									</div>
								</div>
							</div>






							<div style="display: flex;margin: 50px 0">
								<div class="name-user">
									آدرس:
								</div>
								<div class="information-user">
									<div class="wrap-username">
										<input type="text" name="address" id="addres" placeholder="آدرس">
									</div>

									
								</div>
							</div>


							  <div class="sub-panel">
                           <button type="submit" name="request" value="insert">پرداخت</button>
                       </div>
                   <?php if(! is_null($errorsignup)) : ?>
                       <div class="alert-danger" style="margin-top: 20px;width: 70%;margin: 30px auto" >
                           <?=
                           $errorsignup;
                           ?>
                       </div>
                   <?php endif; ?>

                   <?php if(! is_null($veferysignup)) : ?>
                       <div class="alert-success" style="margin-top: 20px;width: 70%;margin: 30px auto">
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
                            
                            <div class="item-description">
                                <div class="subject"><?= $cart->product_name ?></div>
                                <input type="hidden" name="name<?= $re++ ?>" value="<?=         $cart->product_name  . $key ?>">
                                <div class="price">قیمت: <?= $cart->product_price ?></div>
                                <div class="price" style="color: #768ba0;display: flex;width: 200px;justify-content: space-between;align-items: center;"><div style="margin-right: 65px">تعداد: <?= $key ?> عدد</div></div>
                                <hr>
                            </div>

                        </div>
                        <?php $score = ($score + $cart->product_price) *  $key;
                        $sum += $key;

                        ?>
                              

                    <?php endforeach; ?>
                       <div style="display: flex;width: 100%;">
                           <div style="margin-right: 5px;color: #707070">مجموع:</div>
                           <div style="margin-right: 5px;text-align: center;width: 100%;color: #707070"><?= $score  ?>تومان</div>
                        <input type="hidden" name="total" value="<?= $score  ?>">
                                
</form>

                       </div>
                     

                
            </div>

                  
                    <?php } ?>

			</div>
			  
		</div>
	</div>


</body>
</html>