<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Manage Brands</title>

<meta name="keywords" content="">
<meta name="description" content="">

<?php echo $header; ?>
   
<div class="right_col" role="main" style="min-height: 859px;">

    <div class="box_padding_all">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-home"></i> <a href="<?php echo site_url('Admin'); ?>">Home</a> / Vendors</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
            	<div class="modal fade" id="bs-example-modal-sm2" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        	<?php $attributes = array('role'	=>	'form'); ?>
							<?php echo form_open('Admin/inactive_vendors', $attributes); ?>
                            <!--<form action="Admin/delete_orders" method="POST">-->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Make Vendor <span class="vendorStatus"></span></h4>
                                </div>
                                <div class="modal-body">
                                	<input type="hidden" value="" name="hidden_vendor_status" id="hidden_vendor_status">
                                    <input type="hidden" value="" name="hidden_vendor_id" id="hidden_vendor_id">
                                     <p>Do You Wish Make Vendor <span class="vendorStatus"></span></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                                    <button type="submit" name="add_testimony" class="btn btn-primary"><i class="fa fa-plus"></i> Yes Please</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="modal fade" id="bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog modal-sm">
                        <div class="modal-content">
                        	<?php $attributes = array('role'	=>	'form'); ?>
							<?php echo form_open('Admin/delete_vendors', $attributes); ?>
                            <!--<form action="Admin/delete_orders" method="POST">-->
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                                    </button>
                                    <h4 class="modal-title" id="myModalLabel2">Delete Vendor(s)</h4>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" value="" name="hidden_order_ids" id="hidden_order_ids">
                                     <p>Do You Wish Delete?</p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                                    <button type="submit" name="add_testimony" class="btn btn-primary"><i class="fa fa-plus"></i> Delete Vendor</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="x_panel container-space">
                    <div class="col-sm-6 show_items header-div-6">
                    	<div class="col-xs-2">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-10">
                        	<span><?php echo $total_active_brands; ?></span>
                            <p>Total Number Of Active Vendors</p>
                            <a href="<?php echo site_url('Admin/add_vendor'); ?>" class="btn btn-success btn-md"> <i class="fa fa-plus"></i> Create Food Vendor</a>
                        </div>
                    </div>
                    <div class="col-sm-6 show_items header-div-6">
                    	<div class="col-xs-2">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-10">
                        	<span><?php echo $total_inactive_brands; ?></span>
                            <p>Total Number Of Vendors Made Inactive</p>
                        </div>
                    </div>
                    <div class="col-sm-12 x_content div_pad_12">
                    	<form role="form" name="orders">
                            <div class="header-top-border">
                                <i class="fa fa-angle-double-right"></i> Food Vendors
                                <a href="#" id="delete_orders" class="btn btn-danger btn-xs" style="float: right;">Delete</a>
                            </div>
                            <div class="content_body">
                            	<table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%"></th>
                                            <th style="width: 15%">Name</th>
                                            <th style="width: 15%">Address</th>
                                            <th style="width: 15%">Niche</th>
                                            <th style="width: 30%">Description</th>
                                            <th style="width: 8%">Status</th>
                                            <th style="width: 7%"></th>
                                        </tr>
                                    </thead>
                                    <?php if ($total_num_rows > 0): ?>
                                    <tbody>
                                    	<?php $x = 1; ?>
                                		<?php foreach($brands as $brand): ?>
                                        <tr>
                                            <td class="text-center">
                                            	<label for="checkbox-nested-<?php echo $brand->vendor_id; ?>"><?php echo $x; ?>
                                                  <input type="checkbox" name="orderId" id="checkbox-nested-<?php echo $brand->vendor_id; ?>" value="<?php echo $brand->vendor_id; ?>">
                                                </label>
                                            </td>
                                            <td><?php echo $brand->vendor_name; ?></td>
                                            <td><?php echo $brand->vendor_address; ?></td>
                                            <td><?php echo $brand->vendor_niche; ?></td>
                                            <td><?php echo $brand->vendor_bio; ?></td>
                                            <td>
                                            	<?php if ($brand->vendor_status == 'active'): ?>
                                                <button type="button" class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i> Active</button>
                                                <?php endif; ?>
                                                <?php if ($brand->vendor_status == 'inactive'): ?>
                                                <button type="button" class="btn btn-warning btn-xs"><i class="fa fa fa-exclamation-triangle" aria-hidden="true"></i> Inactive</button>
                                                <?php endif; ?>
                                                
                                            	<select onChange="activateInactivateVendor(this)">
                                                	<option value="" >Change</option>
                                                	<?php if ($brand->vendor_status == 'active'): ?>
                                                    <option value="inactive|<?php echo $brand->vendor_id; ?>" >Inactive</option>
                                                    <?php endif; ?>
                                                    <?php if ($brand->vendor_status == 'inactive'): ?>
                                                    <option value="active|<?php echo $brand->vendor_id; ?>" >Active</option>
                                                    <?php endif; ?>
                                                </select>
                                            </td>
                                            <td class="text-center"><a href="<?php echo site_url('Admin/edit_brand/'.$brand->vendor_id); ?>" class="btn btn-default btn-xs">Edit</a></td>
                                        </tr>
                                        <?php $x++; ?>
                                    	<?php endforeach; ?>
                                    </tbody>
                                	<?php endif; ?>
                                </table>
								<?php if ($total_num_rows == 0): ?>
                                <div class="alert alert-info">
                                  <strong>Info!</strong> No Vendor Added Yet.
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