<!DOCTYPE HTML>
<html>
<head>
<title>Login Gella Fashion House</title>
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
            <p>Welcome to the backend!</p>
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
        <h3>ADMIN LOGIN</h3>
        <div style="margin-top: 30px;">
        	<div class="col-sm-offset-4 col-sm-4">
				<?php
                    if (isset($login_error_message)) {
                        echo '<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>';
                        echo $login_error_message;
                        echo '</div>';
                    }
                ?>
                <?php echo validation_errors('<div class="alert alert-danger"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>', '</div>'); ?>
            </div>
        	<div class="col-sm-offset-4 col-sm-4">
            	<?php $attributes = array('class' => 'form-horizontal', 'role' => 'form'); ?>
            	<?php echo form_open('Admin/login', $attributes); ?>
                <!--<form role="form">-->
                    <div class="form-group">
                        <label for="email">Username:</label>
                        <input type="text" class="form-control" name="username" id="email" placeholder="Enter Username">
                    </div>
                    <div class="form-group">
                        <label for="pwd">Password:</label>
                        <input type="password" class="form-control" id="pwd" name="password">
                    </div>
                    <div class="checkbox">
                    	<label><input type="checkbox" name="remember" value="Yes"> Remember me</label>
                    </div>
                    <button type="submit" class="btn btn-default">Submit</button>
                </form>
              </div>
        </div>	
    </div>
</div>

<?php echo $home_footer; ?>
</body>
</html>
