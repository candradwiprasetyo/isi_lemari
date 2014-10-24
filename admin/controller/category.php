<?php
session_start();

include '../lib/config.php';
include '../lib/function.php';

$name = addslashes($_POST['i_name']);
$description = addslashes($_POST['i_description']);
$date = new_date();

$act = $_GET['act'];

switch($act){
	case 'add':

		mysql_query("insert into categories values('','".$name."','".$description."')");
		header("Location: ../index.php?page=pages/category&did=1");

	break;

	case 'edit':
		$id = $_GET['id'];
		
		mysql_query("update categories set category_name = '".$name."', category_description = '".$description."' where category_id='".$id."'");
		header("Location: ../index.php?page=pages/category&did=2");

	break;

	case 'delete':
		$id = $_GET['id'];
		mysql_query("delete from categories where category_id = '$id'");
		header("Location: ../index.php?page=pages/category&did=3");
	break;

}




?>