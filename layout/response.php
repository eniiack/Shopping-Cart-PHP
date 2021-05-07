<?php
    try{
        $pdo = new PDO("mysql:host=localhost;dbname=fastfood" , "root" , "");
         $pdo->exec("set names utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_WARNING);
    }catch (PDOException $errors){
        die($errors->getMessage());
    }
    global $score , $sum , $user ;
if(isset($_GET['product'])){
        $id = $_GET['product'] ?? "";
        if(isset($_SESSION['products'][$id])){
            $_SESSION['products'][$id] = $_SESSION['products'][$id] + 1;
        }else{
            $_SESSION['products'][$id] = 1;
        }
    }
  echo '<div class="cart" id="cart">';
  if(isset($_SESSION['products']) && $_SESSION['products'] != 0) { 
   foreach ($_SESSION['products'] as $items => $key):
  
  $carts = $pdo->prepare("SELECT * FROM menu WHERE id = :items");
  $carts->bindParam(":items" , $items);
  if($carts->execute()){
      if($carts->rowCount() == 1){
          $cart = $carts->fetch(PDO::FETCH_OBJ);
      }
  }
  
  echo '<div class="item" id="item">';
  echo '<div class="picture">';
  echo '<img src="./pictures/<?= $cart->image ?>" alt="">';
  echo ' </div>';
  echo '  <div class="item-description">';
  echo ' <div class="subject">'.$cart->product_name.' </div>';
  echo ' <div class="price">قیمت: '.$cart->product_price.'</div>';
  echo '  <div class="price" style="color: #768ba0;display: flex;width: 200px;justify-content: space-between;align-items: center;">';
  echo '  <div style="margin-right: 65px">تعداد: '. $key .' عدد</div>';
  echo '  <div style="color: white;cursor: pointer">';
  echo '  <a style="padding: 2px;color: #ff3f3f!important;font-size: 15px;font-weight: 700" onclick="deletecart('.$cart->id .')">حذف</a></div>';
  echo '  </div>';
  echo ' </div>';

  echo ' </div>';
      $score = ($score + $cart->product_price) *  $key;
  $sum += $key;

 endforeach; 
  if($sum != 0){ 
      echo '<hr style="border: 1px solid #aeaeae">';
      echo '<div style="display: flex;width: 100%;">';
      echo ' <div style="margin-right: 5px;color: #707070">مجموع:</div>';
      echo '  <div id="totalscore"style="margin-right: 5px;text-align: center;width: 100%;color: #707070"> <span>';
               $a = $score ;
               '.$score.';
                echo '</span>تومان</div>';
               echo '  </div>';
               echo ' <div class="payment">';


       if(isset($_SESSION['admin'])){ 
          echo ' <a href="layout/payment.php"><button type="submit">پرداخت</button></a>';
       }else{ 
          echo '<a href="layout/login.php"><button type="submit">پرداخت</button></a>';
      } 
      echo ' </div>';
  }else{ 
      echo ' <div class="empty">سبد خرید شما خالی است.</div>';
  } 

  } 
  echo '</div>';