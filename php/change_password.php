<?php
    include "ChromePhp.php";
    define('DB_HOST', 'localhost');
    define('DB_USER', 'c19stroi');
    define('DB_PASSWORD', 'F9-Siro@');
    define('DB_NAME', 'c19stroi');
    
    $id = $_POST['login'];
    $password = $_POST['password'];
    $password = md5($password."gsadfbxcvbxcvdsf"); 
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    
    $query="UPDATE categories SET `password` = '$password' WHERE `id` = $id"; 
    $result = $conn->query($query);
    
    header('Location: /');
    $conn ->close();
?>