  <section class="content-header">
                    <h1>
                        Sub Category
                        <small></small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#">Sub Category</a></li>
                      
                        <li class="active">Data</li>
                    </ol>
                </section>

                <?php
                if(isset($_GET['did']) && $_GET['did'] == 1){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Simpan Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 2){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Edit Berhasil
                </div>
           
                </section>
                <?php
                }else if(isset($_GET['did']) && $_GET['did'] == 3){
                ?>
                <section class="content_new">
                   
                <div class="alert alert-info alert-dismissable">
                <i class="fa fa-check"></i>
                <button class="close" aria-hidden="true" data-dismiss="alert" type="button">×</button>
                <b>Sukses !</b>
               Delete Berhasil
                </div>
           
                </section>
                <?php
                }
                ?>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            
                            
                            <div class="box">
                             
                                <div class="box-body2 table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                            	<th>No</th>
                                                <th>Name</th>
                                                <th>Category</th>
                                                <th>Description</th>
                                               
                                                <th width="20%">Config</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = mysql_query("select a.*, b.category_name from sub_categories a
																join categories b on b.category_id = a.category_id
																order by sub_category_id
																");
											$no = 1;
                                            while($row = mysql_fetch_array($query)){
                                            ?>
                                            <tr>
                                            	 <td><?= $no ?></td>
                                                <td><?= $row['sub_category_name']?></td>
                                                <td><?= $row['category_name'] ?></td>
                                                <td><?= $row['sub_category_description']?></td>
                                               
                                                <td style="text-align:center;">
                                                    <a href="index.php?page=pages/sub_category_form&id=<?= $row['sub_category_id']?>" class="btn btn-primary" >Edit</a>
                                                    <a href="javascript:void(0)" onclick="confirm_delete(<?= $row['sub_category_id']; ?>,'controller/sub_category.php?act=delete&id=')" class="btn btn-primary" >Delete</a>
                                                </td>
                                            </tr>
                                            <?php
											$no++;
                                            }
                                            ?>

                                           
                                          
                                        </tbody>
                                          <tfoot>
                                            <tr>
                                                <th colspan="5"><a href="index.php?page=pages/sub_category_form" class="btn btn-primary btn-lg" >Add</a></th>
                                               
                                            </tr>
                                        </tfoot>
                                    </table>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->