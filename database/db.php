<?php

    try{
        $pdo = new PDO("mysql:host=localhost;dbname=fastfood" , "root" , "");
         $pdo->exec("set names utf8");
        $pdo->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_WARNING);
    }catch (PDOException $errors){
        die($errors->getMessage());
    }


?>