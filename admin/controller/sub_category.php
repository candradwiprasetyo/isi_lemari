<?php
session_start();

include '../lib/config.php';
include '../lib/function.php';

$name = addslashes($_POST['i_name']);
$category = addslashes($_POST['i_category_id']);
$description = addslashes($_POST['i_description']);
$date = new_date();

$act = $_GET['act'];

switch($act){
	case 'add':

		mysql_query("insert into sub_categories values('','$category','".$name."','".$description."')");
		header("Location: ../index.php?page=pages/sub_category&did=1");

	break;

	case 'edit':
		$id = $_GET['id'];
		
		mysql_query("update sub_categories set category_id = '$category', sub_category_name = '".$name."', sub_category_description = '".$description."' where sub_category_id='".$id."'");
		header("Location: ../index.php?page=pages/sub_category&did=2");

	break;

	case 'delete':
		$id = $_GET['id'];
		mysql_query("delete from sub_categories where sub_category_id = '$id'");
		header("Location: ../index.php?page=pages/sub_category&did=3");
	break;

}




?>