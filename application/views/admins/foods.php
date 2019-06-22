<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Product List</title>

<meta name="keywords" content="">
<meta name="description" content="">

<?php echo $header; ?>
   
<div class="right_col" role="main" style="min-height: 859px;">

    <div class="box_padding_all">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-home"></i> <a href="<?php echo site_url('Admins'); ?>">Home</a> / Products</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
            	<div class="modal fade" id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        	<?php $attributes = array('role'=>'form'); ?>
							<?php echo form_open('Admin/delete_products', $attributes); ?>
                            <!--<form action="Admin/delete_orders" method="POST">-->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Delete Product(s)</h4>
                                </div>
                                <div class="modal-body">
                                	<input type="hidden" value="products" name="pageName">
                                    <input type="hidden" value="" name="hidden_order_ids" id="hidden_order_ids">
                                     <p>Do You Wish To Delete?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    <button type="submit" name="add_testimony" class="btn btn-primary"><i class="fa fa-plus"></i> Yes, Delete</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="x_panel container-space">
                	<div class="show_items header-div-12">
                    	<div class="col-xs-1">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-11">
                        	<span id="total_number_of_foods"><?php echo $total_num_rows; ?></span>
                            <p>Total Number Of Products</p>
                            <a href="<?php echo site_url('Admin/add_product'); ?>" class="btn btn-success btn-md"> <i class="fa fa-plus"></i> Add New Product</a>
                        </div>
                    </div>
                    <div class="col-sm-12 x_content div_pad_12">
                        <div class="header-top-border">
                            <div class="col-sm-4">
                                <i class="fa fa-angle-double-right"></i> Product List
                            </div>
                            <div class="col-sm-4">
                                <div id="showloadingicon" style="display: none; color: #F00;">
                                    <img src="<?php echo base_url('assets/images/loading.gif'); ?>" width="32" height="32" />
                                    Fetching Product Details...
                                </div>
                            </div>
                            <div class="col-sm-4" style="text-align: right;">
                                <button class="btn btn-danger btn-xs" id="delete_orders">Delete</button>
                            </div>
                        </div>
                        <div class="content_body">
                        	<form role="form" name="orders">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 5%"></th>
                                            <th style="width: 20%">Name</th>
                                            <th style="width: 20%">Category</th>
                                            <th style="width: 20%">Date</th>
                                            <th style="width: 20%">Featured</th>
                                            <th colspan="2">Action</th>
                                        </tr>
                                    </thead>
                                    <?php if ($total_num_rows > 0): ?>
                                    <?php $x = 1; ?>
                                    <tbody id="display_food_details">
                                        <?php foreach($products as $product): ?>
                                        
                                        <tr>
                                            <td class="text-center">
                                                  <input type="checkbox" name="orderId" id="checkbox-nested-<?php echo $product->product_id; ?>" value="<?php echo $product->product_id; ?>" class="beautiful-checkbox">
                                                <label for="checkbox-nested-<?php echo $product->product_id; ?>" class="beautiful-label-for-checkbox"></label>
                                            </td>
                                            <td><?php echo $product->product_name; ?></td>
                                            <td><?php echo $product->category_name; ?></td>
                                            <td><?php echo date('jS M Y', $product->product_added_date); ?></td>
                                            <td>
                                            	<input type="checkbox" name="featuredId" id="best-<?php echo $product->product_id; ?>" value="<?php echo $product->product_id; ?>" class="featured-checkbox" onChange="featureBlogOrNot(this)" <?php echo ($product->featured == "yes") ? "checked" : ""; ?> >
                                                <label for="best-<?php echo $product->product_id; ?>" class="featured-label-for-checkbox"></label>
                                            </td>
                                            <td class="text-center"><a href="<?php echo site_url('Admin/edit_product/'.$product->product_id); ?>" class="btn btn-default btn-xs"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></td>
                                            <td class="text-center"><a href="<?php echo site_url('product/' . $product->category_slug . "/" . $product->product_slug); ?>" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a></td>
                                        </tr>
                                        <?php $x++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <?php endif; ?>
                                </table>
                            </form>
                            
                            <?php if ($total_num_rows == 0): ?>
                            <div class="alert alert-info">
                              <strong>Info!</strong> No Food Item Added Yet.
                            </div>
                            <?php endif; ?>
                            
                            <div class="col-sm-12" id="total_food_item_found">
                                <p class="category-pagination-sign"><?php echo $total_num_rows;  ?> result found.
                                Showing Page <?php echo $page_num; ?> of <?php echo $total_num_pages; ?>. <br>
                                Page is Grouped in 5</p>
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