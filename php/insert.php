<?php  
include "ChromePhp.php";
include "config.php";
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
$index = 1;
if ($table_source){
     $table_source = json_decode($table_source, true);
     foreach($table_source['rows'] as $value)
         {  
             $index++;
         }  
     }
else {
     $table_source = array("rows" => 
                    array()
                    );
}
$uni_id = rand();

array_push ($table_source["rows"], array(
     "index" => $index,
     "division" => $_POST["division"],
     "title" => $_POST["title"],
     "unit" => $_POST["unit"],
     "reason" => $_POST["reason"],
     "place" => $_POST["place"],
     "time" => $_POST["time"],
     "uni_id" => $uni_id
)); 



$json_array = json_encode($table_source, JSON_UNESCAPED_UNICODE);

$sql = "UPDATE categories SET `personal` = '$json_array' WHERE `id` = $id_category";  
mysqli_query($connect, $sql); 

?> 