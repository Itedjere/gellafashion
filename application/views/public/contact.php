<!DOCTYPE HTML>
<html>
<head>
<title>Contact Gella Fashion House</title>
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
            <a href="index.php"><img src="<?php echo base_url('assets/images/Gella_logo.png'); ?>" alt="" /></a>
        </div>
        <div class="banner-top about-banner-text">
            <p>We would love to hear from you!</p>
        </div>
    </div>
</div>
<!--banner-ends-->
<!--banner-ends--> 

<!--header-starts-->
<?php echo $home_navigation; ?>
<!--header-ends-->

<!--contact-->
<div class="contact">
    <div class="container">
        <h3>CONTACT US</h3>
        <div class="map">
            <h4>HOW TO FIND US :</h4>
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3971.281051704326!2d5.784252347096304!3d5.525253838435671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x1041b2be3ebbd3c9%3A0x365f874768dbc4a4!2sGrowing+team+shop!5e0!3m2!1sen!2sng!4v1510358135592"></iframe>

        </div>
        <div class="address">
            <div class="col-md-4 address-grids">
                <h4>ADDRESS :</h4>
                <ul>
                    <li><p>No>70 Udu Road,<br>
                            Odibo Rd.about,<br>
                            Warri, Delta State</p>
                    </li>
                </ul>
            </div>
            <div class="col-md-4 address-grids">
                <h4>CONTACT NO :</h4>
                <p>+07058888777</p>
                <p>+07058888777</p>
            </div>
            <div class="col-md-4 address-grids">
                <h4>EMAIL :</h4>
                <p><a href="mailto:example@email.com">info@gellafashion.com</a></p>
            </div>
            <div class="clearfix"> </div>
        </div>
        <div class="contact-infom">
            <h4>INFORMATION ABOUT US :</h4>
            <p>Please you are free to send us a message or follow us on our social media platforms and help us serve you better. If you wish to make use of any of our support services simply contact us Here.</p>
        </div>	
        <div class="contact-form">
            <h4>SEND US A MESSAGE</h4>
            <?php
				if (isset($error) && !empty($error)) {
					echo $error;
				}
			?>
			<?php echo validation_errors('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
			<?php echo form_open('contact_us', 'id="commentform"'); ?>
            <!--<form>-->
                <input type="text" placeholder="Name" name="firstName" required="">
                <input type="email" placeholder="Email" name="userEmail" required="">
                <input type="text" placeholder="Telephone" name="userPhone" required="">
                <textarea type="text" name="userMessage" required="">Message...</textarea>
                <input type='hidden' name='form_type' value='contact_form' id='form_type' />
                <button class="btn1 btn-1 btn-1b">Contact Us</button>
            </form>
            <div class="clear"></div>
                <div id="contactFormErrorMessage" style="margin-top: 3em; display: none;">
                    <div class="alert alert-info">
                      <span><img src="<?php echo base_url('assets/images/loading.gif'); ?>" width="32" height="32"></span> Please Hold On While We Forward Your Message.
                    </div>
                </div>
          </div>
        </div>	
    </div>
</div>

<?php echo $home_footer; ?>
</body>
</html>
