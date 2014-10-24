<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        slider
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"> slider</a></li>
                        
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
                                $query = mysql_query("select * from sliders where slider_id = '".$_GET['id']."'");
                                $row = mysql_fetch_array($query);
                            }else{
                                $row['slider_name'] = "";
                                 $row['slider_description'] = "";
								   $row['slider_img'] = "";
                            }
                            ?>

                             <form role="form" action="<?php if(isset($_GET['id']) && $_GET['id'] != ""){ ?>controller/slider.php?act=edit&id=<?= $_GET['id'] ?><?php }else{ ?>controller/slider.php?act=add<?php }?>" method="post" enctype="multipart/form-data">

                            <div class="box box-primary">
                                
                               
                                <div class="box-body">
                                    
                                        <!-- text input -->
                                        <div class="form-group">
                                            <label>Name</label>
                                            <input required type="text" name="i_name" class="form-control" placeholder="Enter ..." value="<?= $row['slider_name']?>"/>
                                        </div>
                                     

                                        <!-- textarea -->
                                        <div class="form-group">
                                            <label>Description</label>
                                            <textarea required class="form-control" name="i_description" rows="3" placeholder="Enter ..."><?= $row['slider_description']?></textarea>
                                        </div>
                                      
                                       <div class="form-group">
                                            <label>Image</label>
                                            <?php
                                            if($row['slider_img']){ ?>
                                            <br />
											<img src="<?= "../".$row['slider_img'] ?>" height="100" />
											<?php
											}
											?>
                                           <input type="file" name="i_img" id="i_img" />
                                        </div>
                                   
                                </div><!-- /.box-body -->
                                <div class="box-footer">
                                <input class="btn btn-primary" type="submit" value="Save"/>
                                <a href="index.php?page=pages/slider" class="btn btn-primary" >Close</a>
                                </div>
                            
                            </div><!-- /.box -->
                       </form>
                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </section><!-- /.content -->