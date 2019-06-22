<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Add Category</title>

<meta name="keywords" content="">
<meta name="description" content="">

<?php echo $header; ?>
   
<div class="right_col" role="main" style="min-height: 859px;">

    <div class="box_padding_all">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-home"></i> <a href="<?php echo site_url('Admin'); ?>">Home</a> / <a href="<?php echo site_url('Admin/categories'); ?>">Category</a> / Edit Category</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel container-space">
                    <!--<div class="x_title">
                        <h2>Add Brand</h2>
                        <div class="clearfix"></div>
                    </div>-->
                    <div class="col-sm-12 x_content div_pad_12">
                    	<div class="header-top-border">
                            <i class="fa fa-download"></i> Edit Category
                        </div>
                        <div class="content_body">
                        	<?php
								if (isset($msg) && !empty($msg)) {
									echo $msg;
								}
							?>
                        	<?php echo validation_errors('<div class="alert alert-danger col-sm-offset-2 col-sm-8"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
                            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'add_category', 'role'	=>	'form'); ?>
							<?php echo form_open_multipart('Admin/edit_category/'.$category_details->category_id, $attributes); ?>
                            <!--<form class="form-horizontal" role="form">-->
                                <div class="form-group">
                                	<label class="control-label col-sm-2" for="category_name">Name:</label>
                                    <div class="col-sm-10">
                                    	<input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter Categoy Name" value="<?php echo $category_details->category_name; ?>">
                                        <input type="hidden" name="hidden_category_name" value="<?php echo $category_details->category_name; ?>">
                                        <input type="hidden" name="hidden_category_slug" value="<?php echo $category_details->category_slug; ?>">
                                    </div>
                                </div>
                                
                                <div class="form-group">
                                	<label class="control-label col-sm-2" for="category_banner">Category Banner:</label>
                                    <input name="hidden_category_banner" type="hidden" value="<?php echo $category_details->category_banner; ?>">
                                    <div class="col-sm-10">    
                                    	<input class="form-control" name="category_banner" id="category_banner" type="file">
                                    </div>
                                </div>
                                
                                <div class="form-group">        
                                    <div class="col-sm-offset-1 col-sm-11">
                                    	<button type="submit" class="btn btn-success"><i class="fa fa-edit"></i> Edit Category</button>
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