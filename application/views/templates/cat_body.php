<div class="features" id="features">
	 <div class="container">
     	
		 <div class="tabs-box">
         	<h3 class="m_1"><span><?php echo strtoupper($main_category_name); ?> COLLECTIONS</span></h3>
			<div class="clearfix"> </div>
             <div class="tab-grids">
                 <div id="tab1" class="tab-grid1">
                 <?php for($i = 0; $i < count($collections); $i++): ?>
                     <div class="product-grid">				   				  
                         <a href="<?php echo site_url('product/' . $main_category_slug . "/" . $collections[$i]['product_slug']); ?>">				  
                            <!--<div class="more-product-info"><span>NEW</span></div>-->						
                            <div class="product-img b-link-stripe b-animate-go  thickbox">						   
                                <img src="<?php echo base_url('assets/images/products/'.$collections[$i]['item_pictures']['item_image_path']); ?>" class="img-responsive" alt=""/>
                                <div class="b-wrapper">
                                    <h4 class="b-animate b-from-left  b-delay03">							
                                    <button class="btns">ORDER NOW</button>
                                    </h4>
                                </div>
                            </div>						
                             <div class="product-info simpleCart_shelfItem">
                                <div class="product-info-cust">
                                    <h4><?php echo $collections[$i]['product_name']; ?></h4>
                                    <span class="item_price">₦<?php echo $collections[$i]['product_price']; ?></span>
                                    <input type="button" class="item_add" value="ORDER">
                                </div>													
                                <div class="clearfix"> </div>
                            </div>
						</a>
                     </div>	
				<?php endfor; ?>
                    <div class="clearfix"></div>
                 </div>
             </div>				
		 </div>
	 </div>
</div>