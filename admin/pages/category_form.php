<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Category
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"> Category</a></li>
                        
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
                                $query = mysql_query("select * from categories where category_id = '".$_GET['id']."'");
                                $row = mysql_fetch_array($query);
                            }else{
                                $row['category_name'] = "";
                                 $row['category_description'] = "";
                            }
                            ?>

                             <form role="form" action="<?php if(isset($_GET['id']) && $_GET['id'] != ""){ ?>controller/category.php?act=edit&id=<?= $_GET['id'] ?><?php }else{ ?>controller/category.php?act=add<?php }?>" method="post">

                            <div class="box box-primary">
                                
                               
                                <div class="box-body">
                                    
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Enter ..." value="<?= $row['category_name']?>"/>
                                        </div>
                                     

                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea required class="form-control" name="i_description" rows="3" placeholder="Enter ..."><?= $row['category_description']?></textarea>
                                        </div>
                                      
                                   
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                <input class="btn btn-primary" type="submit" value="Save"/>
                                <a href="index.php?page=pages/category" class="btn btn-primary" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->