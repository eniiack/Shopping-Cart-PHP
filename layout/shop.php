<?php 

//  require_once "../index.php";
session_start();
if(isset($_GET['product'])){
        $id = $_GET['product'] ?? "";
        if(isset($_SESSION['products'][$id])){
            $_SESSION['products'][$id] = $_SESSION['products'][$id] + 1;
        }else{
            $_SESSION['products'][$id] = 1;
        }
    }
    ?>
   