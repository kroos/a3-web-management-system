<?php
extend('template/main.template.php');

startblock('templatemo_menu');
?>
	&nbsp;
<?php
endblock();



startblock('templatemo_menu_side');
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