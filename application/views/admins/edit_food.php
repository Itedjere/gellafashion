<!DOCTYPE html>
<html class=" " lang="en"><head>
<title>Update Product Details</title>

<meta name="keywords" content="">
<meta name="description" content="">

<?php echo $header; ?>

<script type="text/javascript">
var abc = 0; //Declaring and defining global increement variable

$(document).ready(function() {

//To add new input file field dynamically, on click of "Add More Files" button below function will be executed
    $('#add_more').click(function() {
		var fieldHTML = '<div class="col-sm-4"><input type="file" class="input-file-upload" name="userFile[]" id="file" /></div>'; 
        $(this).parent().before(fieldHTML);
    });
//following function will executes on change event of file input to select different file	
$('body').on('change', '#file', function(){
            if (this.files && this.files[0]) {
                 abc += 1; //increementing global variable by 1
				
				var z = abc - 1;
                var x = $(this).parent().find('#previewimg' + z).remove();
                $(this).before("<div id='abcd"+ abc +"' class='equal-img-height'><img id='previewimg" + abc + "' src='' width='100%'/></div>");
               
			    var reader = new FileReader();
                reader.onload = imageIsLoaded;
                reader.readAsDataURL(this.files[0]);
               
			    $(this).hide();
                $("#abcd"+ abc).append($("<img/>", {id: 'img', src: '<?php echo base_url('assets/images/x.png'); ?>', alt: 'delete'}).click(function() {
                $(this).parent().parent().remove();
                }));
            }
        });

//To preview image     
    function imageIsLoaded(e) {
        $('#previewimg' + abc).attr('src', e.target.result);
    };
});
</script>
   
<div class="right_col" role="main" style="min-height: 859px;">

    <div class="box_padding_all">
        <div class="page-title">
            <div class="title_left">
                <h3><i class="fa fa-home"></i> <a href="<?php echo site_url('Admin'); ?>">Home</a> / <a href="<?php echo site_url('Admin/products'); ?>">Products</a> / Update Product Details</h3>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12">
            	
                <div class="x_panel container-space">
                    <div class="col-sm-12 x_content div_pad_12">
                    	<div class="header-bottom-border">
                        	<i class="fa fa-download"></i> Update Product Details
                        </div>
                        <div class="content_body">
                        	<?php
								if (isset($error) && !empty($error)) {
									echo "<div class='clearfix'>" . $error . "</div>";
								}
								if (isset($msg) && !empty($msg)) {
									echo "<div class='clearfix'>" . $msg . "</div>";
								}
							?>
                            <div class="clearfix">
                        	<?php echo validation_errors('<div class="alert alert-danger col-sm-offset-2 col-sm-8"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
                            </div>
                            <?php $attributes = array('class' => 'form-horizontal', 'id' => 'add_food', 'role'	=>	'form'); ?>
							<?php echo form_open_multipart('Admin/edit_product/'.$food_details[0]['product_id'], $attributes); ?>
                            <!--<form class="form-horizontal" role="form">-->
                                <div class="form-group">
                                	<label class="control-label col-sm-2" for="email">Category:</label>
                                    <div class="col-sm-8">
                                    	<select class="form-control" id="category_id" name="category_id">
                                        	<option value="" selected>Select Category</option>
                                            <?php foreach($categories as $category): ?>
                                            <option value="<?php echo $category->category_id; ?>" <?php echo ($category->category_id == $food_details[0]['product_category_id']) ? 'selected="selected"' : ''; ?>><?php echo $category->category_name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                        <input type="hidden" name="hidden_category_id" value="<?php echo $food_details[0]['category_id']; ?>">
                                        <input type="hidden" name="hidden_category_slug" value="<?php echo $food_details[0]['category_slug']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-2" for="food_name">Name/Title:</label>
                                    <div class="col-sm-8">
                                    	<input type="text" class="form-control" name="food_name" id="food_name" placeholder="Enter Product Name" value="<?php echo $food_details[0]['product_name']; ?>">
                                        <input type="hidden" name="hidden_slug" value="<?php echo $food_details[0]['product_slug']; ?>">
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-2" for="pwd">Description:</label>
                                    <div class="col-sm-8">    
                                    	<textarea class="form-control" name="food_description" id="food_description" placeholder"Enter Product Description"><?php echo $food_details[0]['product_description']; ?></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                	<label class="control-label col-sm-2" for="product_price">Price:</label>
                                    <div class="col-sm-8">
                                    	<input type="text" class="form-control" name="product_price" id="product_price" placeholder="Enter Product Price" value="<?php echo $food_details[0]['product_price']; ?>">
                                    </div>
                                </div>
                               <div class="form-group">
                               		<div class="col-sm-offset-2 col-sm-8">
                                		<label>Product Pictures:</label>
                                    </div>
                                    <div class="col-sm-offset-2 col-sm-8">
                                    <?php if (isset($food_details[0]['item_pictures']) && count($food_details[0]['item_pictures']) > 0): ?>
                                    	<?php foreach($food_details[0]['item_pictures'] as $pics): ?>
                                        <div class="col-sm-4">
                                            <input type="hidden" id="del_image_id" value="<?php echo $pics['image_id']; ?>" />
                                            <input type="hidden" id="product_id" value="<?php echo $food_details[0]['product_id']; ?>" />
                                            <div class="equal-img-height">
                                            	<input type="hidden" name="hidddenuserFile[]" value="<?php echo $pics['item_image_path']; ?>" />
                                                <img src="<?php echo base_url('assets/images/products/' . $pics['item_image_path']); ?>" width="100%" />
                                                <img src="<?php echo base_url('assets/images/x.png'); ?>" class="img_deletor" width="20" height="20" />
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
									<?php endif; ?>
                                        
                                        <div class="col-sm-4">
                                            <input type="file" class="input-file-upload" name="userFile[]" id="file" />
                                          </div>
                                          
                                          
                                          <div class="col-sm-12 btn-margin-top">
                                            <button type="button" class="btn btn-default" id="add_more"><i class="fa fa-plus"></i> Add More</button>
                                          </div>
                                    </div>
                                </div>
                                
                                <div class="form-group">        
                                    <div class="col-sm-offset-2 col-sm-11">
                                    	<button type="submit" class="btn btn-success">SAVE <i class="fa fa-save"></i></button>
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