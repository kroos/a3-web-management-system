<section class="cid-qIkd8YjWVQ mbr-fullscreen mbr-parallax-background" id="header2-9">

		<div class="mbr-overlay" style="opacity: 0.4; background-color: rgb(0, 0, 0);"></div>

		<div class="container align-center">
			<div class="row justify-content-md-center">
				<div class="mbr-white col-md-10">
					<h1 class="mbr-section-title mbr-bold pb-3 mbr-fonts-style display-1"><?=$this->config->item('homepage')?></h1>
					<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">Account Management Tools</h3>
					<div class="container">
						<div class="row">
							<div class="col-lg-6">

								<?php start_block_marker('service_box_float_l'); ?>

									<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">Account</h3>


<?php
###################################################################################################################################################
//starting to count membership tricky part
	switch ($this->session->userdata('group'))
		{
			case 'BM':
			$laptop = $this->config->item('BM');
			$payment = $this->config->item('BMP');
			break;
			case 'SM':
			$laptop = $this->config->item('SM');
			$payment = $this->config->item('SMP');
			break;
			case 'GoldM':
			$laptop = $this->config->item('GoldM');
			$payment = $this->config->item('GoldMP');
			break;
			case 'GM':
			$laptop = 'Game Master';
			$payment = 4000000000;
			break;
			case 'Normal':
			$laptop = 'Normal';
			$payment = NULL;
			break;
		};
	
	$sql2 = $this->account->account_user($this->session->userdata('username'), $this->session->userdata('password'))->row();
	//echo $sql2->last_salary.' last salary<br />';
	//echo $sql2->salary.' salary<br />';
	
	##################################################
	//convert to unix time stamp
	$timeu = human_to_unix($sql2->last_salary);
	$timespan = timespan(now(), $timeu);
	##################################################
	
	$datediff = $this->db->select("DATEDIFF(month, '".$sql2->last_salary."', '".$sql2->salary."') AS monthdatediff")->get()->row();
	//echo $datediff->monthdatediff.' monthdate salary->last salary<br />';
	
	$datediff1 = $this->db->select("DATEDIFF(month, '".$sql2->last_salary."', GETDATE()) AS monthdate")->get()->row();
	//echo $datediff1->monthdate.' monthdate now->last salary<br />';
	
	//check curernt date
	$cdate = mssqldate();
	//echo $cdate.' current date<br />';
	
	$ty = $datediff->monthdatediff + 1;
	$sql3 = $this->db->select("DATEADD (month, $ty, '".$sql2->last_salary."') AS monthdateadd" )->get()->row();
	// echo $sql3->monthdateadd.' month<br />';

	$i = 0;
	if ($cdate > $sql3->monthdateadd)
		{
			$i++;
		}

	$lk = $datediff->monthdatediff + 1 + $i;
	$sql4 = $this->db->select("DATEADD(month, ".$lk.", '".$sql2->last_salary."') AS monthdateadd")->get()->row();
	//echo $sql4->monthdateadd.' month after process<br />';
	
	if ($cdate > $sql3->monthdateadd)
		{
			$legalDate = $sql3->monthdateadd;
		}
		else
		{
			$legalDate = $sql4->monthdateadd;
		}
	//echo $legalDate.' legal date<br />';
	
	##################################################
	//convert to unix time stamp
	$temp = explode(' ', $legalDate);
	$tempdate = explode('-', $temp[0]);
	$temptime = explode(':', $temp[1]);
	$year = $tempdate[0];
	$month = $tempdate[1];
	$day = $tempdate[2];
	$hour = $temptime[0];
	$minute = $temptime[1];
	$sec = $temptime[2];
	$mktime = mktime($hour, $minute, $sec, $month, $day, $year);
	$legalDate = mdate("%Y-%m-%d %H:%i:%s", $mktime);
	$timeu1 = human_to_unix($legalDate);
	//echo $timeu1.' unix legal date<br />';
	$timespan1 = timespan(now(), $timeu1);
	##################################################
###################################################################################################################################################
?>
<p class="mbr-text pb-3 mbr-fonts-style display-5">You are our <font color='#ff1500'><?php echo $laptop; ?></font> user.</p>
<?php
if ($this->session->userdata('group') == 'BM' || $this->session->userdata('group') == 'SM' || $this->session->userdata('group') == 'GoldM')
	{
		if ($timespan < 2)
			{
				echo "<p class=\"mbr-text pb-3 mbr-fonts-style display-5\"><font color='#ff1500'>$laptop</font> account expired.<br />";
			}
			else
			{
				echo "<p class=\"mbr-text pb-3 mbr-fonts-style display-5\"><font color='#ff1500'>$laptop</font> will expire in <font color='#ff1500'>$timespan</font>.<br />";
			}
		echo "Salary available on : <font color='#ff1500'>".date_my($legalDate)."</font><br />";
		if ($timespan1 < 2)
			{
				echo '<blink><b><font color=\'#ff00ff\'>Please claim your salary right away</font></b></blink><br />';
			}
			else
			{
				echo "You can claim your salary in <font color='#ff1500'>$timespan1</font><br />";
			}
		echo "You were entitle to get <font color='#ff1500'>$payment</font> Wz per month.</p>";
	}
?>

								<?php end_block_marker(); ?>


							</div>
							<div class="col-lg-6">

								<?php start_block_marker('service_box_float_r'); ?>

									<h3 class="mbr-section-subtitle align-center mbr-light pb-3 mbr-fonts-style display-2">Character</h3>
									<?php $sql = $this->charac0->charac_char($this->session->userdata('username'))?>
									<?if($sql->num_rows() > 0):?>
									<ul class="list-group">
									<?php foreach($sql->result() as $item):?>
										<li class="list-group-item list-group-item-primary"><?=$item->c_id ?></li>
									<?php endforeach?>
									</ul>
									<?php else:?>
										<p class="mbr-text pb-3 mbr-fonts-style display-5">No character created.</p>
									<?php endif?>
								<?php end_block_marker(); ?>

							</div>
						</div>
					</div>
					<div class="mbr-section-btn">
						<!-- <button type="button" class="btn btn-md btn-secondary display-4">LEARN MORE</button> -->
						<a class="btn btn-md btn-secondary display-4" href="#">LEARN MORE</a>
						<a class="btn btn-md btn-white-outline display-4" href="#">LIVE DEMO</a>
					</div>
				</div>
			</div>
		</div>
		<div class="mbr-arrow hidden-sm-down" aria-hidden="true">
			<a href="#next">
				<i class="mbri-down mbr-iconfont"></i>
			</a>
		</div>
	</section>