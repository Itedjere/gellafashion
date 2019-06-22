<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Food List</title>

<meta name="keywords" content="">
<meta name="description" content="">

<?php echo $header; ?>
   
<div class="right_col" role="main" style="min-height: 859px;">

    <div class="box_padding_all">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-home"></i> <a href="<?php echo site_url('Admin'); ?>">Home</a> / <a href="<?php echo site_url('Admin/foods'); ?>">Foods</a> / Add Food To Home</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
                <div class="x_panel container-space">
                	<div class="show_items header-div-12">
                    	<div class="col-xs-1">
                        	<i class="fa fa-android"></i>
                        </div>
                        <div class="col-xs-11">
                        	<span id="total_number_of_foods"><?php echo $total_num_rows; ?></span>
                            <p>Total Number Of Foods</p>
                            <a href="<?php echo site_url('Admin/add_food'); ?>" class="btn btn-success btn-md"> <i class="fa fa-plus"></i> Add New Food</a>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 x_content div_pad_12">
                        <div class="header-top-border">
                            <div class="col-sm-4">
                                <i class="fa fa-angle-double-right"></i> Food Items
                            </div>
                            <div class="col-sm-4">
                                <div id="showloadingicon" style="display: none; color: #F00;">
                                    <img src="<?php echo base_url('assets/images/loading.gif'); ?>" width="32" height="32" />
                                    Fetching Food Details...
                                </div>
                            </div>
                            <div class="col-sm-4" style="text-align: right;">
                                
                            </div>
                        </div>
                        <div class="content_body">
                        	<form role="form" name="orders">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th style="width: 10%">S/N</th>
                                            <th style="width: 20%">Name</th>
                                            <th style="width: 10%">Price (NGN)</th>
                                            <th style="width: 20%">Vendor</th>
                                            <th style="width: 20%">Menu</th>
                                            <th style="width: 10%">Added To Home</th>
                                            <th style="width: 10%">Edit</th>
                                        </tr>
                                    </thead>
                                    <?php if ($total_num_rows > 0): ?>
                                    <?php $x = 1; ?>
                                    <tbody id="display_food_details">
                                        <?php foreach($foods as $food): ?>
                                        
                                        <tr>
                                            <td class="text-center">
                                                <?php echo $x; ?>
                                            </td>
                                            <td><?php echo $food->food_name; ?></td>
                                            <td><?php echo $food->food_price; ?></td>
                                            <td><?php echo $food->vendor_name; ?></td>
                                            <td><?php echo $food->category_name; ?></td>
                                            <td>
												<?php if ($food->add_home == 'yes'): ?>
                                                <button type="button" class="btn btn-success btn-xs"><i class="fa fa-check" aria-hidden="true"></i> Yes</button>
                                                <?php endif; ?>
                                                <?php if ($food->add_home == 'no'): ?>
                                                <button type="button" class="btn btn-warning btn-xs"><i class="fa fa fa-exclamation-triangle" aria-hidden="true"></i> No&nbsp;</button>
                                                <?php endif; ?>
                                            </td>
                                            <td>
                                                <select onChange="addRemoveFoodFromHome(this)">
                                                    <option value="" >Change Status</option>
                                                    <?php if ($food->add_home == 'yes'): ?>
                                                    <option value="no|<?php echo $food->food_id; ?>" >Remove</option>
                                                    <?php endif; ?>
                                                    <?php if ($food->add_home == 'no'): ?>
                                                    <option value="yes|<?php echo $food->food_id; ?>" >Add To Home</option>
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
                              <strong>Info!</strong> No Food Item Added Yet.
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php echo $footer; ?>