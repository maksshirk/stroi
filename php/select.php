<?php  
include "ChromePhp.php";
include "config.php";

$connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$output = '';  
$id_category = $_POST["id_category"];

$sql = "SELECT * FROM categories WHERE `id` = $id_category";  
$result = mysqli_query($connect, $sql);  
$output .= '  
    <div class="table-responsive">  
        <table class="table table-bordered border border-dark table-hover table-responsive table-striped">  
            <tr>  
                    <th width="5%">№ п/п</th>  
                    <th width="10%">Подразделение</th>  
                    <th width="20%">Воинское звание</th>  
                    <th width="20%">ФИО</th>  
                    <th width="10%">Причина отсутствия</th>  
                    <th width="20%">Местонахождение</th>  
                    <th width="10%">Время отсутствия</th>  
                    <th width="5%">Действие</th>  
            </tr>';  
$table_source = array();
$have_units = 0;
$parent_id = 0;

if (!$result) {
    $result = "Подчиненные отсутствуют";
    throw new Exception($errorMessage);
}
else while ($row = $result->fetch_assoc()){
        $table_source = $row['personal'];
        $have_units = $row['have_units'];
        $parent_id = $row['parent_id'];
}
$index = 1;
if ($have_units == 0) {
    if ($table_source){
        $table_source = json_decode($table_source, true);
        ChromePhp::log($table_source);
        foreach($table_source['rows'] as $value)
            {  
                $output .= add_to_table($value['uni_id'], $value['division'], $value['title'], $value['unit'], $value['reason'], $value['place'], $value['time'], $have_units, $index);
                $index++;
            }  
        }
    $output .= '  
        <tr>  
            <td>'.$index.'</td>  
            <td id="division" contenteditable></td>  
            <td id="title" contenteditable>
                <select id="title_select">
                    <option>Рядовой</option>
                    <option>Ефрейтор</option>
                    <option>Младший сержант</option>
                    <option>Сержант</option>
                    <option>Старший сержант</option>
                    <option>Старшина</option>
                    <option>Прапорщик</option>
                    <option>Старший прапорщик</option>
                    <option>Лейтенант</option>
                    <option>Старший лейтенант</option>
                    <option>Капитан</option>
                    <option>Майор</option>
                    <option>Подполковник</option>
                    <option>Полковник</option>
                </select>
            </td>  
            <td id="unit" contenteditable></td>  
            <td id="reason" contenteditable></td> 
            <td id="place" contenteditable></td>  
            <td id="time" contenteditable>
                <input type="date" id="time_date" name="Выберите дату отсутствия">
            </td> 
            <td><button type="button" name="btn_add" id="btn_add" class="btn btn-xs btn-success">+</button></td>  
        </tr>';
    }
else {
    
    $output .= childrens($id_category, $connect, $index);
    
    }
    
$output .= '</table></div>';
echo $output;  
?>

<?php
function childrens($id_category, $connect, $index){
    $output = " ";
    $query = "SELECT * FROM categories WHERE parent_id = $id_category";
    $data = mysqli_query($connect, $query);
    if ($data) {
        while ($row = $data->fetch_assoc()){
            $parent_id = $row['id'];
            if ($row['have_units'] == 0) {
                $table_source_children = json_decode($row['personal'], true);
                foreach($table_source_children['rows'] as $value) {   
                    $output .= add_to_table($value['uni_id'], $value['division'], $value['title'], $value['unit'], $value['reason'], $value['place'], $value['time'], 1, $index);
                $index++;    
                }
            }
            else {
                $query = "SELECT * FROM categories WHERE parent_id = $parent_id";
                $data_1 = mysqli_query($connect, $query);
                if ($data_1) {
                    while ($row = $data_1->fetch_assoc()){
                        $parent_id = $row['id'];
                        if ($row['have_units'] == 0) {
                            $table_source_children = json_decode($row['personal'], true);
                            foreach($table_source_children['rows'] as $value) {   
                                $output .= add_to_table($value['uni_id'], $value['division'], $value['title'], $value['unit'], $value['reason'], $value['place'], $value['time'], 1, $index);
                            $index++;    
                            }
                        }
                        else {
                            $query = "SELECT * FROM categories WHERE parent_id = $parent_id";
                            $data_2 = mysqli_query($connect, $query);
                            if ($data_2) {
                                while ($row = $data_2->fetch_assoc()){
                                    $parent_id = $row['id'];
                                    if ($row['have_units'] == 0) {
                                        $table_source_children = json_decode($row['personal'], true);
                                        foreach($table_source_children['rows'] as $value) {   
                                            $output .= add_to_table($value['uni_id'], $value['division'], $value['title'], $value['unit'], $value['reason'], $value['place'], $value['time'], 1, $index);
                                        $index++;    
                                        }
                                    }
                                    else {
                                        $query = "SELECT * FROM categories WHERE parent_id = $parent_id";
                                        $data_3 = mysqli_query($connect, $query);
                                        if ($data_3) {
                                            while ($row = $data_3->fetch_assoc()){
                                                $parent_id = $row['id'];
                                                if ($row['have_units'] == 0) {
                                                    $table_source_children = json_decode($row['personal'], true);
                                                    foreach($table_source_children['rows'] as $value) {   
                                                        $output .= add_to_table($value['uni_id'], $value['division'], $value['title'], $value['unit'], $value['reason'], $value['place'], $value['time'], 1, $index);
                                                    $index++;    
                                                    }
                                                }
                                                else {
                                                    $query = "SELECT * FROM categories WHERE parent_id = $parent_id";
                                                    $data_4 = mysqli_query($connect, $query);
                                                    if ($data_4) {
                                                        while ($row = $data_4->fetch_assoc()){
                                                            $parent_id = $row['id'];
                                                            if ($row['have_units'] == 0) {
                                                                $table_source_children = json_decode($row['personal'], true);
                                                                foreach($table_source_children['rows'] as $value) {   
                                                                    $output .= add_to_table($value['uni_id'], $value['division'], $value['title'], $value['unit'], $value['reason'], $value['place'], $value['time'], 1, $index);
                                                                $index++;    
                                                                }
                                                            }
                                                            else {
                                                                $query = "SELECT * FROM categories WHERE parent_id = $parent_id";
                                                                $data_5 = mysqli_query($connect, $query);
                                                                if ($data_5) {
                                                                    while ($row = $data_5->fetch_assoc()){
                                                                        $parent_id = $row['id'];
                                                                        if ($row['have_units'] == 0) {
                                                                            $table_source_children = json_decode($row['personal'], true);
                                                                            foreach($table_source_children['rows'] as $value) {   
                                                                                $output .= add_to_table($value['uni_id'], $value['division'], $value['title'], $value['unit'], $value['reason'], $value['place'], $value['time'], 1, $index);
                                                                            $index++;    
                                                                            }
                                                                        }
                                                                        else {
                                                                            $query = "SELECT * FROM categories WHERE parent_id = $parent_id";
                                                                            $data_6 = mysqli_query($connect, $query);
                                                                            if ($data_6) {
                                                                                while ($row = $data_6->fetch_assoc()){
                                                                                    $parent_id = $row['id'];
                                                                                    if ($row['have_units'] == 0) {
                                                                                        $table_source_children = json_decode($row['personal'], true);
                                                                                        foreach($table_source_children['rows'] as $value) {   
                                                                                            $output .= add_to_table($value['uni_id'], $value['division'], $value['title'], $value['unit'], $value['reason'], $value['place'], $value['time'], 1, $index);
                                                                                        $index++;    
                                                                                        }
                                                                                    }
                                                                                    else {
                                                                                        $query = "SELECT * FROM categories WHERE parent_id = $parent_id";
                                                                                        $data_7 = mysqli_query($connect, $query);
                                                                                        if ($data_7) {
                                                                                            while ($row = $data_7->fetch_assoc()){
                                                                                                $parent_id = $row['id'];
                                                                                                if ($row['have_units'] == 0) {
                                                                                                    $table_source_children = json_decode($row['personal'], true);
                                                                                                    foreach($table_source_children['rows'] as $value) {   
                                                                                                        $output .= add_to_table($value['uni_id'], $value['division'], $value['title'], $value['unit'], $value['reason'], $value['place'], $value['time'], 1, $index);
                                                                                                    $index++;    
                                                                                                    }
                                                                                                }
                                                                                                else {
                                                                                                    $query = "SELECT * FROM categories WHERE parent_id = $parent_id";
                                                                                                    $data_8 = mysqli_query($connect, $query);
                                                                                                    if ($data_8) {
                                                                                                        while ($row = $data_8->fetch_assoc()){
                                                                                                            $parent_id = $row['id'];
                                                                                                            if ($row['have_units'] == 0) {
                                                                                                                $table_source_children = json_decode($row['personal'], true);
                                                                                                                foreach($table_source_children['rows'] as $value) {   
                                                                                                                    $output .= add_to_table($value['uni_id'], $value['division'], $value['title'], $value['unit'], $value['reason'], $value['place'], $value['time'], 1, $index);
                                                                                                                $index++;    
                                                                                                                }
                                                                                                            }
                                                                                                        }
                                                                                                    }
                                                                                                }
                                                                                            }
                                                                                        }
                                                                                    }
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
    }
    return $output;
}


function add_to_table($uni_id, $division, $title, $unit, $reason, $place, $time, $have_units, $index){
    if ($have_units == 1) {
        $output = '  
        <tr>  
                <td>'.$index.'</td>  
                <td class="division" data-id1="'.$uni_id.'">'.$division.'</td> 
                <td class="title" data-id2="'.$uni_id.'">'.$title.'</td>
                <td class="unit" data-id3="'.$uni_id.'">'.$unit.'</td>
                <td class="reason" data-id4="'.$uni_id.'">'.$reason.'</td>
                <td class="place" data-id5="'.$uni_id.'" >'.$place.'</td>
                <td class="time" data-id6="'.$uni_id.'">'.$time.'</td>
                <td></td>  
        </tr>  ';  
    }
    if ($have_units == 0) {
        $output = '  
        <tr>  
                <td>'.$index.'</td>  
                <td class="division" data-id1="'.$uni_id.'">'.$division.'</td> 
                <td class="title" data-id2="'.$uni_id.'">'.$title.'</td>
                <td class="unit" data-id3="'.$uni_id.'">'.$unit.'</td>
                <td class="reason" data-id4="'.$uni_id.'">'.$reason.'</td>
                <td class="place" data-id5="'.$uni_id.'" >'.$place.'</td>
                <td class="time" data-id6="'.$uni_id.'">'.$time.'</td>
                <td><button type="button" name="delete_btn" data-id7="'.$uni_id.'" class="btn btn-xs btn-danger btn_delete">x</button></td>  
        </tr>  ';  
    }
    return $output;
}





?>
