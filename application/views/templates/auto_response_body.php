<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN" "http://www.w3.org/TR/REC-html40/loose.dtd">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<title>A New Message</title>
<style type="text/css">
body {
	margin: 0;
	padding: 0;
}
p {
	color: #5a5151;
}
* {
	box-sizing: border-box;
}
div.email-container {
	width: 100%;
	height: auto;
	overflow: hidden;
	background-color: #585858;
}
div.container {
	width: 650px;
	height: auto;
	overflow: hidden;
	margin: 3em auto 0;
	background-color: #fff;
	box-shadow: 0 1px 3px #8a8585;
}
@media screen and (max-width: 700px) {
div.container {
	width: 100%;
	margin: 0 auto 0;
}
}
.div-padd-6 {
	width: 50%;
	height: auto;
	overflow: hidden;
	padding: 0 2%;
	float: left;
}
.clearfix {
	clear: both;
}
.company-logo, .quick-note {
	padding-top: 1em;
}
.company-logo img {
	max-width: 250px;
}
@media screen and (max-width: 490px) {
.div-padd-6 {
	width: 100%;
	float: none;
}
.company-logo {
	text-align: center;
}

}
.quick-note p {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 1em;
	margin-top: 0;
}
.div-padd-12 {
	width: 100%;
	padding: 0 2%;
	height: auto;
	overflow: hidden;
}
.invoice-no {
	margin: 2em 0;
	background-color: #C1C1C1;
	position: relative;
	color: #fff;
}
.invoice-no h3 {
	font-size: 1.6em;
	font-family: "Arial Black", Gadget, sans-serif;
	text-transform: uppercase;
}
.invoice-no p {
	font-size: 1em;
	font-family: Arial, Helvetica, sans-serif;
}
.invoice-to p {
	font-size: 1em;
	font-family: Arial, Helvetica, sans-serif;
	line-height: 30px;
}
.footer {
	background-color: #444444;
	text-align: center;
	color: #fff;
}
.footer h3 {
	font-family: "Arial Black", Gadget, sans-serif;
	font-size: 2em;
}
.footer p, ul li {
	color: #fff;
}
.footer {
	font-family: Arial, Helvetica, sans-serif;
}
.footer img {
	max-width: 200px;
}
</style>
</head>

<body>
<div class="email-container">
	<div class="container">
    	<div class="div-padd-6 company-logo">
        	<img src="<?php echo base_url(); ?>assets/images/OyaaNaw_food_logo.jpg" width="100%" align="oyaanaw logo">
        </div>
        <div class="div-padd-6 quick-note">
        	
        </div>
        <div class="clearfix"></div>
        <div class="div-padd-12 invoice-no">
        	<div>
            	<h3>THANK YOU FOR CONTACTING US</h3>
            </div>
        </div>
        <div class="div-padd-12 invoice-to">
            <p><strong><?php echo $firstName; ?>, </strong> <br>Thank You For Using Oyaanaw. Below Are Your Order Details From Madam Rice Run. A Staff will Call You to Confirm Your Order and Location For Quick Delivery Of Your Food.</p>
        </div>
        
        <div class="div-padd-12 footer">
        	<h3>About Us</h3>
            <img src="<?php echo base_url(); ?>assets/images/OyaaNaw_food_logo.jpg" width="100%" align="oyaanaw logo">
            <p>Was designed for opencart, magento, woocommerce and prestashop platforms. It is based on Bootstrap.</p>
            <ul>
                <li><i class="fa fa-phone"></i> [+234]805 8866 792</li>
                <li><i class="fa fa-inbox"></i> info@oyaanaw.com</li>
                <li><i class="fa fa-home"></i> Block 74, 22B Emma Abimbola Cole Strt, Lekki Phase 1, Lagos.</li>
            </ul>
        </div>
    </div>
</div>
</body>
</html>