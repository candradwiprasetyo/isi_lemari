<?php

function new_date(){
	$new_date = date("Y-m-d H:m:s");
	return $new_date;
}

function get_product_status($data){
	if($data == 1){
		$hasil = "<div class='product_status_new'>New</div>";
	}else if($data == 2){
		$hasil = "<div class='product_status_sale'>Sale</div>";
	}else{
		$hasil = "<div class='product_status_sold'>Sold</div>";
	}
	
	return $hasil;
}

?>