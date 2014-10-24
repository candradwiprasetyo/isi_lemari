	<div class="header-bottom">
	    <div class="wrap">
			<div class="header-bottom-left">
				<div class="logo">
					<a href="index.html"><img src="web/images/logo.png" alt=""/></a>
				</div>
				<div class="menu">
	            <ul class="megamenu skyblue">
			<li><a href="index.php">Beranda</a></li>
            <?php
            $query_menu = mysql_query("select * from categories order by category_id");
			while($row_menu = mysql_fetch_array($query_menu)){
			?>
			
            <li><a class="color4" href="index.php?page=page/category&category_id=<?= $row_menu['category_id']?>"><?= $row_menu['category_name'] ?></a>
				<div class="megapanel">
					<div class="row">
						<div class="col1">
							<div class="h_nav">
								
								<ul>
                                <?php
                                $query_sub_menu = mysql_query("select * from sub_categories where category_id = '".$row_menu['category_id']."' order by sub_category_id");
								while($row_sub_menu = mysql_fetch_array($query_sub_menu)){
								?>
									<li><a href="index.php?page=page/sub_category&sub_category_id=<?= $row_sub_menu['sub_category_id']?>"><?= $row_sub_menu['sub_category_name'] ?></a></li>
									<?php
								}
									?>
								</ul>	
							</div>							
						</div>
					
					  </div>
					</div>
				</li>				
				<?php
			}
				?>
				
				
			</ul>
			</div>
		</div>
	   <div class="header-bottom-right">
         <div class="search">	  
				<input type="text" name="s" class="textbox" value="Search" placeHolder="Cari">
				<input type="submit" value="Subscribe" id="submit" name="submit">
				<div id="response"> </div>
		 </div>
	  
    </div>
     <div class="clear"></div>
     </div>
	</div>