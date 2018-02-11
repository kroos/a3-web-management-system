<?php
extend('layout/main.php');

startblock('news');
?>
	<section class="mbr-section article content10 cid-qImEdhoUCY" id="content10-d">

		<div class="container">
			<div class="inner-container" style="width: 66%;">
				<hr class="line" style="width: 25%;">
				<div class="section-text align-center mbr-white mbr-fonts-style display-5">
					<h2 class="mbr-section-title align-center pb-3 mbr-white mbr-fonts-style display-2">Server Status</h2>
					<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><font color="#FF0000"><blink><?=@$info?></blink></font></p>

<?php
$srvip = $this->config->item('srvip');
$svrportaccount = $this->config->item('svrportaccount');
$svrportbattle = $this->config->item('svrportbattle');
$svrportlogin = $this->config->item('svrportlogin');
$svrportZone = $this->config->item('svrportZone');
$homepage = $this->config->item('homepage');

		$fp1 = @fsockopen($srvip, $svrportaccount, $errno, $errstr, 1);
		if (!$fp1)
			{
				$acc_port = 'Account Server <font color="#FF0000">OFFLINE</font>';
			}
			else
			{
				$acc_port = 'Account Server <font color="#00FF00">ONLINE</font>';
				fclose($fp1);
			};
		
		$fp2 = @fsockopen($srvip, $svrportbattle, $errno, $errstr, 1);
		if (!$fp2)
			{
				$battle_port = 'Battle Server <font color="#FF0000">OFFLINE</font>';
			}
			else
			{
				$battle_port = 'Battle Server <font color="#00FF00">ONLINE</font>';
				fclose($fp2);
			};
		
		$fp3 = @fsockopen($srvip, $svrportlogin, $errno, $errstr, 1);
		if (!$fp3)
			{
				$login_port = 'Login Server <font color="#FF0000">OFFLINE</font>';
			}
			else
			{
				$login_port = 'Login Server <font color="#00FF00">ONLINE</font>';
				fclose($fp3);
			};
		
		$fp4 = @fsockopen($srvip, $svrportZone, $errno, $errstr, 1);
		if (!$fp4)
			{
				$zone_port = 'Zone Server <font color="#FF0000">OFFLINE</font>';
			}
			else
			{
				$zone_port = 'Zone Server <font color="#00FF00">ONLINE</font>';
				fclose($fp4);
			};
?>
<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><?=$acc_port?></p>
<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><?=$battle_port?></p>
<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><?=$login_port?></p>
<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><?=$zone_port?></p>
<?php
function server_status($srvip, $svrportaccount, $svrportbattle, $svrportlogin, $svrportZone, $homepage)
	{
		$fp1 = @fsockopen($srvip, $svrportaccount, $errno, $errstr, 1);
		if (!$fp1)
			{
				$acc_port = false;
			}
			else
			{
				$acc_port = true;
				fclose($fp1);
			};
		
		$fp2 = @fsockopen($srvip, $svrportbattle, $errno, $errstr, 1);
		if (!$fp2)
			{
				$battle_port = false;
			}
			else
			{
				$battle_port = true;
				fclose($fp2);
			};
		
		$fp3 = @fsockopen($srvip, $svrportlogin, $errno, $errstr, 1);
		if (!$fp3)
			{
				$login_port = false;
			}
			else
			{
				$login_port = true;
				fclose($fp3);
			};
		
		$fp4 = @fsockopen($srvip, $svrportZone, $errno, $errstr, 1);
		if (!$fp4)
			{
				$zone_port = false;
			}
			else
			{
				$zone_port = true;
				fclose($fp4);
			};
		if ($fp1 == true && $fp2 == true && $fp3 == true && $fp4 == true)
			{
				$server_status = "$homepage Server <b><font color=\"#00FF00\">ONLINE</font></b>";
				return $server_status;
			}
			else
			{
				$server_status = "$homepage Server <b><font color=\"#FF0000\">OFFLINE</font></b>";
				return $server_status;
			};
	}
?>
<p class="mbr-text pb-3 mbr-white mbr-fonts-style display-5"><?=server_status($this->config->item('srvip'), $this->config->item('svrportaccount'), $this->config->item('svrportbattle'), $this->config->item('svrportlogin'), $this->config->item('svrportZone'), $this->config->item('homepage'))?></p>

				</div>
				<hr class="line" style="width: 25%;">
			</div>
		</div>
	</section>
<?php
endblock();

startblock('form');
endblock();

end_extend();
?>