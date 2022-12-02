<?php  
include "ChromePhp.php";
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'webdevkin');
$connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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
reset($table_source["rows"]);
ChromePhp::log("table_source = ", $table_source);
$uni_ids = array_column($table_source["rows"], 'uni_id');
ChromePhp::log("uni_ids = ", $uni_ids);
ChromePhp::log("ID = ", $_POST["id"]);
$key = array_search($_POST["id"], $uni_ids); // $key = 2;
ChromePhp::log("key = ", $key);
unset($table_source["rows"][$key]);
$table_source["rows"] = array_values($table_source["rows"]);
ChromePhp::log("unset = ", $table_source["rows"][0]);
$json_array = json_encode($table_source, JSON_UNESCAPED_UNICODE);

$sql = "UPDATE categories SET `personal` = '$json_array' WHERE `id` = $id_category";  
mysqli_query($connect, $sql)
?>