<?extend('template/main.template.php')?>


			<?php startblock('site_title'); ?>
			<a href="" target="_parent">
                <img src="images/templatemo_logo.png" alt="Site Title" width="200" height="50" />
                <span><?=$this->config->item('homepage')?> Account Management</span>
            </a>
			<?php endblock(); ?>
			
		<?php startblock('search_box'); ?>
            <form action="#" method="get">
                <input type="text" value="Enter a keyword here..." name="q" size="10" id="searchfield" title="searchfield" onfocus="clearText(this)" onblur="clearText(this)" />
                <input type="submit" name="Search" value="Search" alt="Search" id="searchbutton" title="Search" />
            </form>
		<?php endblock(); ?>
		
		<?php startblock('templatemo_menu'); ?>
<ul>
	<li><?=anchor('', 'Home', 'title="Home"');?></li>
	<li><?=anchor('a3/event', 'Event', 'title="Event"');?></li>
	<li><?=anchor('a3/download', 'Download', 'title="Download"');?></li>
	<li><?=anchor($this->config->item('homepage_url'), 'Forum', 'target="_blank" title="Forum"');?></li>
</ul>
		<?php endblock(); ?>
		
				<?php startblock('cs_slider'); ?>
                            <div class="cs_article">
                                    <img src="images/slider/templatemo_slide02.jpg" alt="Website Template 01" />
                            </div><!-- End cs_article -->
                            
                            <div class="cs_article">
                                	<img src="images/slider/templatemo_slide01.jpg" alt="Website Template 02" />
                            </div><!-- End cs_article -->
                            
                            <div class="cs_article">
                               	<img src="images/slider/templatemo_slide03.jpg" alt="Website Template 03" />
                            </div><!-- End cs_article -->
                            
                            <div class="cs_article">
                               	<img src="images/slider/templatemo_slide04.jpg" alt="Website Template 04" />
                            </div><!-- End cs_article -->
				<?php endblock(); ?>

				<?php startblock('page_title'); ?>
			Pro Teal Development
				<?php endblock(); ?>

				<?php startblock('service_box_float_l'); ?>
                    <h5>Quality Services</h5>
                    <p>ghjghjghjghjghj ghjghjghjghjghjghjgh jghjghjghjg jhghjghj ghjgfhfghf ghfhgfgh</p>
				<?php endblock(); ?>

				<?php startblock('service_box_float_r'); ?>
                     <h5>Best Products</h5>
                     <p>&nbsp;</p>
				<?php endblock(); ?>

				<?php startblock('cleaner_h40a'); ?>
            <h2>What we do?</h2>
            <p>&nbsp;</p>
			<p>&nbsp;</p>
				<?php endblock(); ?>

				<?php startblock('cleaner_h40b'); ?>
            <h2>What we do?</h2>
            <p>&nbsp;</p>
			<p>&nbsp;</p> 
				<?php endblock(); ?>

				<?php startblock('templatemo_menu_side'); ?>
	<ul>
		<li>
			<ul>
				<li><?=anchor('a3/register', 'Register', 'title="Register"');?></li>
				<li><?=anchor('a3/password_retrieve', 'Password Retrieve', 'title="Password Retrieve"');?></li>
			</ul>
		</li>
		<li>
			<ul>
				<li><?=anchor('a3/server_status', 'Server Status', 'rel="moodalbox 600 400" title="Server Status"');?></li>
				<li><?=anchor('a3/popup_board_of_heroes', 'Board Of Heroes', 'rel="moodalbox 600 400" title="Board Of Heroes"');?></li>
				<li><?=anchor('a3/popup_board_of_mercenaries', 'Board Of Mercenaries', 'rel="moodalbox 600 400" title="Board Of Mercenaries"');?></li>
				<li><?=anchor('a3/popup_player_online', 'Player Online', 'rel="moodalbox 600 400" title="Player Online"');?></li>
			</ul>
		</li>
	</ul>
				<?php endblock(); ?>

				<?php startblock('news_box1'); ?>
                    <a href="#">Lorem ipsum dolor sit amet consectetur</a>
					<p>Quisque id lacus in nunc porttitor</p>
				<?php endblock(); ?>

				<?php startblock('news_box2'); ?>
                    <a href="#">Quisque id lacus in nunc porttitor</a>
					<p>Quisque id lacus in nunc porttitor</p>
				<?php endblock(); ?>

				<?php startblock('footer_menu'); ?>
            <li><a href="index.html">Home</a></li>
            <li><a href="services.html">Services</a></li>
            <li><a href="news.html">News</a></li>
            <li><a href="gallery.html">Gallery</a></li>
            <li class="last_menu"><a href="contact.html">Contact Us</a></li>
				<?php endblock(); ?>

<?end_extend()?>