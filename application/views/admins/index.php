<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Welcome to Your Dashboard</title>
<meta name="keywords" content="">
<meta name="description" content="">

<?php echo $header; ?>
   
<div class="right_col" role="main" style="min-height: 859px;">

    <div class="box_padding_all">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-home"></i> <a href="<?php echo site_url('Admin'); ?>">Home</a> / Orders</h3>
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
                                	<input type="hidden" value="new_orders" name="pageName">
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
                <div class="modal fade" id="bs-example-modal-sm3" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        	<?php $attributes = array('role'	=>	'form'); ?>
							<?php echo form_open('Admin/close_orders', $attributes); ?>
                            <!--<form action="Admin/delete_orders" method="POST">-->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Close Order</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" value="" name="hidden_close_order_ids" id="hidden_close_order_ids">
                                     <p>Do You Wish To Close The Order?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                    <button type="submit" name="add_testimony" class="btn btn-primary"><i class="fa fa-plus"></i> Close Order</button>
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
                        	<span><?php echo $total_order_history; ?></span>
                            <p>Total Order History</p>
                            <a href="<?php echo site_url('Admin/order_history'); ?>" class="btn btn-success btn-md"> <i class="fa fa-eye"></i> View History</a>
                        </div>
                    </div>
                    <div class="col-sm-6 show_items header-div-6">
                    	<div class="col-xs-2">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-10">
                        	<span><?php echo $total_num_rows; ?></span>
                            <p>Total Number Of New Orders</p>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 x_content div_pad_12">
                            <div class="header-top-border">
                            	<div class="col-sm-4">
                                	<i class="fa fa-angle-double-right"></i> New Orders
                                </div>
                                <div class="col-sm-4">
                                	<div id="showloadingicon" style="display: none; color: #F00;">
                                        <img src="<?php echo base_url('assets/images/loading.gif'); ?>" width="32" height="32" />
                                        Fetching Order Details...
                                    </div>
                                </div>
                                <div class="col-sm-4" style="text-align: right;">
                                	<a class="btn btn-danger btn-xs text-right" id="delete_orders" href="#">Delete</a>
                                </div>
                            </div>
                            <div class="content_body">
                    			<form role="form" name="orders">
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
                                            <?php foreach($orders as $order): ?>
                                            <tr>
                                                <td class="text-center">
                                                    <input type="checkbox" name="orderId" id="checkbox-nested-<?php echo $order->order_id; ?>" value="<?php echo $order->order_id; ?>" class="beautiful-checkbox">
                                                <label for="checkbox-nested-<?php echo $order->order_id; ?>" class="beautiful-label-for-checkbox"></label>
                                                </td>
                                                <td><?php echo $order->first_name; ?></td>
                                                <td><?php echo $order->phone; ?></td>
                                                <td><?php echo $order->email; ?></td>
                                                <td>
                                                <a href="<?php echo site_url('product/' . $order->category_slug . "/" . $order->product_slug); ?>" target="_blank" class="btn btn-default btn-xs"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                </td>
                                                <td>
                                                <input type="hidden" id="theMessage" value="<?php echo $order->information; ?>" />
                                                <input type="hidden" id="theOrdererName" value="<?php echo $order->first_name; ?>" />
                                                <a href="#" class="btn btn-default btn-xs view_order"><i class="fa fa-eye" aria-hidden="true"></i> View</a>
                                                </td>
                                                <td>
                                                <?php
                                                echo date("F jS\, Y", $order->time);
                                                ?>
                                                </td>
                                                <td>
                                                    <input type="hidden" value="<?php echo $order->order_id; ?>" />
                                                    <select class="order_status" name="order_status" onChange="closeOpenOrder(this)">
                                                        <option value="1">Open</option>
                                                        <option value="2">Closed</option>
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
                                      <strong>Info!</strong> No New Order To Attend To Yet.
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
                        		</form>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php echo $footer; ?>