<?php
session_start();

include '../lib/config.php';
include '../lib/function.php';

function get_img($col, $id){
	$query = mysql_query("select $col as hasil from products where product_id = '$id'");
	$result = mysql_fetch_object($query);
	return $result->hasil;
}

$sub_category_id = addslashes($_POST['i_sub_category_id']);
$status_id = addslashes($_POST['i_status_id']);
$name = addslashes($_POST['i_name']);
$price = addslashes($_POST['i_price']);
$description = addslashes($_POST['i_description']);
$detail = addslashes($_POST['i_detail']);
$more_information = addslashes($_POST['i_more_information']);
$img1 = ($_FILES['i_img1']['name']);
$img2 = ($_FILES['i_img2']['name']);
$img3 = ($_FILES['i_img3']['name']);
$img4 = ($_FILES['i_img4']['name']);
$product_date = date("Y-m-d");
$path = 'images/product/';

$act = $_GET['act'];

switch($act){
	case 'add':
	
		mysql_query("insert into products values('',
					'$sub_category_id',
					'$status_id',
					'$name',
					'$price',
					'$description',
					'$detail',
					'$more_information',
					'',
					'',
					'',
					'',
					'$product_date'
					
					)");
		$new_id = mysql_insert_id();
		
		if($img1){
			$image1 = $path.$new_id."_1_".$img1;
			move_uploaded_file($_FILES['i_img1']['tmp_name'], "../../".$image1);
			mysql_query("update products set product_img1 = '$image1' where product_id = '$new_id'");
		}
		
		if($img2){
			$image2 = $path.$new_id."_2_".$img2;
			move_uploaded_file($_FILES['i_img2']['tmp_name'], "../../".$image2);
			mysql_query("update products set product_img2 = '$image2' where product_id = '$new_id'");
		}
		if($img3){
			$image3 = $path.$new_id."_3_".$img3;
			move_uploaded_file($_FILES['i_img3']['tmp_name'], "../../".$image3);
			mysql_query("update products set product_img3 = '$image3' where product_id = '$new_id'");
		}
		if($img4){
			$image4 = $path.$new_id."_4_".$img4;
			move_uploaded_file($_FILES['i_img4']['tmp_name'], "../../".$image4);
			mysql_query("update products set product_img4 = '$image4' where product_id = '$new_id'");
		}
		
		header("Location: ../index.php?page=pages/product&did=1");

	break;

	case 'edit':
		$id = $_GET['id'];
		
		mysql_query("update products set 
					sub_category_id = '$sub_category_id', 
					product_status_id = '$status_id',
					product_name = '$name',
					product_price = '$price',
					product_description = '$description',
					product_detail = '$detail',
					product_more_information = '$more_information'
					where product_id='$id'");
		if($img1){
			
			$get_img = get_img("product_img1", $id);
			if($get_img){
				unlink("../../".$get_img);
			}
			
			$image1 = $path.$id."_1_".$img1;
			move_uploaded_file($_FILES['i_img1']['tmp_name'], "../../".$image1);
			mysql_query("update products set product_img1 = '$image1' where product_id = '$id'");
		}
		
		if($img2){
			
			$get_img = get_img("product_img2", $id);
			if($get_img){
				unlink("../../".$get_img);
			}
			
			$image2 = $path.$id."_2_".$img2;
			move_uploaded_file($_FILES['i_img2']['tmp_name'], "../../".$image2);
			mysql_query("update products set product_img2 = '$image2' where product_id = '$id'");
		}
		
		if($img3){
			
			$get_img = get_img("product_img3", $id);
			if($get_img){
				unlink("../../".$get_img);
			}
			
			$image3 = $path.$id."_3_".$img3;
			move_uploaded_file($_FILES['i_img3']['tmp_name'], "../../".$image3);
			mysql_query("update products set product_img3 = '$image3' where product_id = '$id'");
		}
		
		if($img4){
			
			$get_img = get_img("product_img4", $id);
			if($get_img){
				unlink("../../".$get_img);
			}
			
			$image4 = $path.$id."_4_".$img4;
			move_uploaded_file($_FILES['i_img4']['tmp_name'], "../../".$image4);
			mysql_query("update products set product_img4 = '$image4' where product_id = '$id'");
		}
		
		header("Location: ../index.php?page=pages/product&did=2");

	break;

	case 'delete':
		$id = $_GET['id'];
		
		
		for($i=1;$i<=4; $i++){
			$get_img = get_img("product_img".$i, $id);
			if($get_img){
				unlink("../../".$get_img);
			}
		}
		mysql_query("delete from products where product_id = '$id'");
		header("Location: ../index.php?page=pages/product&did=3");
	break;

}




?>