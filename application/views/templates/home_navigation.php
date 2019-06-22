<div class="header-bottom">
 <div class="fixed-header">
    <div class="container">
        <div class="top-menu">
                <span class="menu"><img src="<?php echo base_url('assets/images/nav-icon.png'); ?>" alt="" /></span>
                <ul class="nav">
                    <li><a class="<?php echo $nav['home']; ?>" href="<?php echo site_url(); ?>">Home</a></li>
                    <li><a class="<?php echo $nav['about']; ?>" href="<?php echo site_url('about_us'); ?>">About</a></li>
                    <li><a class="<?php echo $nav['collect']; ?>" href="<?php echo site_url('collections'); ?>">Collections</a></li>
                    <li><a class="<?php echo $nav['training']; ?>" href="<?php echo site_url('training'); ?>">Training</a></li>
                    <li><a class="<?php echo $nav['contact']; ?>" href="<?php echo site_url('contact_us'); ?>">Contact</a></li>
                </ul>	
                <!-- script for menu -->
                    <script>
                    $( "span.menu" ).click(function() {
                      $( "ul.nav" ).slideToggle( "slow", function() {
                        // Animation complete.
                      });
                    });
                </script>
                <!-- script for menu -->
        </div>
        <div class="header-right">
            <ul>
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
            </ul>
        </nav>		
        </div>
        <div class="clearfix"></div>
        <script>
    $(document).ready(function() {
         var navoffeset=$(".header-bottom").offset().top;
         $(window).scroll(function(){
            var scrollpos=$(window).scrollTop(); 
            if(scrollpos >=navoffeset){
                $(".header-bottom").addClass("fixed");
            }else{
                $(".header-bottom").removeClass("fixed");
            }
         });
         
    });
    </script>
    </div>
 </div>
 </div>