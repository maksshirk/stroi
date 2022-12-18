<?php
include "ChromePhp.php";
include "config.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$refresh_action = $_POST;
$id = $refresh_action['name'];
$json_db = json_decode($refresh_action['json_db'], true);
$result = array();

foreach ($json_db as $i => $value) {
    ChromePhp::log($value["icon"]);
    if ($value["icon"] == "glyphicon glyphicon-user") {
        unset($json_db[$i]);
    }
}
ChromePhp::log($json_db);
$json_db = json_encode($json_db, JSON_UNESCAPED_UNICODE);
echo json_encode($json_db);