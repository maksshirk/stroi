<?php
include "ChromePhp.php";
include "config.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
$action = $_GET;
$id_table = $action['id'];
    
$query = "
    SELECT
        *
    FROM
        categories
    WHERE
        parent_id
        IN
        ($id_table)
    ORDER BY
        category
    ";

$query_3 = "
    SELECT
        *
    FROM
        categories
    WHERE
        id
        IN
        ($id_table)
    ORDER BY
        category
";
    
$result = array();
$result_3 = array();

if (!$conn)
    throw new Exception($errorMessage);
else {
    try {
        $data = $conn->query($query);
        if (!$data)
            throw new Exception($errorMessage);
        else
            while ($row = $data->fetch_assoc()) {
                array_push($result, array(
                    'have_units' => $row['have_units'],
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
                    'other' => $row['other'],
                    'refresh_data' => $row['refresh_data'],
                    'ak74_komplekt_ps' => $row['ak74_komplekt_ps'],
                    'ak74_komplekt_nv' => $row['ak74_komplekt_nv'],
                    'ak74_komplekt_vn' => $row['ak74_komplekt_vn'],
                    'ak74_noj_ps' => $row['ak74_noj_ps'],
                    'ak74_noj_nv' => $row['ak74_noj_nv'],
                    'ak74_noj_vn' => $row['ak74_noj_vn'],
                    'boepripasi_ps' => $row['boepripasi_ps'],
                    'boepripasi_nv' => $row['boepripasi_nv'],
                    'boepripasi_vn' => $row['boepripasi_vn'],
                    'patroni_ps' => $row['patroni_ps'],
                    'patroni_nv' => $row['patroni_nv'],
                    'patroni_vn' => $row['patroni_vn'],
                    'personal' => $row['personal']
                ));
            }
    }
    catch (Exception $e) {
        echo "Пожалуйста перезагрузите страницу для продолжения работы";
        die();
    }    
}

if (!$conn)
throw new Exception($errorMessage);
else {
    try {
        $data_3 = $conn->query($query_3);
        if (!$data_3)
            throw new Exception($errorMessage);
        else
            while ($row = $data_3->fetch_assoc()) {
                array_push($result_3, array(
                    'id' => $row['id'],
                    'have_units' => $row['have_units'],
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
                    'other' => $row['other'],
                    'refresh_data' => $row['refresh_data'],
                    'ak74_komplekt_ps' => $row['ak74_komplekt_ps'],
                    'ak74_komplekt_nv' => $row['ak74_komplekt_nv'],
                    'ak74_komplekt_vn' => $row['ak74_komplekt_vn'],
                    'ak74_noj_ps' => $row['ak74_noj_ps'],
                    'ak74_noj_nv' => $row['ak74_noj_nv'],
                    'ak74_noj_vn' => $row['ak74_noj_vn'],
                    'boepripasi_ps' => $row['boepripasi_ps'],
                    'boepripasi_nv' => $row['boepripasi_nv'],
                    'boepripasi_vn' => $row['boepripasi_vn'],
                    'patroni_ps' => $row['patroni_ps'],
                    'patroni_nv' => $row['patroni_nv'],
                    'patroni_vn' => $row['patroni_vn'],
                    'personal' => $row['personal']
                ));
            }
    }
    catch (Exception $e) {
        echo "Пожалуйста перезагрузите страницу для продолжения работы";
        die();
    }    
}

