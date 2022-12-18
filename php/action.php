<?php
//include_once("inc/db_connect.php");
include 'table_config.php';


//$id_table

include "config.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($_POST['action'] == 'edit' && $id_table) {	
	$updateField='';
	if(isset($_POST['category'])) {
		$updateField.= "category='".$_POST['category']."'";
	} else if(isset($_POST['on_list'])) {
		$updateField.= "on_list='".$_POST['on_list']."'";
	} else if(isset($_POST['on_the_face'])) {
		$updateField.= "on_the_face='".$_POST['on_the_face']."'";
	} else if(isset($_POST['on_service'])) {
		$updateField.= "on_service='".$_POST['on_service']."'";
	} else if(isset($_POST['patient'])) {
		$updateField.= "patient='".$_POST['patient']."'";
	} else if(isset($_POST['dismissal'])) {
		$updateField.= "dismissal='".$_POST['dismissal']."'";
	} else if(isset($_POST['holiday'])) {
		$updateField.= "holiday='".$_POST['holiday']."'";
	} else if(isset($_POST['holiday'])) {
		$updateField.= "holiday='".$_POST['holiday']."'";
	}

	if($updateField && $id_table) {
		$sqlQuery = "UPDATE developers SET $updateField WHERE id='" . $id_table . "'";	
		mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));	
		$data = array(
			"message"	=> "Record Updated",	
			"status" => 1
		);
		echo json_encode($data);		
	}
}
if ($_POST['action'] == 'delete' && $id_table) {
	$sqlQuery = "DELETE FROM developers WHERE id='" . $id_table . "'";	
	mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));	
	$data = array(
		"message"	=> "Record Deleted",	
		"status" => 1
	);
	echo json_encode($data);	
}
?>