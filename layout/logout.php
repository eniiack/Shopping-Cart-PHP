<?php

session_start();
session_destroy();

if(isset($_COOKIE["admin"])){
    session_destroy();
    unset($_COOKIE);
    setcookie('my_cookie', '', 1);
}

header("Location:../index.php");
