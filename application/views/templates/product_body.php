<div class="product-main">
	 <div class="container">
		 <ol class="breadcrumb">
		  <li><a href="index.html">Home</a></li>
		  <li class="active">Single</li>
		 </ol>
		 <div class="ctnt-bar cntnt">
			 <div class="content-bar">
				 <div class="single-page">					 
					 <!--Include the Etalage files-->
						<link rel="stylesheet" href="<?php echo base_url('assets/css/etalage.css'); ?>">
						<script src="<?php echo base_url('assets/js/jquery.etalage.min.js'); ?>"></script>
					 <!-- Include the Etalage files -->
					 <script>
							jQuery(document).ready(function($){
					
								$('#etalage').etalage({
									thumb_image_width: 300,
									thumb_image_height: 400,
									source_image_width: 700,
									source_image_height: 800,
									show_hint: true,
									click_callback: function(image_anchor, instance_id){
										alert('Callback example:\nYou clicked on an image with the anchor: "'+image_anchor+'"\n(in Etalage instance: "'+instance_id+'")');
									}
								});
								// This is for the dropdown list example:
								$('.dropdownlist').change(function(){
									etalage_show( $(this).find('option:selected').attr('class') );
								});
					
							});
						</script>
						<!--//details-product-slider-->
					 <div class="details-left-slider">
						  <ul id="etalage">
                          <?php for($i = 0; $i < count($product_details[0]['item_pictures']); $i++): ?>
							 <li>
								<a href="optionallink.html">
								<img class="etalage_thumb_image" src="<?php echo base_url('assets/images/products/'.$product_details[0]['item_pictures'][$i]); ?>" />
								<img class="etalage_source_image" src="<?php echo base_url('assets/images/products/'.$product_details[0]['item_pictures'][$i]); ?>" />
								</a>
							 </li>
							<?php endfor; ?>
							 <div class="clearfix"></div>
						 </ul>
					 </div>
					 <div class="details-left-info">
							<h3><?php echo $product_details[0]['product_name']; ?></h3>
							<!--<h4>Red and Black Colors </h4>-->
                            <h5>Description  ::</h5>
							<p class="desc"><?php echo $product_details[0]['product_description']; ?></p>
                            							
							<div class="btn_form">
								<a href="#" class="send_message">MAKE ORDER</a>
							</div>
							<div class="flower-type">
							<p>Category  ::<a href="<?php echo site_url('category/' . $main_category_slug); ?>"><?php echo $main_category_name; ?></a></p>
							<!--<p>Type  ::<a href="#">Ankara</a></p>-->
							</div>
                            
                            <p>₦<?php echo $product_details[0]['product_price']; ?> <a href="#" class="send_message">Click to Order</a></p>
					 </div>
					 <div class="clearfix"></div>				 	
				 </div>
			 </div>
		 </div>		 
		 <div class="clearfix"></div>
         
         <div class="contact-form" id="tab-reviews">
            <h4 style="margin-bottom: 15px;">MAKE ORDER FOR THIS PRODUCT NOW</h4>
            <?php
				if (isset($error) && !empty($error)) {
					echo $error;
				}
			?>
			<?php echo validation_errors('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
			<?php echo form_open(current_url(), 'id="commentform"'); ?>
            <!--<form>-->
                <input type="text" placeholder="Name" name="firstName" required="">
                <input type="email" placeholder="Email" name="userEmail" required="">
                <input type="text" placeholder="Telephone" name="userPhone" required="">
                <textarea type="text" name="userMessage" required="">Message...</textarea>
                <input type='hidden' name='form_type' value='advertiser_form' id='form_type' />
                <input type='hidden' name='product_name' value='<?php echo $product_details[0]['product_name']; ?>' id='product_name' />
                <input type='hidden' name='product_id' value='<?php echo $product_details[0]['product_id']; ?>' id='product_id' />
                <input type='hidden' name='category' value='<?php echo $main_category_name; ?>' id='category' />
                <button class="btn1 btn-1 btn-1b">Order</button>
            </form>
            <div id="contactFormErrorMessage" style="margin-top: 3em; display: none;">
                <div class="alert alert-info">
                  <span><img src="<?php echo base_url('assets/images/loading.gif'); ?>" width="32" height="32"></span> Please Hold On While We Forward Your Message.
                </div>
            </div>
        </div>
        
		 <div class="single-bottom2">
			 <h6>Related Products</h6>
				<div class="rltd-posts">
                <?php for($i = 0; $i < count($recommended_products); $i++): ?>
					 <div class="col-sm-3 col-md-3 pst1">
						 <img src="<?php echo base_url('assets/images/products/'.$recommended_products[$i]['item_pictures']['item_image_path']); ?>" alt="<?php echo $recommended_products[$i]['product_name']; ?>"/>
						 <h4><a href="<?php echo site_url('product/' . $main_category_slug . "/" . $recommended_products[$i]['product_slug']); ?>"><?php echo $recommended_products[$i]['product_name']; ?></a></h4>
						 <a class="pst-crt" href="<?php echo site_url('product/' . $main_category_slug . "/" . $recommended_products[$i]['product_slug']); ?>">SEE DETAILS</a>
					 </div>
				<?php endfor; ?>
					 <div class="clearfix"></div>
				</div>
		 </div>	
	 </div>
</div>