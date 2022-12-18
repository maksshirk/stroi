<?php
include "ChromePhp.php";
include "config.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$refresh_action = $_POST;
$id = $refresh_action['name'];
$json_db = json_decode($refresh_action['json_db'], true);
$result = array();



foreach ($json_db as $i => $value) {
    if ($value["icon"] == "glyphicon glyphicon-th-list") {
        unset($json_db[$i]);
    }
}

$id_1 = array_shift($json_db)["id"];

$zapros = "id = $id_1";
foreach ($json_db as $i => $value) {
    if ($value["id"] != $id_1) {
        $id_value = $value["id"];
        $zapros .= " OR id = $id_value";
    }
}

$query = "SELECT * FROM categories WHERE $zapros";

$data = mysqli_query($conn, $query);


if (!$data) {
    $result = "Подчиненные отсутствуют";
    throw new Exception($errorMessage);
}
else while ($row = $data->fetch_assoc()) {
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

$on_list = 0;
$on_the_face = 0;
$on_service = 0;
$patient = 0;
$dismissal = 0;
$holiday = 0;
$mission = 0;
$boyp = 0;
$osvobojdenie_po_bolezni = 0;
$lazaret = 0;
$other = 0;

foreach ($result as $row) {
    $on_list =  $on_list + $row['on_list'];
    $on_the_face = $on_the_face + $row['on_the_face'];
    $on_service = $on_service + $row['on_service'];
    $patient = $patient + $row['patient'];
    $dismissal = $dismissal + $row['dismissal'];
    $holiday = $holiday + $row['holiday'];
    $mission = $mission + $row['mission'];
    $boyp = $boyp + $row['boyp'];
    $osvobojdenie_po_bolezni = $osvobojdenie_po_bolezni + $row['osvobojdenie_po_bolezni'];
    $lazaret = $lazaret + $row['lazaret'];
    $other = $other + $row['other'];  
}

$query = "UPDATE categories SET on_list =  $on_list,
                                on_the_face = $on_the_face,
                                on_service = $on_service,
                                patient = $patient,
                                dismissal = $dismissal,
                                holiday = $holiday,
                                mission = $mission,
                                boyp = $boyp,
                                osvobojdenie_po_bolezni = $osvobojdenie_po_bolezni,
                                lazaret = $lazaret,
                                other = $other WHERE id = $id";

mysqli_query($conn, $query);
$result = array('code' => 'success');

echo json_encode($result);