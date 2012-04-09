<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="A3, A3 online, a3 online game, a3 private server, a3 game, free online game, free private server, free a3, free a3 game online, revive, a3 revive, revive online game, free a3 revive" />
<meta name="description" content="This is an Account Management Tools for  <?php echo $this->config->item('homepage'); ?> Online Games to modify their character" />
<link href="<?=base_url()?>css/templatemo_style.css" rel="stylesheet" type="text/css" />
<link href="<?=base_url()?>css/jquery.ennui.contentslider.css" rel="stylesheet" type="text/css" media="screen,projection" />

<link rel="stylesheet" type="text/css" href="<?=base_url()?>css/popup.css" media="screen" />
<script type="text/javascript" src="<?=base_url()?>js/popups.js"></script>
<script type="text/javascript" src="<?=base_url()?>js/popupbox.js"></script>
<link rel="icon" href="<?=site_url()?>images/favicon.ico" type="image/x-icon" />
<title><?=$this->config->item('homepage')?> Account Management Tools</title>

<script language="javascript" type="text/javascript">
function clearText(field)
{
    if (field.defaultValue == field.value) field.value = '';
    else if (field.value == '') field.value = field.defaultValue;
}
</script>
</head>
<body>

<div id="templatemo_wrapper">

	<div id="templatemo_header">
    
    	<div id="site_title">
            <h1>

			<?php start_block_marker('site_title'); ?>
			<?php end_block_marker(); ?>
			
			
			</h1>
      	</div>
        
        <div id="search_box">
		
		<?php start_block_marker('search_box'); ?>
		<?php end_block_marker(); ?>

        </div>
        
        <div class="cleaner"></div>
	</div> <!-- end of header -->
    
    
		<div id="templatemo_menu">

		<?php start_block_marker('templatemo_menu'); ?>
		<?php end_block_marker(); ?>

    	</div> <!-- end of templatemo_menu -->
    
    <div id="templatemo_content_wrapper"><span class="top"></span><span class="bottom"></span>
        <div id="templatemo_content">
        
            <div id="templatemo_slider">
            
                <div id="one" class="contentslider">
                    <div class="cs_wrapper">
                        <div class="cs_slider">



				<?php start_block_marker('cs_slider'); ?>
				<?php end_block_marker(); ?>





                        </div><!-- End cs_slider -->
                    </div><!-- End cs_wrapper -->
                </div><!-- End contentslider -->
                
                <!-- Site JavaScript -->
                <script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
                <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
                <script type="text/javascript" src="js/jquery.ennui.contentslider.js"></script>
                <script type="text/javascript">
                    $(function() {
                    $('#one').ContentSlider({
                    width : '600px',
                    height : '240px',
                    speed : 600,
                    easing : 'easeInOutQuart'
                    });
                    });
                </script>
                <script src="js/jquery.chili-2.2.js" type="text/javascript"></script>
                <script src="js/chili/recipes.js" type="text/javascript"></script>
                <div class="cleaner"></div>
            </div> <!-- end of templatemo_slider -->  
            
            <h2>
			
				<?php start_block_marker('page_title'); ?>
				<?php end_block_marker(); ?>

			</h2>
            
            <div class="service_box float_l">
                 
                 <!-- <div class="service_image">
                    <img src="images/icon_01.png" alt="image 1" />
                 </div> -->
                <!-- <div class="service_text"> -->

				<?php start_block_marker('service_box_float_l'); ?>
				<?php end_block_marker(); ?>

                    <!-- <div class="button"><a href="services.html">details</a></div> -->
                <!-- </div> -->
                 
            </div>
            
            <div class="service_box float_r">
            
                <!-- <div class="service_image">
                    <img src="images/icon_02.png" alt="image 2" />
                 </div> -->
                <!-- <div class="service_text"> -->
				
				<?php start_block_marker('service_box_float_r'); ?>
				<?php end_block_marker(); ?>

                     <!-- <div class="button"><a href="services.html">details</a></div> -->
                <!-- </div> -->
                
            </div>
            
			<div class="cleaner_h40"></div>

				<?php start_block_marker('cleaner_h40a'); ?>
				<?php end_block_marker(); ?>

			<div class="cleaner_h40"></div>

				<?php start_block_marker('cleaner_h40b'); ?>
				<?php end_block_marker(); ?>

        </div> <!-- end of templatemo_content -->
        
	<div id="templatemo_sidebar">
            
            <div class="section_rss_twitter">

                <div class="rss_twitter twitter">
				<!--
                <a href="http://www.templatemo.com/page/1" target="_parent">FOLLOW US <span>on Twitter</span></a>
				-->
				<div  id="templatemo_menu">

				<?php start_block_marker('templatemo_menu_side'); ?>
				<?php end_block_marker(); ?>

				</div>
				</div>

                <div class="margin_bottom_20"></div>
                <div class="rss_twitter rss">
				<!--
                <a href="http://www.templatemo.com/page/2" target="_parent">SUBSCRIBE <span>our feed</span></a>
				-->
                </div>
            </div>
            
            <div id="sidebar_featured_project">

                <!-- <h3>Featured Work</h3> -->
                <div class="left">&nbsp;<!--<img src="images/maker.png" alt="image 3" />--></div>
                <div class="right">
				<!--
                    <a href="#">Lorem ipsum dolor sit</a>
                    <p>Cras purus libero, dapibus nec rutrum in, dapibus nec risus. Ut interdum mi sit amet magna feugiat auctor.</p>
				-->
                </div>
                
                 <div class="cleaner"></div>
                
            </div>

            <div id="news_section">

                <h3>Menu</h3>

                <div class="news_box">

				<?php start_block_marker('news_box1'); ?>
				<?php end_block_marker(); ?>

                </div>
                <div class="news_box">

				<?php start_block_marker('news_box2'); ?>
				<?php end_block_marker(); ?>

                </div>

                <!-- <div class="button"><a href="news.html">View All</a></div> -->
                
				<div class="cleaner"></div>  
                   
            </div>
        
            <div class="cleaner"></div>
        </div>
    
    	<div class="cleaner"></div>
    </div> <!-- end of content_wrapper -->
    
    <div id="templatemo_footer">

        <ul class="footer_menu">
		
				<?php start_block_marker('footer_menu'); ?>
				<?php end_block_marker(); ?>

        </ul>
    
        Copyright © 2012 <?=$this->config->item('homepage')?> Private Server | 
        Designed by <a href="http://forum.ragezone.com/members/294574.html" target="_blank">Zaugola</a> | 
        Validate <a href="http://validator.w3.org/check?uri=referer">XHTML</a> &amp; 
        		 <a href="http://jigsaw.w3.org/css-validator/check/referer">CSS</a>
    
    </div> <!-- end of footer -->

</div> <!-- end of wrapper -->

</body>
</html>