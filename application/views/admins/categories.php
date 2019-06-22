<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Manage Category List</title>

<meta name="keywords" content="">
<meta name="description" content="">

<?php echo $header; ?>

<!-- The Modal -->
<div id="myModal" class="img_modal">

  <!-- The Close Button -->
  <span class="close">&times;</span>

  <!-- Modal Content (The Image) -->
  <img class="modal-content" id="img01">

  <!-- Modal Caption (Image Text) -->
  <div id="caption"></div>
</div>
   
<div class="right_col" role="main" style="min-height: 859px;">

    <div class="box_padding_all">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-home"></i> <a href="<?php echo site_url('Admin'); ?>">Home</a> / Category List</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
            	<div class="col-md-12">
            	<!--<div class="modal fade" id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        	<?php //$attributes = array('role'	=>	'form'); ?>
							<?php //echo form_open('Admin/unavailabulate_menu', $attributes); ?>
                            <form action="Admin/delete_orders" method="POST">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Make Menu(s) Unavailable</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" value="" name="hidden_order_ids" id="hidden_order_ids">
                                     <p>Do You Wish Make Menu(s) Unavailable?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                    <button type="submit" name="add_testimony" class="btn btn-primary"><i class="fa fa-plus"></i> Yes, Make Unavailable</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>-->
                <div class="x_panel container-space">
                	<div class="show_items header-div-12">
                    	<div class="col-xs-1">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-11">
                        	<span><?php echo $total_num_rows; ?></span>
                            <p>Total Number Of Category</p>
                            <a href="<?php echo site_url('Admin/add_category'); ?>" class="btn btn-success btn-md"> <i class="fa fa-plus"></i> Add New Category</a>
                        </div>
                    </div>
                    <div class="col-sm-12 x_content div_pad_12">
                        <div class="header-top-border">
                            <div class="col-sm-4">
                                <i class="fa fa-angle-double-right"></i> Category List
                            </div>
                            <div class="col-sm-4">
                                <div id="showloadingicon" style="display: none; color: #F00;">
                                    <img src="<?php echo base_url('assets/images/loading.gif'); ?>" width="32" height="32" />
                                    Fetching Product Details...
                                </div>
                            </div>
                            <div class="col-sm-4" style="text-align: right;">
                                <!--<button class="btn btn-danger btn-xs" id="delete_orders">Delete</button>-->
                            </div>
                        </div>
                        <div class="content_body">
                        	<?php if ($total_num_rows > 0): ?>
                        	<form role="form" name="orders">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"></th>
                                            <th style="width: 10%">Category Banner</th>
                                            <th style="width: 20%">Category Name</th>
                                            <th style="width: 60%">Edit</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                        <?php $x = 1; ?>
                                        <?php foreach($categories as $category): ?>
                                        <tr>
                                            <td class="text-center">
                                                <!--<label for="checkbox-nested-<?php //echo $category->category_id; ?>"><?php //echo $x; ?>
                                                  <input type="checkbox" name="orderId" id="checkbox-nested-<?php //echo $category->category_id; ?>" value="<?php //echo $category->category_id; ?>">
                                                </label>-->&nbsp;
                                            </td>
                                            <td><img src="<?php echo base_url('assets/images/category/' . $category->category_banner); ?>" width="50" height="50" onClick="popupimage(this)" alt="<?php echo $category->category_name; ?>" style="cursor: pointer;"></td>
                                            <td><?php echo $category->category_name; ?></td>
                                            <td><a href="<?php echo site_url('Admin/edit_category/'.$category->category_id); ?>" class="btn btn-default btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></td>
                                            
                                        </tr>
                                        <?php $x++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </form>
                            <?php endif; ?>
                            <?php if ($total_num_rows == 0): ?>
                            <div class="alert alert-info">
                              <strong>Info!</strong> No Category Created Yet.
                            </div>
                            <?php endif; ?>
                            
                            <div class="col-sm-12">
                                <p class="category-pagination-sign"><?php echo $total_num_rows;  ?> result found.
                                Showing Page <?php echo $page_num; ?> of <?php echo $total_num_pages; ?>. <br>
                                Page is Grouped in 10</p>
                            </div>
                            <div class="col-sm-12">
                                <?php echo $this->pagination->create_links(); ?>
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php echo $footer; ?>