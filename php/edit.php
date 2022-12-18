<?php  
include "ChromePhp.php";
include "config.php";
$connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$id = $_POST["id"];  
$text = $_POST["text"];  
$column_name = $_POST["column_name"]; 
$id_category = $_POST["id_category"]; 
$sql = "SELECT * FROM categories WHERE `id` = $id_category";  
$result = mysqli_query($connect, $sql);
$table_source = array("rows" => 
                    array()
                    );
if (!$result) {
     $result = "Подчиненные отсутствуют";
     throw new Exception($errorMessage);
 }
 else while ($row = $result->fetch_assoc()){
         $table_source = $row['personal'];
 }

$table_source = json_decode($table_source, true);
$uni_ids = array_column($table_source, "uni_id");
$key = array_search($_POST["id"], $uni_ids);
$table_source["rows"][$key][$column_name] = $text;
$json_array = json_encode($table_source, JSON_UNESCAPED_UNICODE);
$sql = "UPDATE categories SET `personal` = '$json_array' WHERE `id` = $id_category";  
mysqli_query($connect, $sql);
?>