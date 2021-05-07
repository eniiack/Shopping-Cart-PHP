<?php


$token = $_SESSION["admin"] ?? $_COOKIE["admin"] ?? "";

if($token != ""){
    $statment = $pdo->prepare("SELECT * FROM admin WHERE username = :token");
    $statment->bindParam(":token" , $token);
    $statment->execute();
}