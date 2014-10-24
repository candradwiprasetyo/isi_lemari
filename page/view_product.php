	<?php
			
            $query_product = mysql_query("select * from products a
							join sub_categories b on b.sub_category_id = a.sub_category_id
							 where a.product_id = '".$_GET['product_id']."' order by product_id");
			$row_product = mysql_fetch_array($query_product);
				
			?>
    <ul class="breadcrumb breadcrumb__t"><a class="home" href="">Home</a></ul>
		<div class="cont span_2_of_3">
		  	<div class="grid images_3_of_2">
						<div id="container">
							<div id="products_example">
								<div id="products">
									<div class="slides_container">
									        <a href="#"><img class="a" id="img1" src="<?= $row_product['product_img1']?>" alt="" rel="<?= $row_product['product_img1']?>" /></a>
											<a href="#"><img class="a" id="img2" src="<?= $row_product['product_img2']?>" alt="" rel="<?= $row_product['product_img2']?>" /></a>
											<a href="#"><img class="a" id="img3" src="<?= $row_product['product_img3']?>" alt="" rel="<?= $row_product['product_img3']?>" /></a>
											<a href="#"><img class="a" id="img4" src="<?= $row_product['product_img4']?>" alt="" rel="<?= $row_product['product_img4']?>" /></a>
									</div>
									<ul class="pagination">
										<li><a href="#"><img src="<?= $row_product['product_img1']?>" width="s-img" alt="1144953 3 2x"></a></li>
										<li><a href="#"><img src="<?= $row_product['product_img2']?>" width="s-img1" alt="1144953 3 2x"></a></li>
										<li><a href="#"><img src="<?= $row_product['product_img3']?>" width="s-img2" alt="1144953 3 2x"></a></li>
										<li><a href="#"><img src="<?= $row_product['product_img4']?>" width="s-img3" alt="1144953 1 2x"></a></li><div class="clear"></div>
									</ul>
								</div>
							</div>
						</div>
	            </div>
		         <div class="desc1 span_3_of_2">
		         	<h3 class="m_3"><?= $row_product['product_name'] ?></h3>
		             <p class="m_5"><?= "Rp. ".number_format($row_product['product_price']) ?></p>
		         	 <div class="btn_form">
					
					 </div>
					<span class="m_link"></span>
				     <p class="m_text2"><?= $row_product['product_description']?></p>
			     </div>
			   <div class="clear"></div>	
	    <div class="clients">
	    <h3 class="m_3">10 Other Products in the same category</h3>
      
		 <ul id="flexiselDemo3">
           <?php
         $query_same = mysql_query("select * from products a
							join sub_categories b on b.sub_category_id = a.sub_category_id
							 where a.sub_category_id = '".$row_product['sub_category_id']."' and product_id <> '".$row_product['product_id']."' order by product_id");
		while($row_same = mysql_fetch_array($query_same)){
		?>
			<li><img src="<?= $row_same['product_img1'] ?>" /><a href="index.php?page=page/view_product&product_id=<?= $row_same['product_id']?>"><?= $row_same['product_name'] ?></a><p><?= "Rp. ".number_format($row_same['product_price']); ?></p></li>
            <?php
		}
			?>
		 </ul>
	<script type="text/javascript">
		$(window).load(function() {
			$("#flexiselDemo1").flexisel();
			$("#flexiselDemo2").flexisel({
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		
			$("#flexiselDemo3").flexisel({
				visibleItems: 5,
				animationSpeed: 1000,
				autoPlay: true,
				autoPlaySpeed: 3000,    		
				pauseOnHover: true,
				enableResponsiveBreakpoints: true,
		    	responsiveBreakpoints: { 
		    		portrait: { 
		    			changePoint:480,
		    			visibleItems: 1
		    		}, 
		    		landscape: { 
		    			changePoint:640,
		    			visibleItems: 2
		    		},
		    		tablet: { 
		    			changePoint:768,
		    			visibleItems: 3
		    		}
		    	}
		    });
		    
		});
	</script>
	
     </div>
     <div class="toogle">
     	<h3 class="m_3">Product Details</h3>
     	<p class="m_text"><?= $row_product['product_detail']?></p>
     </div>
     <div class="toogle">
     	<h3 class="m_3">More Information</h3>
     	<p class="m_text"><?= $row_product['product_more_information']?></p>
     </div>
      </div><div class="clear"></div>
			</div>
			 <div class="clear"></div>