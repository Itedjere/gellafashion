<!DOCTYPE HTML>
<html>
<head>
<title>Gella Latest Collection</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />
<meta name="keywords" content="Fashion, Design, pattern, clothes, ankara, wears, men, women, children, dress, tailor, native, sow, corporate, Gella, Nigeria, illustration, sketching, embroidery, models, hats, shoes, bags " />
<meta name="description" content="Gella house is a leading home for fashion in the south of Nigeria. We offer bespoke fashion design, in ankara, natives, or corporate wears for men, women and children. Gella Fashion also offers training programs for young fashion designers who want to become professionals in Pattern making, fashion illustration and embroidery. " />
<?php echo $home_header; ?>
</head>

<body>
<!--banner-starts-->
<!--banner-starts-->
<div class="banner about-banner">
    <div class="container">
        <div class="logo">
            <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url('assets/images/Gella_logo.png'); ?>" alt="" /></a>
        </div>
        <div class="banner-top about-banner-text">
            <p>Elegant designs for Men, Women &amp; Kids</p>
        </div>
    </div>
</div>
<!--banner-ends-->
<!--banner-ends--> 

<!--header-starts-->
<?php echo $home_navigation; ?>
<!--header-ends-->

<!--header-->
<div class="categoires">
	 <div class="container">
		 <a href="#">
             <div class="col-md-4 sections fashion-grid-a">
                 <h4>Fashion</h4>
                 <p>confidence</p>			 					
             </div>
         </a>
		 <a href="#">
             <div class="col-md-4 sections fashion-grid-b">
                 <h4>Fashion</h4>
                 <p>expression</p>			 					
             </div>
         </a>
		 <a href="#">
             <div class="col-md-4 sections fashion-grid-c">
                 <h4>Fashion</h4>
                 <p>Class</p>				
             </div>
         </a>
	 </div>
</div>
<!---->

<div class="features" id="features">
	 <div class="container">
		 <div class="tabs-box">
			<ul class="tabs-menu">
            <?php for($i = 0; $i < count($collections); $i++): ?>
            	<?php $m = $i+1; ?>
				<li><a href="#tab<?php echo $m; ?>"><?php echo $collections[$i]['category_name']; ?></a></li>
				<!--<li><a href="#tab2">Men</a></li>
				<li><a href="#tab3">Kids</a></li>-->
			<?php endfor; ?>
			</ul>
			<div class="clearfix"> </div>
		
             <div class="tab-grids">
             <?php for($i = 0; $i < count($collections); $i++): ?>
             <?php $m = $i+1; ?>
                 <div id="tab<?php echo $m; ?>" class="tab-grid<?php echo $m; ?>">
                 
                	<?php if (count($collections[$i]['product_details']) > 0) { ?>
                    
                 	<?php for($o = 0; $o < count($collections[$i]['product_details']); $o++): ?>
                    	
                     <div class="product-grid">				   				  
                         <a href="<?php echo site_url('product/' . $collections[$i]['category_slug'] . "/" . $collections[$i]['product_details'][$o]['product_slug']); ?>">				  
                            <!--<div class="more-product-info"><span>NEW</span></div>-->						
                            <div class="product-img b-link-stripe b-animate-go  thickbox">						   
                                <img src="<?php echo base_url('assets/images/products/'.$collections[$i]['product_details'][$o]['item_image_path']); ?>" class="img-responsive" alt=""/>
                                <div class="b-wrapper">
                                    <h4 class="b-animate b-from-left  b-delay03">							
                                    <button class="btns">ORDER NOW</button>
                                    </h4>
                                </div>
                            </div>					
                             <div class="product-info simpleCart_shelfItem">
                                <div class="product-info-cust">
                                    <h4><?php echo $collections[$i]['product_details'][$o]['product_name']; ?></h4>
                                    <span class="item_price">₦<?php echo $collections[$i]['product_details'][$o]['product_price']; ?></span>
                                    <input type="button" class="item_add" value="ORDER">
                                </div>													
                                <div class="clearfix"> </div>
                            </div>
						</a>	
                     </div>	
                     
					<?php endfor; ?>	
                    
                     <div class="clearfix"></div>
                     <div class="see_more"><a href="<?php echo site_url('category/' . $collections[$i]['category_slug']); ?>">SEE ALL</a></div>
                   <?php }else { ?>
                        <span style="font-family: 'Merriweather', serif;">No Product In This Collection Yet.</span>
                   <?php } ?>  
                 </div>
                 	
			<?php endfor; ?>
             </div>	
				
		 </div>
			<!-- tabs-box -->
			<!-- Comman-js-files -->
			<script>
			$(document).ready(function() {
				$("#tab2").hide();
				$("#tab3").hide();
				$(".tabs-menu a").click(function(event){
					event.preventDefault();
					var tab=$(this).attr("href");
					$(".tab-grid1,.tab-grid2,.tab-grid3").not(tab).css("display","none");
					$(tab).fadeIn("slow");
				});
				$("ul.tabs-menu li a").click(function(){
					$(this).parent().addClass("active a");
					$(this).parent().siblings().removeClass("active a");
				});
			});
			</script>
			<!-- Comman-js-files -->
	 </div>
</div>

<?php echo $home_footer; ?>
</body>
</html>
