<link href="<?php echo base_url('assets/css/bootstrap.css'); ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('assets/css/font-awesome.css'); ?>" rel='stylesheet' type='text/css' />
<link href="<?php echo base_url('assets/css/style1.css'); ?>" rel='stylesheet' type='text/css' />
<script src="<?php echo base_url('assets/js/jquery-1.11.0.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/agntscript.js'); ?>"></script>
<link href='http://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lato:100,300,400,700,900,100italic,300italic,400italic,700italic,900italic' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
<!---- start-smoth-scrolling---->
<script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/move-top.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/js/easing.js'); ?>"></script>
<script type="text/javascript">
			jQuery(document).ready(function($) {
				$(".scroll").click(function(event){		
					event.preventDefault();
					$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
				});
			});
		</script>
<!--start-smoth-scrolling-->