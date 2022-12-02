<?php
    include "ChromePhp.php";
    define('DB_HOST', 'localhost');
    define('DB_USER', 'root');
    define('DB_PASSWORD', 'root');
    define('DB_NAME', 'webdevkin');
    
    $id = $_POST['login'];
    $password = $_POST['password'];
    $password = md5($password."gsadfbxcvbxcvdsf"); 
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    
    $query="UPDATE categories SET `password` = '$password' WHERE `id` = $id"; 
    $result = $conn->query($query);
    
    header('Location: /site');
    $conn ->close();
?>