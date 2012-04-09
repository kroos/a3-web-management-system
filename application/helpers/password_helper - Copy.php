<?php

#############################################################################################################################
//*/
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
				$server_status = "$homepage Server<br><b><font color=\"#00FF00\">ONLINE</font></b>";
				return $server_status;
			}
			else
			{
				$server_status = "$homepage Server<br><b><font color=\"#FF0000\">OFFLINE</font></b>";
				return $server_status;
			};
	}
//*/
#############################################################################################################################
///*
function generatePassword($length=6,$level=2)
	{
			list($usec, $sec) = explode(' ', microtime());
			srand((float) $sec + ((float) $usec * 100000));

			$validchars[1] = "0123456789abcdfghjkmnpqrstvwxyz";
			$validchars[2] = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
			$validchars[3] = "0123456789_!@#$%&*()-=+/abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_!@#$%&*()-=+/";

			$password  = "";
			$counter   = 0;

			while ($counter < $length)
			{
				$actChar = substr($validchars[$level], rand(0, strlen($validchars[$level])-1), 1);

				// All character must be different
				if (!strstr($password, $actChar))
					{
					    $password .= $actChar;
					    $counter++;
					}
			}
		return $password;
	};
//*/
#############################################################################################################################
#############################################################################################################################

?>