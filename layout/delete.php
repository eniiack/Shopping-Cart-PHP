<?php 
 require_once "../index.php";
 if(isset($_GET['delete'])){
        $id = $_GET['delete'] ?? "";
        if($_SESSION['products'][$id] > 1){
            $_SESSION['products'][$id] = $_SESSION['products'][$id] - 1;
            
        }else{
     unset($_SESSION['products'][$_GET['delete']]);
            
        }

}






?>