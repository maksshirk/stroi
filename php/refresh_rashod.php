<?php
include "ChromePhp.php";
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', 'root');
define('DB_NAME', 'webdevkin');

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$action = $_POST;
$id = $action['id_rashod'];

$result = array();

$query = "SELECT * FROM categories WHERE id = $id";

$data = mysqli_query($conn, $query);

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
$parent_id = 0;

if (!$data) {
    $result = "Подчиненные отсутствуют";
    throw new Exception($errorMessage);
}
else while ($row = $data->fetch_assoc()){
        $on_list = $row['on_list'];
        $on_the_face = $row['on_the_face'];
        $on_service = $row['on_service'];
        $patient = $row['patient'];
        $dismissal = $row['dismissal'];
        $holiday = $row['holiday'];
        $mission = $row['mission'];
        $boyp = $row['boyp'];
        $osvobojdenie_po_bolezni = $row['osvobojdenie_po_bolezni'];
        $lazaret = $row['lazaret'];
        $other = $row['other'];
        $parent_id = $row['parent_id'];
}
date_default_timezone_set("Europe/Moscow");
$refresh_data = date('Y-m-d H:i:s', time());

$on_the_face = $on_list - $on_service - $patient - $dismissal - $holiday - $mission - $boyp - $osvobojdenie_po_bolezni - $lazaret - $other; 

$query = "UPDATE categories SET refresh_data = '$refresh_data',
                                on_the_face = $on_the_face WHERE id = $id";

mysqli_query($conn, $query);

$rashod = array("on_list" => $on_list, 
                "on_the_face" => "$on_the_face", 
                "on_service" => $on_service, 
                "patient" => $patient, 
                "dismissal" => $dismissal, 
                "holiday" => $holiday, 
                "mission" => $mission, 
                "boyp" => $boyp, 
                "osvobojdenie_po_bolezni" => $osvobojdenie_po_bolezni, 
                "lazaret" => $lazaret, 
                "other" => $other);

ChromePhp::log($rashod);

function parents($refresh_data, $parent_id, $conn, $rashod){
    if ($parent_id != 0){
        //$query = "UPDATE categories SET refresh_data = '$refresh_data' WHERE id = $parent_id";
        //mysqli_query($conn, $query);
        $query = "SELECT * FROM categories WHERE id = $parent_id";
        $data = mysqli_query($conn, $query);
        while ($row = $data->fetch_assoc()){
            $on_list_parent = $row['on_list'];
            $on_the_face_parent = $row['on_the_face'];
            $on_service_parent = $row['on_service'];
            $patient_parent = $row['patient'];
            $dismissal_parent = $row['dismissal'];
            $holiday_parent = $row['holiday'];
            $mission_parent = $row['mission'];
            $boyp_parent = $row['boyp'];
            $osvobojdenie_po_bolezni_parent = $row['osvobojdenie_po_bolezni'];
            $lazaret_parent = $row['lazaret'];
            $other_parent = $row['other'];
            $parent_id_parent = $row['parent_id'];
        }
        ChromePhp::log("Z nen");
        ChromePhp::log($rashod);
        $rashod['on_list'] =  $on_list_parent + $rashod['on_list'];
        $rashod['on_the_face'] = $on_the_face_parent + $rashod['on_the_face'];
        $rashod['on_service'] = $on_service_parent + $rashod['on_service'];
        $rashod['patient'] = $patient_parent + $rashod['patient'];
        $rashod['dismissal'] = $dismissal_parent + $rashod['dismissal'];
        $rashod['holiday'] = $holiday_parent + $rashod['holiday'];
        $rashod['mission'] = $mission_parent + $rashod['mission'];
        $rashod['boyp'] = $boyp_parent + $rashod['boyp'];
        $rashod['osvobojdenie_po_bolezni'] = $osvobojdenie_po_bolezni_parent + $rashod['osvobojdenie_po_bolezni'];
        $rashod['lazaret'] = $lazaret_parent + $rashod['lazaret'];
        $rashod['other'] = $other_parent + $rashod['other'];  
        ChromePhp::log($rashod);
        $on_list = $rashod['on_list'];
        $on_the_face = $rashod['on_the_face'];
        $on_service = $rashod['on_service'];
        $patient = $rashod['patient'];
        $dismissal = $rashod['dismissal'];
        $holiday = $rashod['holiday'];
        $mission = $rashod['mission'];
        $boyp = $rashod['boyp'];
        $osvobojdenie_po_bolezni = $rashod['osvobojdenie_po_bolezni'];
        $lazaret = $rashod['lazaret'];
        $other = $rashod['other'];  
        $query = "UPDATE categories SET
                            refresh_data = '$refresh_data',
                            on_list =  $on_list,
                            on_the_face = $on_the_face,
                            on_service = $on_service,
                            patient = $patient,
                            dismissal = $dismissal,
                            holiday = $holiday,
                            mission = $mission,
                            boyp = $boyp,
                            osvobojdenie_po_bolezni = $osvobojdenie_po_bolezni,
                            lazaret = $lazaret,
                            other = $other 
                WHERE id = $parent_id";
        mysqli_query($conn, $query);
        parents($refresh_data, $parent_id_parent, $conn, $rashod);
    }
}

parents($refresh_data, $parent_id, $conn, $rashod);


$result = array('code' => 'success');

echo json_encode($result);