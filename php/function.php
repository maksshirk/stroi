<?php
include "ChromePhp.php";
// Объявляем нужные константы
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'webdevkin');

function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
}

// Подключаемся к базе данных
function connectDB() {
    $errorMessage = 'Невозможно подключиться к серверу базы данных';
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    if (!$conn)
        throw new Exception($errorMessage);
    else {
        $query = $conn->query('set names utf8');
        if (!$query)
            throw new Exception($errorMessage);
        else
            return $conn;
    }
}

// Вытаскиваем категории из БД
function getCategories($db) {
    $id = $_COOKIE['id'];
   
    $query = "
        SELECT
           id AS `id`,
           IF (id = $id, '#', parent_id) AS `parent`,
           category as `text`,
           icon as 'icon'
        FROM
           categories
        ORDER BY
           `parent_id`, `number`
    ";
    $data = $db->query($query);
    $categories = array();
    while ($row = $data->fetch_assoc()) {
        array_push($categories, array(
            'id' => $row['id'],
            'parent' => $row['parent'],
            'text' => $row['text'],
            'icon' => $row['icon']
        ));
    }
    return $categories;
}

// Вставка категории по ее id, родителю и позиции number
function includePosition($db, $categoryId, $parentId, $position) {
    $query = "update categories set number = number + 1 where parent_id = $parentId and number >= $position";
    $db->query($query);
    $query = "update categories set parent_id = $parentId, number = $position where id = $categoryId";
    $db->query($query);
}

// Исключение категории по ее родителю и позиции number
function excludePosition($db, $parentId, $position) {
    $query = "update categories set number = number - 1 where parent_id = $parentId and number > $position";
    $db->query($query);
}

// Исключение категории по ее родителю и позиции number
function createPosition($db, $ParentId, $position, $text, $icon) {
    $password_default = "12345";
    $password_default = md5($password_default."gsadfbxcvbxcvdsf");  
    $personal = '{"rows": []}';
    if ($text == "Новое подразделение") {
        $query = "INSERT INTO categories (`category`, `parent_id`, `number`, `have_units`, `icon`, `password`, `personal`) VALUES ('".$text."', '".$ParentId."', '".$position."', '"."0"."', '".$icon."','".$password_default."', '".$personal."')";
    }
    else {
        $query = "INSERT INTO categories (`category`, `parent_id`, `number`, `icon`, `password`, `personal`) VALUES ('".$text."', '".$ParentId."', '".$position."', '".$icon."','".$password_default."', '".$personal."')";
    }
    $db->query($query);

}

function renamePosition($db, $Id, $text) {
    $query = "UPDATE categories SET `category`='".$text."' WHERE `id`= '".$Id."'";
    $db->query($query);

}

function deletePosition($db, $Id) {
    $query = "DELETE FROM categories WHERE `id`= '".$Id."'";
    $db->query($query);
}

// Перемещение категории
function moveCategory($db, $params) {
    $categoryId = (int)$params['id'];
    $oldParentId = (int)$params['old_parent'];
    $newParentId = (int)$params['new_parent'];
    $oldPosition = (int)$params['old_position'] + 1;
    $newPosition = (int)$params['new_position'] + 1;

    excludePosition($db, $oldParentId, $oldPosition);
    includePosition($db, $categoryId, $newParentId, $newPosition);

    return json_encode(array(
        'code' => 'success'
    ));
}



function choosedCategory($db, $params) {

    $id_table = (int)$params['id'];
    
    $query = "
            SELECT
                *
            FROM
                categories
            WHERE
                id
                IN
                ($id_table)
        ";
    
    $data = $db->query($query);
    
    $result = array();
    while ($row = $data->fetch_assoc()) {
        array_push($result, array(
            'id' => $row['id'],
            'category' => $row['category'],
            'on_list' => $row['on_list'],
            'on_service' => $row['on_service'],
            'patient' => $row['patient'],
            'dismissal' => $row['dismissal'],
            'holiday' => $row['holiday'],
            'mission' => $row['mission'],
            'boyp' => $row['boyp'],
            'osvobojdenie_po_bolezni' => $row['osvobojdenie_po_bolezni'],
            'lazaret' => $row['lazaret'],
            'other' => $row['other']            
        ));
    
    return json_encode(array(
        'code' => 'success'
    ));
    }
}


function createCategory($db, $params) {
    $ParentId = (int)$params['ParentId'];
    $position = (int)$params['position'];
    $text = (string)$params['text'];
    $icon = (string)$params['icon'];

    createPosition($db, $ParentId, $position, $text, $icon);

    return json_encode(array(
        'code' => 'success'
    ));
}

function renameCategory($db, $params) {
    $Id = (int)$params['Id'];
    $text = (string)$params['text'];
    

    renamePosition($db, $Id, $text);

    return json_encode(array(
        'code' => 'success'
    ));
}

function deleteCategory($db, $params) {
    $Id = (int)$params['Id'];

    deletePosition($db, $Id);

    return json_encode(array(
        'code' => 'success'
    ));
}

try {
    // Подключаемся к базе данных
    
    $conn = connectDB();
    
    // Получаем данные из массива GET
    $action = $_GET['action'];
    switch ($action) {
        // Получаем дерево категорий
        case 'choosed_category':
            $result = choosedCategory($conn, $_GET);
            
            break;

        case 'get_categories':
            $result = getCategories($conn);
            break;

        // Перемещаем категорию
        case 'move_category':
            $result = moveCategory($conn, $_GET);
            break;
        
        case 'create_category':
            $result = createCategory($conn, $_GET);
            break;
            
        case 'delete_category':
            $result = deleteCategory($conn, $_GET);
            break;  

        case 'rename_category':
            $result = renameCategory($conn, $_GET);
            break;           


        default:
            $result = 'unknown action';
            break;
    }

    // Возвращаем клиенту успешный ответ
    echo json_encode(array(
        'code' => 'success',
        'result' => $result
    ));
}
catch (Exception $e) {
    // Возвращаем клиенту ответ с ошибкой
    echo json_encode(array(
        'code' => 'error',
        'message' => $e->getMessage()
    ));
}
