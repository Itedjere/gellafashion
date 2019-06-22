<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Add / Remove Vendor from Home</title>

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
                <div class="x_panel container-space">
                    <div class="col-sm-6 show_items header-div-6">
                    	<div class="col-xs-2">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-10">
                        	<span><?php echo $total_active_brands; ?></span>
                            <p>Total Number Of Active Vendors</p>
                            <a href="<?php echo site_url('Admin/add_brand'); ?>" class="btn btn-success btn-md"> <i class="fa fa-plus"></i> Create Food Vendor</a>
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
                            <div class="header-top-border">
                                <div class="col-sm-4">
                                	<i class="fa fa-angle-double-right"></i> Food Vendors
                                </div>
                                <div class="col-sm-4">
                                	<div id="showloadingicon" style="display: none; color: #F00;">
                                        <img src="<?php echo base_url('assets/images/loading.gif'); ?>" width="32" height="32" />
                                        Submitting Your Request To The Server...
                                    </div>
                                </div>
                                <div class="col-sm-4" style="text-align: right;">
                                <a href="#" id="home_vendors" class="btn btn-danger btn-xs" style="float: right;">Add To Home</a>
                                </div>
                            </div>
                            <div class="content_body">
                    			<form role="form" name="vendors">
                                    <table class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">S/N</th>
                                                <th style="width: 20%">Name</th>
                                                <th style="width: 20%">Address</th>
                                                <th style="width: 20%">Niche</th>
                                                <th style="width: 15%">Added To Home</th>
                                                <th style="width: 15%">Edit</th>
                                            </tr>
                                        </thead>
                                        <?php if ($total_num_rows > 0): ?>
                                        <tbody id="vendor_table_display">
                                            <?php $x = 1; ?>
                                            <?php foreach($brands as $brand): ?>
                                            <tr>
                                                <td class="text-center">
                                                    <?php echo $x; ?>
                                                </td>
                                                <td><?php echo $brand->vendor_name; ?></td>
                                                <td><?php echo $brand->vendor_address; ?></td>
                                                <td><?php echo $brand->vendor_niche; ?></td>
                                                <td>
                                                    <?php if ($brand->add_home == 'yes'): ?>
                                                    <button type="button" class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i> Yes</button>
                                                    <?php endif; ?>
                                                    <?php if ($brand->add_home == 'no'): ?>
                                                    <button type="button" class="btn btn-warning btn-xs"><i class="fa fa fa-exclamation-triangle" aria-hidden="true"></i> No&nbsp;</button>
                                                    <?php endif; ?>
                                                </td>
                                                <td>
                                                    <select onChange="addRemoveVendorFromHome(this)">
                                                        <option value="" >Change Status</option>
                                                        <?php if ($brand->add_home == 'yes'): ?>
                                                        <option value="no|<?php echo $brand->vendor_id; ?>" >Remove</option>
                                                        <?php endif; ?>
                                                        <?php if ($brand->add_home == 'no'): ?>
                                                        <option value="yes|<?php echo $brand->vendor_id; ?>" >Add To Home</option>
                                                        <?php endif; ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <?php $x++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <?php endif; ?>
                                    </table>
                        		</form>
								<?php if ($total_num_rows == 0): ?>
                                <div class="alert alert-info">
                                  <strong>Info!</strong> No Vendor Added Yet.
                                </div>
                                <?php endif; ?>
                                
                                <div class="col-sm-12">
                                    <p class="category-pagination-sign"><?php echo $total_num_rows;  ?> result found.</p>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php echo $footer; ?>