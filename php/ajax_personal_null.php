<?php
include "ChromePhp.php";
include "config.php";

if (isset($_POST['name'])) {
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$link) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }

    $column = $_POST['name'];
    $newValue = $_POST['value'];    
    $i = $_POST['pk']['i'];
    $id = $_POST['pk']['id'];


    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $personal = [["id" => "№ п/п", 
    "category" => "Подразделение", 
    "position" => "Должность",
    "rank" => "Воинское звание", 
    "last_name" => "Фамилия", 
    "first_name" => "Имя", 
    "middle_name" => "Отчество", 
    "phone" => "Номер телефона", 
    "status" => "Состояние", 
    "reason" => "Причина", 
    "location" => "Местонахождение",
    "reserv" => "Резерв",
    "time" => "18.07.2022",
    "prikaz" => "Приказ"]];

    $personal[$i][$column] = $newValue;

    $personal = json_encode($personal, JSON_UNESCAPED_UNICODE);

    $sql = "UPDATE `categories` SET personal = '$personal' where id = $id";
    mysqli_query($link, $sql);

}

return $id;