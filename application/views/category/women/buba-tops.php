<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $product_details[0]['product_name']; ?> :: Gella Product Page</title>
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
            <a href="index.html"><img src="<?php echo base_url('assets/images/Gella_logo.png'); ?>" alt="" /></a>
        </div>
        <div class="banner-top about-banner-text">
            <p>Gella Fashion - Elegant designs</p>
        </div>
    </div>
</div>
<!--banner-ends-->
<!--banner-ends--> 

<!--header-starts-->
<?php echo $home_navigation; ?>
<!--header-ends-->

<?php echo $product_body; ?>

<?php echo $home_footer; ?>
</body>
</html>
