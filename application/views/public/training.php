<!DOCTYPE HTML>
<html>
<head>
<title>Gella Fashion Training</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Vogue Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<?php echo $home_header; ?>
</head>

<body>
<!--banner-starts-->
<!--banner-starts-->
<div class="banner about-banner">
    <div class="container">
        <div class="logo">
            <a href="index.php"><img src="<?php echo base_url('assets/images/Gella_logo.png'); ?>" alt="" /></a>
        </div>
        <div class="banner-top about-banner-text">
            <p>Become A Fashion Professional</p>
        </div>
    </div>
</div>
<!--banner-ends-->
<!--banner-ends--> 

<!--header-starts-->
<?php echo $home_navigation; ?>
<!--header-ends-->

<div class="content">
    <div class="services">
        <div class="container">
            <div class="service-in">
                <div class="col-sm-4 span_2">
                    <a href="#" class="mask">
                    	<img src="<?php echo base_url('assets/images/z1.jpg'); ?>" alt="image" class="img-responsive zoom-img">
                    </a>
                    <div class="number-top">
                        <span class="number">01.</span>
                        <div class="number-in">
                            <h6>Our Training</h6>
                            <p>Our program is designed with a very robust curriculum that ensures you are well equipped with the best fashion skills.</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="border"> </div>
                </div>
                <div class="col-sm-4 span_2">
                    <a href="#" class="mask">
                        <img src="<?php echo base_url('assets/images/z1.jpg'); ?>" alt="image" class="img-responsive zoom-img">
                    </a>
                    <div class="number-top">
                        <span class="number">02.</span>
                        <div class="number-in">
                            <h6>The Instructors</h6>
                            <p>Our Instructors are dedicated to helping you learn all the best skills of the industry, we provide mentorship as well.</p>
                        </div>
                        <div class="clearfix"> </div>
                    </div>
                    <div class="border"> </div>
                </div>
                <div class="col-sm-4 span_2">
                    <a href="#" class="mask">
                        <img src="<?php echo base_url('assets/images/z1.jpg'); ?>" alt="image" class="img-responsive zoom-img">
                    </a>
                    <div class="number-top">
                        <span class="number">03.</span>
                        <div class="number-in">
                            <h6>Your Career</h6>
                            <p>With our training, you are guaranteed of getting the best footing in your fashion career. Why delay any further?</p>
                        </div>
                        <div class="clearfix"> </div>
                	</div>
                	<div class="border"> </div>
                </div>
            	<div class="clearfix"> </div>
            </div>	
        </div>
        <div class="service-top-in">
            <div class="container">
                <h5 class="best">FASHION CAREER</h5>
                <div class="ser-at">
                <p>The Gella Fashion Training program is open to everyone who wants to become a leader in the fashion industry. We are confident that by your joining us, the goal for your fashion career will be met. Fill the Training registration form below to get started!</p>
                
                </div>
                <div class="clearfix"> </div>
            </div>
        </div>
        
    </div>
</div>

<div class="contact-form">
	<div class="container flex-in">
    	<h4>REGISTER</h4>
		<?php
            if (isset($error) && !empty($error)) {
                echo $error;
            }
        ?>
        <?php echo validation_errors('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
        <?php echo form_open('training', 'id="commentform"'); ?>
        <!--<form>-->
            <input type="text" placeholder="Name" name="firstName" required="">
            <input type="email" placeholder="Email" name="userEmail" required="">
            <input type="text" placeholder="Telephone" name="userPhone" required="">
            <textarea type="text" name="userMessage" required="">Message...</textarea>
            <input type='hidden' name='form_type' value='training_form' id='form_type' />
            <button class="btn1 btn-1 btn-1b">Register</button>
        </form>
        <div class="clear"></div>
        <div id="contactFormErrorMessage" style="margin-top: 3em; display: none;">
            <div class="alert alert-info">
              <span><img src="<?php echo base_url('assets/images/loading.gif'); ?>" width="32" height="32"></span> Please Hold On While We Forward Your Message.
            </div>
        </div>
    </div>
</div>



<?php echo $home_footer; ?>
</body>
</html>
