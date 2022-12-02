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

    if ($id == "0") {
        $query="SELECT * FROM categories WHERE `id` = $id AND `password` = '$password'";
        $result = $conn->query($query);
        $user=$result->fetch_assoc();
        if(empty($user) or count($user) == 0) {
            echo "Введён неверный пароль.";
            exit();
        } 
        setcookie('id', 1, time() + 3600 * 24 * 30, "/");
        setcookie('Admin_ID', md5('Администратор'."gsadfbxcvbxcvdsf"), time() + 3600 * 24 * 30, "/");
    }
    else {
        $query="SELECT * FROM categories WHERE 
            `id` = $id 
        AND 
            `password` = '$password'";
        $result = $conn->query($query);
        $user=$result->fetch_assoc();
        if(empty($user) or count($user) == 0) {
            echo "Введён неверный пароль.";
            exit();
        } 

        setcookie('id', $user['id'], time() + 3600 * 24 * 30, "/");
    }
    header('Location: /site');
    $conn ->close();
?>