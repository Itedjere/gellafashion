<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Order History</title>

<meta name="keywords" content="">
<meta name="description" content="">

<?php echo $header; ?>
   
<div class="right_col" role="main" style="min-height: 859px;">

    <div class="box_padding_all">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-home"></i> <a href="<?php echo site_url('Admin'); ?>">Home</a> / <a href="<?php echo site_url('Admin'); ?>">Orders</a> / Orders History</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
            	<div class="modal fade" id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        	<?php $attributes = array('role'	=>	'form'); ?>
							<?php echo form_open('Admin/delete_orders', $attributes); ?>
                            <!--<form action="Admin/delete_orders" method="POST">-->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Delete Orders</h4>
                                </div>
                                <div class="modal-body">
                                	<input type="hidden" value="order_history" name="pageName">
                                    <input type="hidden" value="" name="hidden_order_ids" id="hidden_order_ids">
                                     <p>Do You Wish Delete?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    <button type="submit" name="add_testimony" class="btn btn-primary"><i class="fa fa-plus"></i> Delete Order</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                <h4 class="modal-title" id="myModalLabel2">Message Of <span id="name"></span></h4>
                            </div>
                            <div class="modal-body" id="order_message"></div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="x_panel container-space">
                	<div class="col-sm-6 show_items header-div-6">
                    	<div class="col-xs-2">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-10">
                        	<span><?php echo $total_num_rows; ?></span>
                            <p>Total Order History</p>
                        </div>
                    </div>
                    <div class="col-sm-6 show_items header-div-6">
                    	<div class="col-xs-2">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-10">
                        	<span><?php echo $total_new_order; ?></span>
                            <p>Total Number Of New Orders</p>
                            <a href="<?php echo site_url('Admin'); ?>" class="btn btn-success btn-md"> <i class="fa fa-eye"></i> View New Orders</a>
                        </div>
                    </div>
                    
                 
                    <div class="col-sm-12 x_content div_pad_12">
                            <div class="header-top-border">
                            	<div class="col-sm-4">
                                	<i class="fa fa-angle-double-right"></i> Order History
                                </div>
                                <div class="col-sm-4">
                                	<div id="showloadingicon" style="display: none; color: #F00;">
                                        <img src="<?php echo base_url('assets/images/loading.gif'); ?>" width="32" height="32" />
                                        Fetching Order Details...
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                <button class="btn btn-danger btn-xs" id="delete_orders">Delete</button>
                                </div>
                            </div>
                            <form role="form" name="orders">
                            <div class="content_body">
                            	<table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"></th>
                                            <th style="width: 20%">Name</th>
                                            <th style="width: 15%">Phone</th>
                                            <th style="width: 15%">Email</th>
                                            <th style="width: 10%">Product</th>
                                            <th style="width: 10%">Messsage</th>
                                            <th style="width: 10%">Time</th>
                                            <th style="width: 10%">Status</th>
                                        </tr>
                                    </thead>
									<?php if ($total_num_rows > 0): ?>
                                    <?php $x = 1; ?>
                                    <tbody>
                                    	<?php foreach($closed_orders as $closed_order): ?>
                                        <tr>
                                            <td class="text-center">
                                            	<input type="checkbox" name="orderId" id="checkbox-nested-<?php echo $closed_order->order_id; ?>" value="<?php echo $closed_order->order_id; ?>" class="beautiful-checkbox">
                                                <label for="checkbox-nested-<?php echo $closed_order->order_id; ?>" class="beautiful-label-for-checkbox"></label>
                                            </td>
                                            <td><?php echo $closed_order->first_name; ?></td>
                                            <td><?php echo $closed_order->phone; ?></td>
                                            <td><?php echo $closed_order->email; ?></td>
                                            <td>
                                            <a href="<?php echo site_url('product/' . $closed_order->category_slug . "/" . $closed_order->product_slug); ?>" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                            </td>
                                            <td>
                                            <input type="hidden" id="theMessage" value="<?php echo $closed_order->information; ?>" />
                                            <input type="hidden" id="theOrdererName" value="<?php echo $closed_order->first_name; ?>" />
                                            <a href="#" class="btn btn-default btn-xs view_order"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                            </td>
                                            <td>
                                            <?php
											echo date("F jS\, Y", $closed_order->time);
											?>
                                            </td>
                                            <td>
                                            	<select id="status_closed">
                                                    <option>Closed</option>
                                                </select>
                                            </td>
                                        </tr>
                                        <?php $x++; ?>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <?php endif; ?>
                                </table>
                                <?php if ($total_num_rows == 0): ?>
                                <div class="alert alert-info">
                                  <strong>Info!</strong> Your Order History Is Empty.
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
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php echo $footer; ?>