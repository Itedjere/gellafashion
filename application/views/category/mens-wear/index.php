<!DOCTYPE HTML>
<html>
<head>
<title><?php echo $main_category_name; ?> Collection</title>
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

<?php echo $cat_body; ?>

<?php echo $home_footer; ?>
</body>
</html>
