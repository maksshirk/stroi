<?php
include "ChromePhp.php";
define('DB_HOST', 'localhost');
define('DB_USER', 'c19stroi');
define('DB_PASSWORD', 'F9-Siro@');
define('DB_NAME', 'c19stroi');

$id = 0;

if (isset($_POST['name'])) {
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    if (!$link) {
        printf("Невозможно подключиться к базе данных. Код ошибки: %s\n", mysqli_connect_error());
        exit;
    }
 
    $column = $_POST['name'];
    $newValue = $_POST['value'];    
    $id = $_POST['pk'];
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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
    $ak74_komplekt_ps = 0;
    $ak74_komplekt_nv = 0;
    $ak74_komplekt_vn = 0;
    $ak74_noj_ps = 0;
    $ak74_noj_nv = 0;
    $ak74_noj_vn = 0;
    $boepripasi_ps = 0;
    $boepripasi_nv = 0;
    $boepripasi_vn = 0;
    $patroni_ps = 0;
    $patroni_nv = 0;
    $patroni_vn = 0;

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
            $ak74_komplekt_ps = $row['ak74_komplekt_ps'];
            $ak74_komplekt_nv = $row['ak74_komplekt_nv'];
            $ak74_komplekt_vn = $row['ak74_komplekt_vn'];
            $ak74_noj_ps = $row['ak74_noj_ps'];
            $ak74_noj_nv = $row['ak74_noj_nv'];
            $ak74_noj_vn = $row['ak74_noj_vn'];
            $boepripasi_ps = $row['boepripasi_ps'];
            $boepripasi_nv = $row['boepripasi_nv'];
            $boepripasi_vn = $row['boepripasi_vn'];
            $patroni_ps = $row['patroni_ps'];
            $patroni_nv = $row['patroni_nv'];
            $patroni_vn = $row['patroni_vn'];
            ChromePhp::log($row['patroni_vn']);
    }
    $rashod_old = array("on_list" => $on_list, 
                    "on_the_face" => "$on_the_face", 
                    "on_service" => $on_service, 
                    "patient" => $patient, 
                    "dismissal" => $dismissal, 
                    "holiday" => $holiday, 
                    "mission" => $mission, 
                    "boyp" => $boyp, 
                    "osvobojdenie_po_bolezni" => $osvobojdenie_po_bolezni, 
                    "lazaret" => $lazaret, 
                    "other" => $other,
                    "ak74_komplekt_ps" => $ak74_komplekt_ps,
                    "ak74_komplekt_nv" => $ak74_komplekt_nv,
                    "ak74_komplekt_vn" => "$ak74_komplekt_vn",
                    "ak74_noj_ps" => $ak74_noj_ps,
                    "ak74_noj_nv" => $ak74_noj_nv,
                    "ak74_noj_vn" => "$ak74_noj_vn",
                    "boepripasi_ps" => $boepripasi_ps,
                    "boepripasi_nv" => $boepripasi_nv,
                    "boepripasi_vn" => "$boepripasi_vn",
                    "patroni_ps" => $patroni_ps,
                    "patroni_nv" => $patroni_nv,
                    "patroni_vn" => "$patroni_vn"
                );




    $sql = "UPDATE `categories` SET $column = '$newValue' where id = $id";
    mysqli_query($link, $sql);
    
    $result = array();
    
    $conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
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
    $ak74_komplekt_ps = 0;
    $ak74_komplekt_nv = 0;
    $ak74_komplekt_vn = 0;
    $ak74_noj_ps = 0;
    $ak74_noj_nv = 0;
    $ak74_noj_vn = 0;
    $boepripasi_ps = 0;
    $boepripasi_nv = 0;
    $boepripasi_vn = 0;
    $patroni_ps = 0;
    $patroni_nv = 0;
    $patroni_vn = 0;

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
            $ak74_komplekt_ps = $row['ak74_komplekt_ps'];
            $ak74_komplekt_nv = $row['ak74_komplekt_nv'];
            $ak74_komplekt_vn = $row['ak74_komplekt_vn'];
            $ak74_noj_ps = $row['ak74_noj_ps'];
            $ak74_noj_nv = $row['ak74_noj_nv'];
            $ak74_noj_vn = $row['ak74_noj_vn'];
            $boepripasi_ps = $row['boepripasi_ps'];
            $boepripasi_nv = $row['boepripasi_nv'];
            $boepripasi_vn = $row['boepripasi_vn'];
            $patroni_ps = $row['patroni_ps'];
            $patroni_nv = $row['patroni_nv'];
            $patroni_vn = $row['patroni_vn'];
    }
    date_default_timezone_set("Europe/Moscow");
    $refresh_data = date('Y-m-d H:i:s', time());

    $on_the_face = $on_list - $on_service - $patient - $dismissal - $holiday - $mission - $boyp - $osvobojdenie_po_bolezni - $lazaret - $other; 
    $ak74_komplekt_vn = $ak74_komplekt_ps - $ak74_komplekt_nv; 
    $ak74_noj_vn = $ak74_noj_ps - $ak74_noj_nv; 
    $boepripasi_vn = $boepripasi_ps - $boepripasi_nv; 
    $patroni_vn = $patroni_ps - $patroni_nv; 

    $query = "UPDATE categories SET refresh_data = '$refresh_data',
                                    on_the_face = $on_the_face, 
                                    ak74_komplekt_vn = $ak74_komplekt_vn,
                                    ak74_noj_vn = $ak74_noj_vn,
                                    boepripasi_vn = $boepripasi_vn,
                                    patroni_vn = $patroni_vn
                                    WHERE id = $id";

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
                    "other" => $other,
                    "ak74_komplekt_ps" => $ak74_komplekt_ps,
                    "ak74_komplekt_nv" => $ak74_komplekt_nv,
                    "ak74_komplekt_vn" => $ak74_komplekt_vn,
                    "ak74_noj_ps" => $ak74_noj_ps,
                    "ak74_noj_nv" => $ak74_noj_nv,
                    "ak74_noj_vn" => $ak74_noj_vn,
                    "boepripasi_ps" => $boepripasi_ps,
                    "boepripasi_nv" => $boepripasi_nv,
                    "boepripasi_vn" => $boepripasi_vn,
                    "patroni_ps" => $patroni_ps,
                    "patroni_nv" => $patroni_nv,
                    "patroni_vn" => $patroni_vn
                );

    

    function parents($refresh_data, $parent_id, $conn, $rashod, $rashod_old){
        if ($parent_id != 0){
            //$query = "UPDATE categories SET refresh_data = '$refresh_data' WHERE id = $parent_id";
            //mysqli_query($conn, $query);
            $query = "SELECT * FROM categories WHERE id = $parent_id";
            ChromePhp::log($query);
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
                $ak74_komplekt_ps_parent = $row['ak74_komplekt_ps'];
                $ak74_komplekt_nv_parent = $row['ak74_komplekt_nv'];
                $ak74_komplekt_vn_parent = $row['ak74_komplekt_vn'];
                $ak74_noj_ps_parent = $row['ak74_noj_ps'];
                $ak74_noj_nv_parent = $row['ak74_noj_nv'];
                $ak74_noj_vn_parent = $row['ak74_noj_vn'];
                $boepripasi_ps_parent = $row['boepripasi_ps'];
                $boepripasi_nv_parent = $row['boepripasi_nv'];
                $boepripasi_vn_parent = $row['boepripasi_vn'];
                $patroni_ps_parent = $row['patroni_ps'];
                $patroni_nv_parent = $row['patroni_nv'];
                $patroni_vn_parent = $row['patroni_vn'];
            }
            $rashod['on_list'] =  $on_list_parent + $rashod['on_list'] - $rashod_old['on_list'];
            $rashod['on_the_face'] = $on_the_face_parent + $rashod['on_the_face'] - $rashod_old['on_the_face'];
            $rashod['on_service'] = $on_service_parent + $rashod['on_service'] - $rashod_old['on_service'];
            $rashod['patient'] = $patient_parent + $rashod['patient'] - $rashod_old['patient'];
            $rashod['dismissal'] = $dismissal_parent + $rashod['dismissal'] - $rashod_old['dismissal'];
            $rashod['holiday'] = $holiday_parent + $rashod['holiday'] - $rashod_old['holiday'];
            $rashod['mission'] = $mission_parent + $rashod['mission'] - $rashod_old['mission'];
            ChromePhp::log("Родительское значение");
            ChromePhp::log($boyp_parent);
            ChromePhp::log("Новое значение");
            ChromePhp::log($rashod['boyp']);
            ChromePhp::log("Старое значение");
            ChromePhp::log($rashod_old['boyp']);            
            $rashod['boyp'] = $boyp_parent + $rashod['boyp'] - $rashod_old['boyp'];
            ChromePhp::log("Значение пойдет в базу родителя");
            ChromePhp::log($rashod['boyp']);
            $rashod['osvobojdenie_po_bolezni'] = $osvobojdenie_po_bolezni_parent + $rashod['osvobojdenie_po_bolezni'] - $rashod_old['osvobojdenie_po_bolezni'];
            $rashod['lazaret'] = $lazaret_parent + $rashod['lazaret'] - $rashod_old['lazaret'];
            $rashod['other'] = $other_parent + $rashod['other'] - $rashod_old['other'];  
            $rashod['ak74_komplekt_ps'] = $ak74_komplekt_ps_parent + $rashod['ak74_komplekt_ps'] - $rashod_old['ak74_komplekt_ps'];
            $rashod['ak74_komplekt_nv'] = $ak74_komplekt_nv_parent + $rashod['ak74_komplekt_nv'] - $rashod_old['ak74_komplekt_nv'];
            $rashod['ak74_komplekt_vn'] = $ak74_komplekt_vn_parent + $rashod['ak74_komplekt_vn'] - $rashod_old['ak74_komplekt_vn'];
            $rashod['ak74_noj_ps'] = $ak74_noj_ps_parent + $rashod['ak74_noj_ps'] - $rashod_old['ak74_noj_ps'];
            $rashod['ak74_noj_nv'] = $ak74_noj_nv_parent + $rashod['ak74_noj_nv'] - $rashod_old['ak74_noj_nv'];
            $rashod['ak74_noj_vn'] = $ak74_noj_vn_parent + $rashod['ak74_noj_vn'] - $rashod_old['ak74_noj_vn'];
            $rashod['boepripasi_ps'] = $boepripasi_ps_parent + $rashod['boepripasi_ps'] - $rashod_old['boepripasi_ps'];
            $rashod['boepripasi_nv'] = $boepripasi_nv_parent + $rashod['boepripasi_nv'] - $rashod_old['boepripasi_nv'];
            $rashod['boepripasi_vn'] = $boepripasi_vn_parent + $rashod['boepripasi_vn'] - $rashod_old['boepripasi_vn'];
            $rashod['patroni_ps'] = $patroni_ps_parent + $rashod['patroni_ps'] - $rashod_old['patroni_ps'];
            $rashod['patroni_nv'] = $patroni_nv_parent + $rashod['patroni_nv'] - $rashod_old['patroni_nv'];
            $rashod['patroni_vn'] = $patroni_vn_parent + $rashod['patroni_vn'] - $rashod_old['patroni_vn'];

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
            $ak74_komplekt_ps = $rashod['ak74_komplekt_ps'];
            $ak74_komplekt_nv = $rashod['ak74_komplekt_nv'];
            $ak74_komplekt_vn = $rashod['ak74_komplekt_vn'];
            $ak74_noj_ps = $rashod['ak74_noj_ps'];
            $ak74_noj_nv = $rashod['ak74_noj_nv'];
            $ak74_noj_vn = $rashod['ak74_noj_vn'];
            $boepripasi_ps = $rashod['boepripasi_ps'];
            $boepripasi_nv = $rashod['boepripasi_nv'];
            $boepripasi_vn = $rashod['boepripasi_vn'];
            $patroni_ps = $rashod['patroni_ps'];
            $patroni_nv = $rashod['patroni_nv'];
            $patroni_vn = $rashod['patroni_vn'];

            $rashod_old['on_list'] = $on_list_parent;
            $rashod_old['on_the_face'] = $on_the_face_parent;
            $rashod_old['on_service'] = $on_service_parent;
            $rashod_old['patient'] = $patient_parent;
            $rashod_old['dismissal'] = $dismissal_parent;
            $rashod_old['holiday'] = $holiday_parent;
            $rashod_old['mission'] = $mission_parent;
            $rashod_old['boyp'] = $boyp_parent;
            $rashod_old['osvobojdenie_po_bolezni'] = $osvobojdenie_po_bolezni_parent;
            $rashod_old['lazaret'] = $lazaret_parent;
            $rashod_old['other'] = $other_parent;
            $rashod_old['parent_id'] = $parent_id_parent;
            $rashod_old['ak74_komplekt_ps'] = $ak74_komplekt_ps_parent;
            $rashod_old['ak74_komplekt_nv'] = $ak74_komplekt_nv_parent;
            $rashod_old['ak74_komplekt_vn'] = $ak74_komplekt_vn_parent;
            $rashod_old['ak74_noj_ps'] = $ak74_noj_ps_parent;
            $rashod_old['ak74_noj_nv'] = $ak74_noj_nv_parent;
            $rashod_old['ak74_noj_vn'] = $ak74_noj_vn_parent;
            $rashod_old['boepripasi_ps'] = $boepripasi_ps_parent;
            $rashod_old['boepripasi_nv'] = $boepripasi_nv_parent;
            $rashod_old['boepripasi_vn'] = $boepripasi_vn_parent;
            $rashod_old['patroni_ps'] = $patroni_ps_parent;
            $rashod_old['patroni_nv'] = $patroni_nv_parent;
            $rashod_old['patroni_vn'] = $patroni_vn_parent;


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
                                other = $other,
                                ak74_komplekt_ps = $ak74_komplekt_ps,
                                ak74_komplekt_nv = $ak74_komplekt_nv,
                                ak74_komplekt_vn = $ak74_komplekt_vn,
                                ak74_noj_ps = $ak74_noj_ps,
                                ak74_noj_nv = $ak74_noj_nv,
                                ak74_noj_vn = $ak74_noj_vn,
                                boepripasi_ps = $boepripasi_ps,
                                boepripasi_nv = $boepripasi_nv,
                                boepripasi_vn = $boepripasi_vn,
                                patroni_ps = $patroni_ps,
                                patroni_nv = $patroni_nv,
                                patroni_vn = $patroni_vn
                    WHERE id = $parent_id";
            ChromePhp::log($query);
            mysqli_query($conn, $query);

            parents($refresh_data, $parent_id_parent, $conn, $rashod, $rashod_old);
        }
    }

    parents($refresh_data, $parent_id, $conn, $rashod, $rashod_old);

}

return $id;