<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Product
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Product</a></li>
                        
                        <li class="active">Form</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                      
                        <!-- right column -->
                        <div class="col-md-12">
                            <!-- general form elements disabled -->

                            <?php
                            if(isset($_GET['id'])){
                                $query = mysql_query("select * from products where product_id = '".$_GET['id']."'");
                                $row = mysql_fetch_array($query);
                            }else{
								$row['sub_category_id'] = "";
								$row['product_status_id'] = "";
                                $row['product_name'] = "";
                                $row['product_price'] = "";
								$row['product_description'] = "";
								$row['product_detail'] = "";
								$row['product_more_information'] = "";
								$row['product_img1'] = "";
								$row['product_img2'] = "";
								$row['product_img3'] = "";
								$row['product_img4'] = "";
                            }
                            ?>

                             <form action="<?php if(isset($_GET['id']) && $_GET['id'] != ""){ ?>controller/product.php?act=edit&id=<?= $_GET['id'] ?><?php }else{ ?>controller/product.php?act=add<?php }?>" method="post" enctype="multipart/form-data" role="form">

                            <div class="box box-primary">
                                
                               
                                <div class="box-body">
                                 <div class="col-md-12">
                                   <div class="form-group">
                                        <label>Category</label>
                                        <select id="basic" name="i_sub_category_id" class="selectpicker show-tick form-control" data-live-search="true">
                                     
                                           <?php
                                        $query_owner = mysql_query("select * from sub_categories a join categories b on b.category_id = a.category_id");
                                        while($row_owner = mysql_fetch_array($query_owner)){
                                        ?>
                                         <option value="<?= $row_owner['sub_category_id']?>" <?php if($row_owner['sub_category_id'] == $row['sub_category_id']){ ?> selected="selected"<?php }?>><?= $row_owner['category_name']." - ".$row_owner['sub_category_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>
                                      </div>
                                       <div class="col-md-2">
                                      <div class="form-group">
                                        <label>Status</label>
                                        <select id="basic" name="i_status_id" class="selectpicker show-tick form-control" data-live-search="true">
                                     
                                      
                                         <option value="1" <?php if($row['product_status_id']==1){ ?> selected="selected"<?php } ?>>New</option>
                                         <option value="2"  <?php if($row['product_status_id']==2){ ?> selected="selected"<?php } ?>>Sale</option>
                                       <option value="3"  <?php if($row['product_status_id']==3){ ?> selected="selected"<?php } ?>>Sold</option>
                                          
                                        </select>
                                      </div>
                                      </div>

                                     <div class="col-md-6">
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Enter ..." value="<?= $row['product_name']?>"/>
                                        </div>
                                        </div>
                                        
                                         <div class="col-md-4">
                                         <!-- text input -->
                                        <div class="form-group">
                                            <label>Price</label>
                                            <input required type="text" name="i_price" class="form-control" placeholder="Enter ..." value="<?= $row['product_price']?>" />
                                        </div>
                                        </div>
                                        
                                   		 
                                         
 <div class="col-md-4">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea  class="form-control" name="i_description" rows="8" placeholder="Enter ..."><?= $row['product_description']?></textarea>
                                        </div>
                                        </div>
                                        
                                         <div class="col-md-4">
                                        
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Detail</label>
                                            <textarea  class="form-control" name="i_detail" rows="8" placeholder="Enter ..."><?= $row['product_detail']?></textarea>
                                        </div>
                                    	</div>
                                         <div class="col-md-4">
                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>More Information</label>
                                            <textarea  class="form-control" name="i_more_information" rows="8" placeholder="Enter ..."><?= $row['product_more_information']?></textarea>
                                        </div>  
                                        </div>
                                        
                                         <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image 1</label>
                                            <?php
                                            if($row['product_img1']){ ?>
                                            <br />
											<img src="<?= "../".$row['product_img1'] ?>" height="100" />
											<?php
											}
											?>
                                           <input type="file" name="i_img1" id="i_img1" />
                                        </div>
                                        </div>
                                        
                                         <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image 2</label>
                                            <?php
                                            if($row['product_img2']){ ?>
                                            <br />
											<img src="<?= "../".$row['product_img2'] ?>" height="100" />
											<?php
											}
											?>
                                           <input type="file" name="i_img2" id="i_img2" />
                                        </div>
                                        </div>
                                        
                                         <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image 3</label>
                                            <?php
                                            if($row['product_img3']){ ?>
                                            <br />
											<img src="<?= "../".$row['product_img3'] ?>" height="100" />
											<?php
											}
											?>
                                           <input type="file" name="i_img3" id="i_img3" />
                                        </div>
                                        </div>
                                        
                                         <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Image 4</label>
                                            <?php
                                            if($row['product_img4']){ ?>
                                            <br />
											<img src="<?= "../".$row['product_img4'] ?>" height="100" />
											<?php
											}
											?>
                                           <input type="file" name="i_img4" id="i_img4" />
                                        </div>
                                        </div>
                                        
                                        <div style="clear:both; height:20px;"></div>
                                   
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                <input class="btn btn-primary" type="submit" value="Save"/>
                                <a href="index.php?page=pages/product" class="btn btn-primary" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->