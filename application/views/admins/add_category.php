<!DOCTYPE html>
<html lang="en">
<head>
<title>Blog Dashboard :: Add Product Category</title>

<meta name="keywords" content="">
<meta name="description" content="">

<?php echo $header; ?>
   
<div class="right_col" role="main" style="min-height: 859px;">

    <div class="box_padding_all">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-home"></i> <a href="index.php">Home Dashboard</a> / Add Category</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel container-space">
                    <div class="col-sm-6 show_items header-div-6">
                    	<div class="col-xs-2">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-10">
                        	<span><?php echo $total_num_category; ?></span>
                            <p>Total Number of Category</p>
                            <a href="<?php echo site_url('Admin/category_list'); ?>" class="btn btn-success btn-md"> <i class="fa fa-eye"></i> Edit Category List</a>
                        </div>
                    </div>
                    <div class="col-sm-6 show_items header-div-6">
                    	<div class="col-xs-2">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-10">
                        	<span><?php echo $total_num_products; ?></span>
                            <p>Total Number Of Products</p>
                            <a href="<?php echo site_url('Admin/add_product'); ?>" class="btn btn-success btn-md"> <i class="fa fa-eye"></i> Add New Products</a>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 x_content div_pad_12">
                    	<div class="header-bottom-border">
                        	<i class="fa fa-download"></i> <a href="#bs-example-modal-sm" data-toggle="modal">Add A New Category</a>
                        </div>
                        <div class="content_body">
                            <?php
								if (isset($msg) && !empty($msg)) {
									echo $msg;
								}
							?>
                        	<?php echo validation_errors('<div class="alert alert-danger col-sm-offset-2"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
                            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'add_category', 'role'	=>	'form'); ?>
							<?php echo form_open_multipart('Admin/add_category', $attributes); ?>
                            <!--<form class="form-horizontal" role="form">-->
                                <div class="form-group">
                                	<label class="control-label col-sm-2" for="email">Name:</label>
                                    <div class="col-sm-10">
                                    	<input type="text" class="form-control" id="category_name" name="category_name" placeholder="Enter Category Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-2" for="pwd">Category Banner:</label>
                                    <div class="col-sm-10">    
                                    	<input class="form-control" name="category_banner" id="category_banner" type="file">
                                        <!--<input name="hidden_category_banner" type="hidden" value="">-->
                                    </div>
                                </div>
                                
                                <div class="form-group">        
                                    <div class="col-sm-offset-2 col-sm-10">
                                    	<button type="submit" class="btn btn-success">Add Category <i class="fa fa-download"></i></button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php echo $footer; ?>