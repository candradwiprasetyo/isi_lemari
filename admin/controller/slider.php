<?php
session_start();

include '../lib/config.php';
include '../lib/function.php';

$name = addslashes($_POST['i_name']);
$description = addslashes($_POST['i_description']);
$img = (isset($_FILES['i_img']['name'])) ? $_FILES['i_img']['name'] : "";
$path = 'images/slider/';
$date = new_date();

$act = $_GET['act'];

switch($act){
	case 'add':
		
		mysql_query("insert into sliders values('','".$name."','".$description."', '')");
		$new_id = mysql_insert_id();
		
		
		if($img){
			
			$image = $path.$new_id."_".$img;
			move_uploaded_file($_FILES['i_img']['tmp_name'], "../../".$image);
			mysql_query("update sliders set slider_img= '$image' where slider_id = '$new_id'");
		}
		
		header("Location: ../index.php?page=pages/slider&did=1");

	break;

	case 'edit':
		$id = $_GET['id'];
		
		if($img){
			
			$q_img = mysql_query("select * from sliders where slider_id = '$id'");
			$get_img = mysql_fetch_object($q_img);
			if($get_img->slider_img){
				unlink("../../".$get_img->slider_img);
			}
			
			$image = $path.$id."_".$img;
			
			move_uploaded_file($_FILES['i_img']['tmp_name'], "../../".$image);
			mysql_query("update sliders set slider_img= '$image' where slider_id = '$id'");
		}
		
		mysql_query("update sliders set slider_name = '".$name."', slider_description = '".$description."' where slider_id='".$id."'");
		header("Location: ../index.php?page=pages/slider&did=2");

	break;

	case 'delete':
		$id = $_GET['id'];
		
		$q_img = mysql_query("select * from sliders where slider_id = '$id'");
			$get_img = mysql_fetch_object($q_img);
			if($get_img->slider_img){
				unlink("../../".$get_img->slider_img);
			}
		
		mysql_query("delete from sliders where slider_id = '$id'");
		header("Location: ../index.php?page=pages/slider&did=3");
	break;

}




?>