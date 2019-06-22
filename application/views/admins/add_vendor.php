<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Add Brand</title>

<meta name="keywords" content="">
<meta name="description" content="">

<?php echo $header; ?>
   
<div class="right_col" role="main" style="min-height: 859px;">

    <div class="box_padding_all">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-home"></i> <a href="<?php echo site_url('Admin'); ?>">Home</a> / <a href="<?php echo site_url('Admin/vendors'); ?>">Vendors</a> / Add Vendors</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
            	<div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true" style="display: none;">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <form action="" name="testimony_form" method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Delete Request</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" value="" name="delete-property-id">
                                    <input type="hidden" value="" name="table">
                                     <p>Do You Wish Delete This Request?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    <button type="submit" name="add_testimony" class="btn btn-primary"><i class="fa fa-plus"></i> Delete Request</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="x_panel container-space">
                    <!--<div class="x_title">
                        <h2>Add Brand</h2>
                        <div class="clearfix"></div>
                    </div>-->
                    <div class="col-sm-12 x_content div_pad_12">
                    	<div class="header-bottom-border">
                        	<i class="fa fa-download"></i> Add Vendor Details
                        </div>
                        <div class="content_body">
                        	<?php
								if (isset($error_logo) && !empty($error_logo)) {
									echo $error_logo;
								}
								if (isset($msg) && !empty($msg)) {
									echo $msg;
								}
							?>
                        	<?php echo validation_errors('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
                            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'add_brand', 'role'	=>	'form'); ?>
							<?php echo form_open_multipart('Admin/add_vendor', $attributes); ?>
                            <!--<form class="form-horizontal" role="form">-->
                                <div class="form-group">
                                	<label class="control-label col-sm-1" for="email">Name:</label>
                                    <div class="col-sm-11">
                                    	<input type="text" class="form-control" name="brand_name" id="brand_name" placeholder="Enter Brand Name">
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-1" for="email">Address:</label>
                                    <div class="col-sm-11">
                                    	<input type="text" class="form-control" name="brand_address" id="brand_address" placeholder="Enter Brand Address">
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-1" for="pwd">Niche:</label>
                                    <div class="col-sm-11">          
                                    	<input type="text" class="form-control" name="brand_niche" id="brand_niche" placeholder="Enter Brand Niche">
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-1" for="pwd">Description:</label>
                                    <div class="col-sm-11">    
                                    	<textarea class="form-control" name="brand_bio" id="brand_bio" placeholder"Enter Brand Description"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-1" for="pwd">Logo:</label>
                                    <div class="col-sm-11">    
                                    	<input type="file" class="form-control" name="brand_img[]" id="brand_logo">
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-1" for="pwd">Banner:</label>
                                    <div class="col-sm-11">    
                                    	<input type="file" class="form-control" name="brand_img[]" id="brand_banner">
                                    </div>
                                </div>
                                
                                <div class="form-group">        
                                    <div class="col-sm-offset-1 col-sm-11">
                                    	<button type="submit" class="btn btn-success">Submit <i class="fa fa-download"></i></button>
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