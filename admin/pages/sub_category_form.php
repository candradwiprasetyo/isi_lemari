<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Sub Category
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Sub Category</a></li>
                        
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
                                $query = mysql_query("select * from sub_categories where sub_category_id = '".$_GET['id']."'");
                                $row = mysql_fetch_array($query);
                            }else{
                                $row['sub_category_name'] = "";
                                $row['category_id'] = "";
								$row['sub_category_description'] = "";
                            }
                            ?>

                             <form role="form" action="<?php if(isset($_GET['id']) && $_GET['id'] != ""){ ?>controller/sub_category.php?act=edit&id=<?= $_GET['id'] ?><?php }else{ ?>controller/sub_category.php?act=add<?php }?>" method="post">

                            <div class="box box-primary">
                                
                               
                                <div class="box-body">
                                
                                   <div class="form-group">
                                        <label>Category</label>
                                        <select id="basic" name="i_category_id" class="selectpicker show-tick form-control" data-live-search="true">
                                     
                                           <?php
                                        $query_owner = mysql_query("select * from categories");
                                        while($row_owner = mysql_fetch_array($query_owner)){
                                        ?>
                                         <option value="<?= $row_owner['category_id']?>" <?php if($row_owner['category_id'] == $row['category_id']){ ?> selected="selected"<?php }?>><?= $row_owner['category_name'] ?></option>
                                        <?php
                                        }
                                        ?>
                                          
                                        </select>
                                      </div>

                                    
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Enter ..." value="<?= $row['sub_category_name']?>"/>
                                        </div>
                                     

                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea required class="form-control" name="i_description" rows="3" placeholder="Enter ..."><?= $row['sub_category_description']?></textarea>
                                        </div>
                                      
                                   
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                <input class="btn btn-primary" type="submit" value="Save"/>
                                <a href="index.php?page=pages/sub_category" class="btn btn-primary" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->