  
  <div class="section group">
  <div class="cont span_2_of_3">
  			 <?php
            $query_menu_home = mysql_query("select a.*, b.category_name from sub_categories a
			join categories b on b.category_id = a.category_id 
			where sub_category_id = '".$_GET['sub_category_id']."' order by sub_category_id");
			while($row_menu_home = mysql_fetch_array($query_menu_home)){
			?>
		  	<h2 class="head"><?= $row_menu_home['category_name']." - ".$row_menu_home['sub_category_name'] ?></h2>
			
            <?php
			$u=1;
			$query_jumlah_product = mysql_query("select count(*) as jumlah from products a
							join sub_categories b on b.sub_category_id = a.sub_category_id
							 where a.sub_category_id = '".$row_menu_home['sub_category_id']."' order by product_id");
			$row_jumlah_product = mysql_fetch_object($query_jumlah_product);
			$jumlah = $row_jumlah_product->jumlah;
            $query_product = mysql_query("select * from products a
							join sub_categories b on b.sub_category_id = a.sub_category_id
							 where a.sub_category_id = '".$row_menu_home['sub_category_id']."' order by product_id");
			while($row_product = mysql_fetch_array($query_product)){
				$urutan = $u%3;
				if($urutan==1 || $u==1){ ?>
                <div class="top-box">
                <?php
				}
			?>
            
			 <div class="col_1_of_3 span_1_of_3"> 
			   <a href="index.php?page=page/view_product&product_id=<?= $row_product['product_id']?>">
				<div class="inner_content clearfix">
					<div class="product_image">
						<img src="<?= $row_product['product_img1']?>" alt=""/>
					</div>
                    <?php
                    if($row_product['product_status_id']==1){
					?>
                    <div class="sale-box1"><span class="on_sale title_shop">New</span></div>	
                     <?php
					}elseif($row_product['product_status_id']==2){
					?>
                    <div class="sale-box"><span class="on_sale title_shop">Sale</span></div>	
                      <?php
				   }elseif($row_product['product_status_id']==3){
					?>
                    <div class="sold-box"><span class="on_sold title_shop">Sold</span></div>	
                    <?php
				   }
					?>
                    <div class="price">
					   <div class="cart-left">
							<p class="title"><?=$row_product['product_name'] ?></p>
							<div class="price1">
							  <span class="actual">Rp. <?= number_format($row_product['product_price']) ?></span>
							</div>
						</div>
						<div class="cart-right"> </div>
						<div class="clear"></div>
					 </div>				
                   </div>
                 </a>
				</div>
               
                  <?php
				  $jumlah_new = $jumlah%3;
                  if($urutan==0){
					 
				  ?>
				  
				<div class="clear"></div>
			</div>	
            <?php
				  }else  if($jumlah > 0 && $urutan == $jumlah_new){
						?>
						<div class="clear"></div>
							</div>
						<?php
						
					}
				  $u++;
			}
			?>
            
		<?php
			}
		?>
			</div>			 						 			    
		  </div>
			<div class="rsidebar span_1_of_left">
				<div class="top-border"> </div>
				 <div class="border">
	             <link href="web/css/default.css" rel="stylesheet" type="text/css" media="all" />
	             <link href="web/css/nivo-slider.css" rel="stylesheet" type="text/css" media="all" />
				  <script src="web/js/jquery.nivo.slider.js"></script>
				    <script type="text/javascript">
				    $(window).load(function() {
				        $('#slider').nivoSlider();
				    });
				    </script>
		    <div class="slider-wrapper theme-default">
              <div id="slider" class="nivoSlider">
                <img src="web/images/t-img1.jpg"  alt="" />
               	<img src="web/images/t-img2.jpg"  alt="" />
                <img src="web/images/t-img3.jpg"  alt="" />
              </div>
             </div>
              <div class="btn"><a href="single.html">Check it Out</a></div>
             </div>
           <div class="top-border"> </div>
			
	    </div>
	   <div class="clear"></div>
       </div>