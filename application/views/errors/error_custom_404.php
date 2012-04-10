<?php
extend('template/main.template.php');

startblock('div_header');
?>
	<h1><?php echo $this->config->item('homepage'); ?><span class="off">Online</span></h1><p>&nbsp;</p>
<?php
endblock();

startblock('top_menu');
?>
	<li class="menuitem"><?=anchor('', 'Home', 'title="Home"');?></li>
<?php
endblock();



startblock('leftmenu_main');
?>
	<ul>
		<li><?=anchor('', 'Home', 'title="Home"')?></li>
	</ul>
<?php
endblock();

//user container
startblock('cleaner_h40a');
?>
    <div>
      <img src="<?=base_url()?>images/errors/404.png" alt="404 page not found" />
    </div>
<?php
endblock();

end_extend();
?>