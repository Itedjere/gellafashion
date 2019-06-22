<!DOCTYPE HTML>
<html>
<head>
<title>Gella Fashion House - Fashion Best</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="assets/images/favicon.ico" type="image/x-icon" />
<meta name="keywords" content="Fashion, Design, pattern, clothes, ankara, wears, men, women, children, dress, tailor, native, sow, corporate, Gella, Nigeria, illustration, sketching, embroidery, models, hats, shoes, bags " />
<meta name="description" content="Gella house is a leading home for fashion in the south of Nigeria. We offer bespoke fashion design, in ankara, natives, or corporate wears for men, women and children. Gella Fashion also offers training programs for young fashion designers who want to become professionals in Pattern making, fashion illustration and embroidery. " />
<?php echo $home_header; ?>
<link href="<?php echo base_url('assets/css/style.css'); ?>" rel='stylesheet' type='text/css' />
</head>

<body>
<!--banner-starts-->
<div class="bnr" id="home">
    <div  id="top" class="callbacks_container">
        <ul class="rslides" id="slider4">
            <li>
                <div class="banner">
                    <div class="container">
                        <div class="logo">
                            <a href="<?php echo site_url(); ?>"><img src="<?php echo base_url('assets/images/Gella_logo.png'); ?>" alt="" /></a>
                        </div>
                        <div class="banner-top">
                           <!-- <p>Gella - The Home of Fashion</p>-->
                        </div>
                        <!--<div class="banner-text">
                            <h1>Nulla elementum quam lacinia</h1>
                            <h2>Proin enim nisi</h2>
                        </div>-->
                    </div>
                </div>
            </li>
            
            
            
           <!-- <li>
                <div class="banner-1">
                    <div class="container">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/Gella_logo.png" alt="" /></a>
                        </div>
                        <div class="banner-top">
                            <p>Leading Home for Creativity in Fashion </p>
                        </div>
                       
                    </div>
                </div>
            </li>
            -->
            
            
           <!-- <li>
                <div class="banner-2">
                    <div class="container">
                        <div class="logo">
                            <a href="index.html"><img src="assets/images/Gella_logo.png" alt="" /></a>
                        </div>
                        <div class="banner-top">
                            <p>Professional Design Made to Fit</p>
                        </div>
                       
                    </div>
                </div>
            </li>-->
            
            
            
            
        </ul>
    </div>
    <div class="clearfix"> </div>
</div>
<!--banner-ends--> 
<!--Slider-Starts-Here-->
            <script src="<?php echo base_url('assets/js/responsiveslides.min.js'); ?>"></script>
         <script>
            // You can also use "$(window).load(function() {"
            $(function () {
              // Slideshow 4
              $("#slider4").responsiveSlides({
                auto: true,
                pager: false,
                nav: true,
                speed: 500,
                namespace: "callbacks",
                before: function () {
                  $('.events').append("<li>before event fired.</li>");
                },
                after: function () {
                  $('.events').append("<li>after event fired.</li>");
                }
              });
        
            });
          </script>
        <!--End-slider-script-->
<!--header-starts-->
<?php echo $home_navigation; ?>
<!--header-ends-->
<!--about-->
<div class="about">
	<div class="container">
		<div class="top-text">
				<h3>Welcome</h3>
				<h4>Gella Fashion House is a leading home for bespoke fashion in the south of Nigeria</h4>
				<p>We provide exquisite urban wears for men, women and children using indigenous materials and fabrics, such as Ankara, Adire and Kente. Gella Fashion House also offers exclusive training for upcoming designers, fashion illustrators and pattern making.</p>
		</div>
	</div>
</div>
<!--banner-bottom-->
<div class="banner-bottom">
    <div class="container">
    	<h3>What We Do</h3>
        <div class="banner-grids">
            <div class="col-md-7 banner-grids-info">					
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/images/g4.jpg'); ?>" alt="">
                    <div class="captn">
                        <span>Fashion Illustration</span>
                    </div>
                </a>
            </div>
            <div class="col-md-5 banner-grids-info">
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/images/g5.jpg'); ?>" alt="">
                    <div class="captn">
                        <span>Embroidery</span>
                    </div>
                </a>	
                <a href="#">
                    <img class="img-responsive" src="<?php echo base_url('assets/images/g6.jpg'); ?>" alt="">
                    <div class="captn">
                        <span>Pattern Making</span>
                    </div>
                </a>
            </div>							
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//banner-bottom-->
<!--grid-hover-->
<div class="index-portfilio">
    <div class="container">
        <h3>Latest Collections</h3>
        <p class="index-p">We make ensure the best finishings for our product and deliver on time. View our collections for Men, Women and Children for wears in, Corporate, Native, Ankara, Agbada, Kente etc</p>
           <div class="grid">
           	<?php foreach($fetch_featured_products as $product): ?>
            	<figure class="effect-layla">
                    <img src="<?php echo base_url('assets/images/products/'.$product['item_pictures']['item_image_path']); ?>" alt="<?php echo $product['category_name']; ?>"/>
                    <figcaption>
                        <h2><a href="<?php echo site_url('category/' . $product['category_slug']); ?>"><?php echo $product['category_name']; ?> <span>Collection</span></a></h2>
                        <!--<p>View this product in our latest collection.</p>-->
                        <a class="product" href="<?php echo site_url('product/' . $product['category_slug'] . "/" . $product['product_slug']); ?>">View this product in our latest collection.</a>
                    </figcaption>			
                </figure>
            <?php endforeach; ?>
                
                <!--<figure class="effect-layla">
                    <img src="<?php //echo base_url('assets/images/c4.jpg'); ?>" alt="img03"/>
                    <figcaption>
                        <h2>Men <span>Collection</span></h2>
                        <p>View this product in our latest collection.</p>
                        <a href="#">View more</a>
                    </figcaption>			
                </figure>
                <figure class="effect-layla">
                    <img src="<?php //echo base_url('assets/images/c2.jpg'); ?>" alt="img03"/>
                    <figcaption>
                        <h2>Kids <span>Collection</span></h2>
                        <p>View this product in our latest collection.</p>
                        <a href="#">View more</a>
                    </figcaption>			
                </figure>
                <figure class="effect-layla">
                    <img src="<?php //echo base_url('assets/images/c5.jpg'); ?>" alt="img03"/>
                    <figcaption>
                        <h2>Women <span>Collection</span></h2>
                        <p>View this product in our latest collection.</p>
                        <a href="#">View more</a>
                    </figcaption>			
                </figure>
                <figure class="effect-layla">
                    <img src="<?php //echo base_url('assets/images/c6.jpg'); ?>" alt="img03"/>
                    <figcaption>
                        <h2>Men <span>Collection</span></h2>
                        <p>View this product in our latest collection.</p>
                        <a href="#">View more</a>
                    </figcaption>			
                </figure>
                <figure class="effect-layla">
                    <img src="<?php //echo base_url('assets/images/c2.jpg'); ?>" alt="img03"/>
                    <figcaption>
                        <h2>Kids <span>Collection</span></h2>
                        <p>View this product in our latest collection.</p>
                        <a href="#">View more</a>
                    </figcaption>			
                </figure>-->
                <div class="clearfix"> </div>
            </div>
        </div>
</div>
<!--grid-hover-->
<!--style-starts-->
<div class="style">
    <div class="container">
        <div class="style-text">
            <h3>YOUR STYLE</h3>
            <p>At Gella Fashion House we pride ourselves for creativity and perfection. We do customized design for our customers, ensuring they look beautiful and elegant. Do you want to rock that marriage party, wedding gown or tailor-made suit?</p>
            <div class="s-btn">
                <a href="single.html">Contact Us Today!</a>
            </div>
        </div>
    </div>
</div>
<!--style-ends-->
<!--testimonials-starts-->
<div class="testimonials">
    <div class="container">
        <div class="testimonials-top">
            <h3>WHAT PEOPLE SAY</h3>
            <p>See what some of our satisfied customers are saying about us</p>
        </div>
        <div class="testimonials-bottom">
            <div  id="top" class="callbacks_container">
                <ul class="rslides" id="slider5">
                    <li>
                        <div class="t-bottom">
                            <h5>Kelly</h5>
                            <p>Gella Fashion House is truly great at what they do. They keep amazing me with the perfect fit each time I make a dress with them. Their finishing is superb, and they have always delivered on time. Their service delivery is simply amazing.  </p>
                        </div>
                    </li>
                    <li>
                        <div class="t-bottom">
                             <h5>Tiwa-Savage </h5>
                            <p>Gella Fashion House is truly great at what they do. They keep amazing me with the perfect fit each time I make a dress with them. Their finishing is superb, and they have always delivered on time. Their service delivery is simply amazing.  </p>
                        </div>
                    </li>
                    <li>
                        <div class="t-bottom">
                             <h5>Davido</h5>
                            <p>Gella Fashion House is truly great at what they do. They keep amazing me with the perfect fit each time I make a dress with them. Their finishing is superb, and they have always delivered on time. Their service delivery is simply amazing.  </p>
                        </div>
                    </li>
                </ul>
        </div>
        <div class="clearfix"> </div>
        </div>
    </div>
</div>
<!--testimonials-ends-->
<!--Slider-Starts-Here-->
<script>
// You can also use "$(window).load(function() {"
$(function () {
  // Slideshow 5
  $("#slider5").responsiveSlides({
	auto: true,
	pager: true,
	nav: false,
	speed: 500,
	namespace: "callbacks",
	before: function () {
	  $('.events').append("<li>before event fired.</li>");
	},
	after: function () {
	  $('.events').append("<li>after event fired.</li>");
	}
  });

});
</script>
<!--End-slider-script-->

<?php echo $home_footer; ?>
</body>
</html>
