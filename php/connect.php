<?php

define('DB_HOST', 'localhost');
define('DB_USER', 'c19stroi');
define('DB_PASSWORD', 'F9-Siro@');
define('DB_NAME', 'c19stroi');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

$id_table = $_GET['id_table'];

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

$data = $conn->query($query);
$result = array();
while ($row = $data->fetch_assoc()) {
    array_push($result, array(
        'id' => $row['id'],
        'category' => $row['category'],
        'on_list' => $row['on_list'],
        'on_the_face' => $row['on_the_face'],
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
    }

