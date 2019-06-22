<!--footer-->
<div class="footer">
 <div class="container">				 	
     <div class="col-md-3 col-sm-6 ftr_navi ftr">
         <h3>Quick Navigation</h3>
         <ul>
             <li><a href="<?php echo site_url(); ?>">Home</a></li>
             <li><a href="<?php echo site_url('about_us'); ?>">About</a></li>
             <li><a href="#">Training</a></li>						
             <li><a href="<?php echo site_url('contact_us'); ?>">Contact</a></li>
         </ul>
     </div>
     <div class="col-md-3 col-sm-6 ftr_navi ftr">
         <h3>Collections</h3>
         <ul>
         	<?php foreach($categorys as $category): ?>
             <li><a href="<?php echo site_url('category/' . $category['category_slug']); ?>"><?php echo $category['category_name']; ?></a></li>
             <?php endforeach; ?>
             
         </ul>
     </div>
     <div class="col-md-3 col-sm-6 get_in_touch ftr">
          <h3>Get In Touch</h3>
          <p>No_70, Udu Road</p>
          <p>Odibo Round-About</p>
          <p>Warri, Delta State.</p>
          <a href="mailto:mail@mlampah.com">Info@GellaFashion.com</a>
     </div>
     <div class="col-md-3 col-sm-6 ftr-logo">
          <a href="index.html"><img src="<?php echo base_url('assets/images/Gella_logo.png'); ?>" alt=""/></a>
         <p>&copy; 2017 Design by <a href="http://linkorion.com">LinkOrion</a></p>
     </div>
    <div class="clearfix"> </div>
 </div>
</div>
<!--/footer-->
<script type="text/javascript">
		$(document).ready(function() {
				/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
				*/
		$().UItoTop({ easingType: 'easeOutQuart' });
});
</script>
<a href="#to-top" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!----> 
