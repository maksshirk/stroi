<?php
    include "ChromePhp.php";
    include "config.php";
    
    $id = $_POST['login'];
    $password = $_POST['password'];
    $password = md5($password."gsadfbxcvbxcvdsf"); 
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    
    $query="UPDATE categories SET `password` = '$password' WHERE `id` = $id"; 
    $result = $conn->query($query);
    
    header('Location: /');
    $conn ->close();
?>